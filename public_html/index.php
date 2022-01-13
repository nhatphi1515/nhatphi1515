<?php 
	require 'Model/Database.php';
	require 'Lib/function.php';
	$db = new Database();

	require 'View/client/layouts/header.php'; 

	if (isset($_GET['controller'])) {
		require 'Route/client/web.php';
	} else {
		require('Controller/client/home.php'); 
		$request = new Home; 
	}

	require 'View/client/layouts/footer.php'; 

	$db->closeDatabase();

?>