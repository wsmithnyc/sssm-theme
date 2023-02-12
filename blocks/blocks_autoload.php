<?php


//spl_autoload_extensions(".php");

spl_autoload_register(__NAMESPACE__ . '\\blocksAutoloader');

function blocksAutoloader($className)
{
	$path = __DIR__;
	
	$className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
	
	$path = $path . DIRECTORY_SEPARATOR . $className . ".php";
	
	if( file_exists($path) ) {
		require_once( $path );
	}
}
