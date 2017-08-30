<?php

/** Test the front controller */

require 'autoload.php';

use framework\TestRunner;
use app\Routes; /** @todo: dependency injection? */

$testRunner = new TestRunner(Routes::TESTCASES(), Routes::NO_MATCH_REGEXP);
$testRunner->run();
