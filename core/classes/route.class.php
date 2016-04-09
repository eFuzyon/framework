<?php

	namespace Core;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Exception\ResourceNotFoundException;
	use App\Controller;
	use Symfony\Component\Routing\RequestContext;

	class Route 
	{

		public static function Init(){

			/**
			* Vars
			*/
			$context = Route::getContext();
			$route = false;
			$controller = false;
			$action = false;

			/**
			* Parse: app/config/routes.yml
			*/
			$router = Yaml::LoadRouter(BASE_PATH_APP . 'config/routes.yml');
			if (isset($router)) $match = $router->match($context->getPathInfo());

			/**
			* Match to route
			*/
			if (isset($match)) :

				if (!empty($match["_controller"]) && !empty($match["_action"])) :

					$controller = "\\App\\Controller\\" . $match["_controller"];
					$action = $match["_action"];

				endif;

			endif;

			/**
			* Calling the route
			*/
			if ($controller && $action) :

				$controller::$action();

			endif;

		}

		public static function getContext(){

			$context = new RequestContext();
			$context->fromRequest(Request::createFromGlobals());

			return $context;

		}

	}