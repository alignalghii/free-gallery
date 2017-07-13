<?php

require '../autoload.php';

use framework\Util;
use framework\Meta;
use framework\AlgebraicDataTypes\Maybe;
use framework\AlgebraicDataTypes\Either;

function statusMsg($status) {return $status ? 'OK' : 'Wrong';}
function printStatus($status) {echo statusMsg($status) . "\n";}

$allStatus = true;

echo "Inspected functionalities:\n";

echo ' - framework\Util::array_mapMaybe_access_keys: ';
$r = Util::array_mapMaybe_access_keys(function($k, $v) {return Maybe::just($k + $v);}, [10,20,30]);
$status = $r === [10, 21, 32];
printStatus($status);
$allStatus = $allStatus && $status;

echo ' - framework\AlgebraicDataTypes\Either: ';
$leftDiv0 = Either::left('Division by zero');
$right5   = Either::right(5);
function reportEither($eitherErrorLabelOrNumResult)
{
	return $eitherErrorLabelOrNumResult->either(
		function ($errorLabel) {return "Problem: $errorLabel";},
		function ($numResult)  {return "The value is: $numResult";}
	);
}
$status = reportEither($right5) == 'The value is: 5' && reportEither($leftDiv0) == 'Problem: Division by zero';
printStatus($status);
$allStatus = $allStatus && $status;

/**
 * Ther is no way to implemant `safeExtract`
 * @see https://stackoverflow.com/questions/2251386/can-we-implement-a-php-extract-function-in-php-with-out-using-zend-api
 *
 * echo ' - framework\Meta::safeExtract: ';
 * $status0 = !isset($two) && !isset($three) &&!isset($four);
 * Meta::safeExtract(['two', 'four'], ['two' => 2, 'three' => 3]);
 * $status = $status0 && $two === 2 && !isset($three) && !isset($four);
 * printStatus($status);
 * $allStatus = $allStatus && $status;
 */

echo "-------> Overall status: " . statusMsg($allStatus) . "\n";