<?php 
Class Detail{
	public function __construct(){
		require 'Model/Order_StatusModel.php';
		require 'Model/PostModel.php';
		require 'Model/UserModel.php';
		require 'Model/BillModel.php';
		require 'Model/BlogModel.php';
		require 'Model/CommentModel.php';
		$CommentModel = new CommentModel();
		$BlogModel = new BlogModel();
		$blogs = $BlogModel->all();
		$Order_statusModel = new Order_statusModel();
		$PostModel = new PostModel();
		$UserModel = new UserModel();
		$BillModel = new BillModel();
		$id = $_GET['id'];
		$comment = $CommentModel->getsByNews($id);
		$news = $PostModel->getNews($id);
		$datetime = splitDateTime($news['time_created']);
		$day = dayOfTheDateVN($datetime[0]);
		$date = formatDate($datetime[0]);
		$time = formatTime($datetime[1]);
		$times = getTime();
		$history = $BillModel->listByNews($id,$time);
		$rangeordered = array();
		$rangesafe = array(array(strtotime('today'),9999999999));
		$datetime = $this->formatDateTime($news['time_created']);
		if (!empty($news) && ($news['condtn'] == 'đã duyệt' || $_SESSION['user']['role'] == 'admin'))
    		require 'View/client/pages/detail.php';
    	else echo 'Trang này không tồn tại';
		if(!empty($history)){
			if(count($rangesafe)==1) 
				splitSpace($rangesafe ,$rangesafe[0] ,array_pop($rangeordered));
			checkAttached($rangesafe, $rangeordered);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$iduser = $_SESSION['user']['id'];
			$rent_day = $_POST['rentdate'];
			$return_day = $_POST['returndate'];
			if(checkValid($rangesafe , strtotime($rent_day),strtotime($return_day))){
				$idnews = $_GET['id'];
				$numday = ((strtotime($return_day) - strtotime($rent_day))/60/60/24)+1;
				$price = $news['price']*$numday;
				$user = $UserModel->getUser($iduser);
				$coin = $user['coin'];
				if($coin >= $price){
					$idbill = $BillModel->insert($iduser, $idnews, $rent_day, $return_day, $times);
					$Order_statusModel->inserts($idbill, $times);
					$UserModel->minusCoin($iduser,$price);
					echo "<script>alert('quý khách đã đặt xe thành công, vui lòng chờ chủ xe xác nhận')</script>";
				}
				else echo "<script>alert('số dư trong tài khoản của quý khách không đủ để giao dịch')</script>";
			}
			else echo "<script>alert('Quý khách vui lòng chọn ngày hợp lệ')</script>";
		}
	}
	public function formatDateTime($datetime){
		$datetime = splitDateTime($datetime);
		$day = dayOfTheDateVN($datetime[0]);
		$date = formatDate($datetime[0]);
		$time = formatTime($datetime[1]);
		return "$day, $date, $time";
	}
}
?>