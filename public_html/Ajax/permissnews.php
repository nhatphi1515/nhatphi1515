<?php 
class Permissnews
{
	function __construct()
	{
		require '../Model/PostModel.php';
		$PostModel = new PostModel();
		$idnews = $_GET['id'];
		$condition = 'đã duyệt';
		$PostModel->updateCondition($idnews,$condition);
	}
} ?>