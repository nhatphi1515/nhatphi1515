<?php
	$controller = $_GET['controller'];
	require('../../Controller/admin/' . $controller . '.php'); 
	$controller = ucfirst($controller);
	$request = new $controller; 