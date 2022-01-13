<?php 
class Permissrent
{
	function __construct()
	{
		require '../Model/BillModel.php';
		require '../Model/UserModel.php';
		$BillModel = new BillModel();
		$UserModel = new UserModel();
		$idbill = $_POST['idbill'];
		$condition = $_POST['condition'];
		$BillModel->updateCondition($idbill,$condition);
		$bill = $BillModel->get($idbill);
		if ($condition=='cho thuê') {
			echo 'checkmark.png';
		}
		else{
			$numday = ((strtotime($bill['return_date']) - strtotime($bill['rent_date']))/60/60/24)+1;
			$price = $bill['price']*$numday;
			$UserModel->addCoin($bill['iduser'],$price);
			echo 'cancel.png';
		} 
	}
} ?>