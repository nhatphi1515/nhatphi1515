<?php
	session_start();
	require '../Model/Database.php';
	$db = new Database();
	require '../Model/CategoryModel.php';
	$CategoryModel = new CategoryModel();
	$id = $_POST['id'];
	$brand =  $CategoryModel->listBrandByCategory($id);
	$result = '';
	foreach ($brand as $key ){
		$result.="<option value=".$key['id'].">".$key['name']."</option>";
	}
	echo $result;
?>