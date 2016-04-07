<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	use Symfony\Component\Debug\Debug;
	use Symfony\Component\Debug\ExceptionHandler;
	use Symfony\Component\Debug\ErrorHandler;
	use Symfony\Component\Yaml\Parser;

echo 123;
	exit;

	/**
	* Let's parse the environment.yml file
	*/
	#if (file_exists()) :
	$yaml = new Parser();
	$value = $yaml->parse(file_get_contents('/path/to/file.yml'));
	
	if ($de == "on") :
		Debug::enable();
	else:
		ErrorHandler::register()->setExceptionHandler(function($e){
			include __DIR__ . "/../app/views/error/500.tpl";
		});
	endif;

	include 123;