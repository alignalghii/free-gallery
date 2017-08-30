<?php

namespace framework;

class Controller
{
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function request()
	{
		return $this->request;
	}

	public function render($shortPath, $viewModel, $parentTemplate = 'base', $bufferName = 'content')
	{
		extract($viewModel);
		ob_start();
			require self::view($shortPath);
		$$bufferName = ob_get_clean();
		require self::view($parentTemplate);
	}

	public function redirect($uri)
	{
		header("Location: $uri");
	}

	private static function view($shortPath) {return "app/View/$shortPath.php";}
}
