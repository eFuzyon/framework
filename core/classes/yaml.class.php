<?php

	namespace Core;

	use Symfony\Component\Yaml\Parser;

	class Yaml {

		public static function Parse(){

			# Calling parser from Symfony
			$yaml = new Parser();

			# Parse the .yml file
			$_ENV = $yaml->parse(file_get_contents(BASE_PATH . 'environment.yml'));

			# Turn _ENV into a global variable
			global $_ENV;

		}

	}