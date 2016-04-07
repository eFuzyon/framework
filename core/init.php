<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	/**
	* Parse the environment.yml file
	*/
	if (file_exists(BASE_PATH . 'environment.yml')) :

		Core\Yaml::Parse(BASE_PATH . 'environment.yml');

	endif;

	/**
	* Initiate the debug process
	*/
	Core\Debug::Init();