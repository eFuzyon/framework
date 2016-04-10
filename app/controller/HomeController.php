<?php

	namespace App\Controller;

	use Core\Debug;
	use Core\Template;
	use App\Model\User;

	class HomeController 
	{

		public static function indexAction(){

			# Globals
			global $appObj;

			# Fetch user
			$users = User::Find([
				"id" => 1
			]);

			# View
			Template::Call("index");

		}

	}