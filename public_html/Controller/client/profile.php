<?php 
class Profile
{
	function __construct()
	{
		require 'Model/BankModel.php';
		require 'Model/UserModel.php';
		require 'Model/PostModel.php';
		require 'Model/Bill_topupModel.php';
		$Bill_topupModel = new Bill_topupModel();
		$UserModel = new UserModel();
		$BankModel = new BankModel();
		$PostModel = new PostModel();
		$iduser = $_GET['id'];
		$user = $UserModel->getUser($iduser);
		$news = $PostModel->listByUser($iduser);
		$bill = $PostModel->listBillByUser($iduser);
		$bills = $PostModel->listBillByRental($iduser);
		$coin = 0;
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$coin = 0;
			$seri = $_POST['seri'];
			$code = $_POST['code'];
			$checkcard = $BankModel->check($seri, $code);
			if ($checkcard->num_rows > 0) {
				$card = $checkcard->fetch_array();
				if($card['status']=='valid'){
					$time = getTime();
					$coin = $BankModel->topup($card['id'],$card['price'],$iduser);
					$Bill_topupModel->insert($card['id'], $iduser, 0 ,$time);
					echo "<script>alert('chúc mừng bạn đã nhạp thẻ thành công');</script>";
				}
				else echo "thẻ đã được sử dụng";
			}
			else echo "số seri hoặc mã thẻ bị sai";
		}
		require 'View/client/pages/profile.php';
	}
	public function getStatus($bill){
		if (strtotime($bill['return_date']) > strtotime(getTime()) && $bill['condtn'] != 'không cho thuê') {
		    if($bill['condtn'] == 'chưa xác nhận') return $bill['condtn'];
			return 'Đã được thuê';
		}
		return "Chưa được thuê";
	}
	public function getStatus2($time, $status){
		if (strtotime($time) < strtotime(getTime())) 
			return $status;
		else if($status == 'Đã huỷ xe') return $status;
		return "huỷ xe";
	}
} ?>