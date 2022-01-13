<?php 
	session_start();
	require '../Model/Database.php';
	require '../Lib/function.php';
	$db = new Database();
	$controller = $_GET['controller'];
	require($controller . '.php'); 
	$controller = ucfirst($controller); 
	$request = new $controller; 
	$db->closeDatabase();

?>