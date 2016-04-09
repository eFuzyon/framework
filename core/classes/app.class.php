<?php

	namespace Core;

	class App 
	{

		var $context;
		var $request;

		function __construct(){

			# Set vars
			$this->context = Route::getContext();
			$this->request = (object) [
				"url" => $this->getUrl()
			];

		}

		function getUrl(){

			# Vars
			$host = $this->context->getHost();
			$scheme = $this->context->getScheme();
			$port = ( $scheme == "http" ) ? $this->context->getHttpPort() : $this->context->getHttpsPort() ;
			$port = ( $port == "80" ) ? "" : ":{$port}" ;
			$pathInfo = $this->context->getPathInfo();
			$query = $this->context->getQueryString();
			$query = ( $query ) ? "?{$query}" : $query ;

			# Set base URL
			$base_url = "{$scheme}://{$host}{$port}";
			$current_url = $base_url . $pathInfo;

			# Create object
			$urlObj = new \stdClass();
			$urlObj->current = (object) [
				"base" => $current_url,
				"full" => $current_url . $query
			];
			$urlObj->base = $base_url;

			# Output
			return $urlObj;

		}

	}