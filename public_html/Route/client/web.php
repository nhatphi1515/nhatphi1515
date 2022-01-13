<?php
	$controller = $_GET['controller'];
	require('Controller/client/' . $controller . '.php'); 
	$controller = ucfirst($controller); 
	$request = new $controller; 