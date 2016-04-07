<?php

	namespace Core;

	use Symfony\Component\Yaml\Parser;

	class Yaml 
	{

		public static function LoadEnvironment($file = null){

			if (file_exists($file)) :

				# Turn _ENV into a global variable
				global $_ENV;

				# Calling parser from Symfony
				$yaml = new Parser();

				# Parse the .yml file
				$_ENV = $yaml->parse(file_get_contents($file));

			else:

				Debug::Call("generic", [
					"error-message" => FOLLOWING_FILE_IS_MISSING . $file
				]);

			endif;			

		}

		public static function LoadMessages($file = null){

			if (file_exists($file)) :

				# Turn _CORE into a global variable
				global $_CORE;

				# Calling parser from Symfony
				$yaml = new Parser();

				# Parse the .yml file
				$_CORE['messages'] = $yaml->parse(file_get_contents($file));

				# Push vars to constants
				if ($_CORE['messages']) :

					foreach ($_CORE['messages'] as $key => $value) :

						define(strtoupper($key), $value);

					endforeach;

				endif;

			else:

				Debug::Call("generic", [
					"error-message" => "The following file is missing: {$file}"
				]);

			endif;

		}

	}