<?php

	namespace Core;

	use Symfony\Component\HttpFoundation\Request;

	class Route 
	{

		public static function Init(){

			#$request = Request::createFromGlobals();

			/**
			* Parse: app/config/routes.yml
			*/
			$router = Yaml::LoadRouter(BASE_PATH_APP . 'config/routes.yml');
			if ($router) $match = $router->match('/');

		}

	}