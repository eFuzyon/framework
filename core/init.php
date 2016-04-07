<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	/**
	* Parse: messages.yml
	*/
	Core\Yaml::LoadMessages(BASE_PATH_SYS . '/config/messages.yml');

	/**
	* Parse: environment.yml
	*/
	Core\Yaml::LoadEnvironment(BASE_PATH . 'environment.yml');

	/**
	* Initiate the debug process
	*/
	Core\Debug::Init();

	/**
	* Find a route for the request
	*/
	Core\Route::Init();