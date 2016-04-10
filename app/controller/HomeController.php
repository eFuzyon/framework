<?php

	namespace App\Controller;

	use Core\Debug;
	use Core\Template;

	class HomeController 
	{

		public static function indexAction(){

			# Globals
			global $appObj;

			# View
			Template::Call("index");

		}

	}