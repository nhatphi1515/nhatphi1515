<?php
	class Permission{
		function __construct()
		{
			require '../../Model/UserModel.php';
			$UserModel = new UserModel();
			$id = $_POST['id'];
			$role = $_POST['role'];
			$UserModel->permission($id,$role);
		}
	}

?>