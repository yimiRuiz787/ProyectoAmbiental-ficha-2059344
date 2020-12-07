<?php

	session_start();
	require'providers/Database.php';

	$controller = 'WebController';

	if (!isset($_REQUEST['controller'])) {
		require "controllers/". $controller .".php";

		$controller = ucwords($controller);
		$controller = new $controller;
		$controller->index();
	}else{
		$controller = ucwords($_REQUEST['controller'].'controller');

		$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'index';

		require "controllers/". $controller. ".php";
		$controller = new $controller;


		call_user_func(array($controller, $method));
	}