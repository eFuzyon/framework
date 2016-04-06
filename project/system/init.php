<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	#ini_set("display_errors", "on");
	$de = ini_get("display_errors");

	use Symfony\Component\Debug\Debug;
	use Symfony\Component\Debug\ExceptionHandler;
	use Symfony\Component\Debug\ErrorHandler;
	
	if ($de == "on") :
		Debug::enable();
	else:
		ErrorHandler::register()->setExceptionHandler(function($e){
			include __DIR__ . "/../app/views/error/500.tpl";
		});
	endif;