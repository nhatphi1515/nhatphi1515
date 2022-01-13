<?php  
class listUser{
	function __construct()
	{
		require '../../Model/UserModel.php';
		require '../../Model/BankingModel.php';
		require '../../Model/Bill_topupModel.php';
		$UserModel = new UserModel();
		$BankingModel = new BankingModel();
		$Bill_topupModel = new Bill_topupModel();
		$datauser =  $UserModel->all();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$iduser = $_POST['id'];
			$amount = $_POST['coin'];
			$idadmin = $_SESSION['user']['id'];
			$type = $_POST['type'];
			$time = getTime();
			$idbanking = $BankingModel->insert($idadmin, $amount, $type);
			$Bill_topupModel->insert(0, $iduser, $idbanking ,$time);
			if ($type=='add') $UserModel->addCoin($iduser, $amount);
			else  $UserModel->minusCoin($iduser, $amount);
		}
		require 'pages/user/list.php';
	}
}
?>