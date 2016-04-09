<?php

	namespace Core;

	use Symfony\Component\Debug\Debug as SymfonyDebug;
	use Symfony\Component\Debug\ExceptionHandler;
	use Symfony\Component\Debug\ErrorHandler;

	class Debug 
	{

		public static function Init() {

			if ( $_ENV['debug'] === true ) :

				# Set new configuration
				ini_set("display_errors", "on");

				# Enable SymfonyDebug
				SymfonyDebug::enable();

			else:

				# Set new configuration
				ini_set("display_errors", "off");

				# Handle error
				ErrorHandler::register()->setExceptionHandler(function($e){

					# Call the error template
					Debug::Call("generic", [
						"error-message" => GENERIC_ERROR_MESSAGE
					]);

				});

			endif;

		}

		public static function Call($template = null, $replace = null) {

			# Does the error template exists?
			if (file_exists(BASE_PATH_SYS . "views/error/{$template}.tpl")) :

				# Create a cache for the content
				ob_start();
				include BASE_PATH_SYS . "views/error/{$template}.tpl";
				$content = ob_get_contents();
				ob_end_clean();

				# Parse vars in the template
				$content = Template::Parse($content, $replace);

				# Output
				if( $content ) echo $content;

			endif;

		}

	}