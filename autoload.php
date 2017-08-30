<?php

spl_autoload_register('namespaceAutoload');

function namespaceAutoload($className)
{
	$moduleName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	require "$moduleName.php";
}
