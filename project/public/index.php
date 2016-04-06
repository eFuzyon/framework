<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	/*
	|---------------------------------------------------------
	| Auto Loader
	|---------------------------------------------------------
	*/
	require __DIR__ . "/../vendor/autoload.php";
 
	/*
	ini_set("display_errors", "off");
	$de = ini_get("display_errors");

	use Symfony\Component\Debug\Debug;
	use Symfony\Component\Debug\ExceptionHandler;
	use Symfony\Component\Debug\ErrorHandler;

	#DebugClassLoader::enable();
	
	if ($de == "on") :
		Debug::enable();
	else:
		ErrorHandler::register()->setExceptionHandler(function($e){
			include __DIR__ . "/../views/error/500.tpl";
		});
	endif;
	*/