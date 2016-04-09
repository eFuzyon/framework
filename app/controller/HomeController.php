<?php

	namespace App\Controller;

	use Core\Debug;

	class HomeController 
	{

		public static function indexAction(){

			# Globals
			global $appObj;

			# Call debug
			Debug::Call("generic", [
				"error-message" => "Waiting for controller"
			]);

		}

	}