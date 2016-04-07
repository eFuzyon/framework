<?php

	namespace Core;

	use Symfony\Component\Debug\Debug as SymfonyDebug;
	use Symfony\Component\Debug\ExceptionHandler;
	use Symfony\Component\Debug\ErrorHandler;

	class Debug {

		public static function Init(){

			if ( $_ENV['debug'] === true ) :

				SymfonyDebug::enable();

			else:

				ErrorHandler::register()->setExceptionHandler(function($e){

					include BASE_PATH_SYS . "views/error/500.tpl";

				});

			endif;

		}

	}