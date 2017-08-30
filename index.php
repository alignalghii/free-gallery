<?php

/** The front `controller' (not a real controller in the strict sense, two layers lower) */

require 'autoload.php';

use framework\Request;
use framework\Router;
use app\Routes; /** @todo: dependency injection */

$request = new Request($_SERVER, $_GET, $_POST);
$router  = new Router(Routes::$CONFIG, $request); // PHP7: Routes::CONFIG
$router->routeOrReport();
