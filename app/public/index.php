<?php

	/**
	 * eFuzyon Framework
	 *
	 * @package  eFuzyon\Framework
	 * @author   Leandro Sanches <leandro.sanches@efuzyon.com>
	 */

	/*
	|---------------------------------------------------------
	| Set base paths
	|---------------------------------------------------------
	*/
	define("BASE_PATH_APP", dirname(__DIR__) . '/');
	define("BASE_PATH", dirname(BASE_PATH_APP) . '/');
	define("BASE_PATH_SYS", BASE_PATH . 'core/');

	/*
	|---------------------------------------------------------
	| Auto Loader
	|---------------------------------------------------------
	*/
	require BASE_PATH . "vendor/autoload.php";

	/*
	|---------------------------------------------------------
	| APP
	|---------------------------------------------------------
	*/
	require BASE_PATH_SYS . "init.php";