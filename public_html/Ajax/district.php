<?php
	session_start();
	require '../Model/Database.php';
	$db = new Database();
	require '../Model/AddressModel.php';
	$AddressModel = new AddressModel();
	$id = $_POST['id'];
	$district =  $AddressModel->getDistrict($id);
	$result = '';
	foreach ($district as $key ){
		$result.="<option value=".$key['id'].">".$key['_name']."</option>";
	}
	echo $result;
?>