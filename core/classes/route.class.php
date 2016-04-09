<?php

	namespace Core;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Exception\ResourceNotFoundException;
	use Symfony\Component\Routing\RequestContext;
	use App\Controller;
	use Core\App;

	class Route 
	{

		public static function Init(){

			/**
			* Create global var
			*/
			global $appObj;

			/**
			* Create app object
			*/
			$appObj = new App();

			/**
			* Vars
			*/
			$context = $appObj->context;
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

					# Set Vars
					$controller = "\\App\\Controller\\" . $match["_controller"];
					$action = $match["_action"];

					# Push vars to app
					$appObj->request->controller = (object) [
						"name" => $match['_controller'],
						"path" => $controller
					];
					$appObj->request->action = (object) [
						"name" => $action
					];

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