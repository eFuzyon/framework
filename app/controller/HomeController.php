<?php

	namespace App\Controller;

	use Core\Debug;

	class HomeController 
	{

		public static function indexAction(){

			Debug::Call("generic", [
				"error-message" => "Waiting for controller"
			]);

		}

	}