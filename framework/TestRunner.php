<?php

namespace framework;

use app\Routes; /** @todo: dependency injection */
use framework\AlgebraicDataTypes\Maybe;

class TestRunner
{
	private $testCases;
	private $noMatch_regexp;

	public function __construct($testCases, $noMatch_regexp)
	{
		$this->testCases     = $testCases;
		$this->noMatch_regexp = $noMatch_regexp;
	}

	public function run()
	{
		$allStatus = true;
		foreach ($this->testCases as $name => $testCase) {
			extract($testCase); // $fixture, $expectation
			$expectation = $expectation->map(
				function ($textReference) {
					list($isDirectText, $txtOrFile) = $textReference;
					return $isDirectText ? $txtOrFile                     // as direct text
					                     : file_get_contents("test/$txtOrFile"); // as contents of provided filename
				}
			);
			list($serverFixture, $get, $post) = $fixture;
			list($method, $uri) = $serverFixture;
			$server = ['REQUEST_METHOD' => $method, 'REQUEST_URI' => $uri];
			$request = new Request($server, $get, $post);
			echo "=== $method $uri ===\n";
			$router = new Router(Routes::$CONFIG, $request);
			$rawActual   = IO::outputOf([$router, 'routeOrReport']);
			$rawExpected = $expectation->maybe(function () {return "---\n";}, function ($rawExp) {return $rawExp;});
			$actual = preg_match($this->noMatch_regexp, $rawActual)
					     ? Maybe::nothing()
					     : Maybe::just($rawActual);
			echo "A $rawActual";
			echo "E $rawExpected";
			$status = $expectation->eq($actual);
			$allStatus = $allStatus && $status;
			echo $status ? 'OK'
			             : 'Wrong';
			echo "\n";
			if (!$status) {
				echo "See the result of diff'ing expected vs actual:\n";
				echo shell_exec("
					mkfifo tmp-exp-235711;
					mkfifo tmp-act-235711;
						echo '$rawExpected' > tmp-exp-235711  &
						echo '$rawActual'   > tmp-act-235711  &
						diff tmp-exp-235711 tmp-act-235711    ;
					rm tmp-exp-235711;
					rm tmp-act-235711
				");
			}
		}
		echo "All-status: " . ($allStatus ? 'OK' : "Wrong") . "\n";
	}

	/*private static function noMatch($method, $uri)
	{
		return sprintf(static::NO_MATCH, $method, $uri);
	}*/

}
