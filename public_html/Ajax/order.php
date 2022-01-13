<?php 
class Order
{
	function __construct()
	{
		require '../Model/Order_StatusModel.php';
		require '../Model/UserModel.php';
		$UserModel = new UserModel();
		$Order_StatusModel = new Order_StatusModel();
		$status = $_POST['status'];
		$id = $_POST['id'];
		$iduser = $_POST['iduser'];
		$iduser2 = $_POST['iduser2'];
		$reason = $_POST['reason'];
		$total_price = $_POST['total_price'];
		$refund = 0;
		$time = getTime();
		switch ($status) {
			case 'Đã nhận xe':
				echo "đã đặt xe<br>
					<div class='status'>$status</div>";
					$UserModel->addCoin($iduser,$total_price);
				break;
			case 'Đã huỷ xe':
				$refund = $total_price*0.1;
				echo "đã đặt xe<br>
					<div class='status'>$status</div>";
					$UserModel->addCoin($iduser2,$total_price-$refund);
					$UserModel->addCoin($iduser,$refund);
				break;
			default: break;
		}
	
		$Order_StatusModel->update($id,$status,$refund,$reason,$time);

	}
} 
?>