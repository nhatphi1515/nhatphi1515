<?php 

	class Statis
	{
		
		function __construct()
		{
			require '../../Model/BillModel.php';
			require '../../Model/UserModel.php';
			require '../../Model/PostModel.php';
			$BillModel = new BillModel();
			$UserModel = new UserModel();
			$PostModel = new PostModel();
			$countbill = $BillModel->count();
			$countuser = $UserModel->count();
			$countnews = $PostModel->count();
			$total = $countnews*15000;
			require('pages/home.php');

		}
	}
 ?>