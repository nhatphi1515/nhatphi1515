<?php 
Class Post{
	public function __construct(){
		require 'Model/PostModel.php';
		require 'Model/CategoryModel.php';
		require 'Model/AddressModel.php';
		$PostModel = new PostModel();
		$CategoryModel = new CategoryModel();
		$AddressModel = new AddressModel();
		$typecar = $CategoryModel->all();
		$brand = $CategoryModel->listBrandByCategory(1);
		$colorcar = $PostModel->getColor();
		$province = $AddressModel->getProvince();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$iduser = $_SESSION['user']['id'];
			$title = $_POST['title'];
			$color = $_POST['color'];
			$price = $_POST['price'];
			$idbrand = $_POST['brand'];
			$idprovince = $_POST['province'];
			$img = $_FILES['img']['name'];
			$descript = $_POST['descript'];
			$address = $_POST['address'];
			$time = getTime();
			if (file_exists("..\..\Public\client\img".basename($img))) 
				$this->Pst($PostModel,$idbrand, $color, $title, $price, $idprovince, $address, $descript, $img, $iduser, $time);
			else if(move_uploaded_file($_FILES["img"]["tmp_name"], "Public/client/img/".basename($img)))
				$this->Pst($PostModel,$idbrand, $color, $title, $price, $idprovince, $address, $descript, $img, $iduser, $time);
		}
		require 'View/client/pages/post.php';
	}
	public function Pst($PostModel,$idbrand, $color, $title, $price, $idprovince, $address, $descript, $img, $iduser, $time){
		
		require 'Model/UserModel.php';
		$UserModel = new UserModel();
		if($UserModel->minusCoin($iduser,15000)){
		    $PostModel->Post($idbrand, $color, $title, $price, $idprovince, $address, $descript, $img, $iduser, $time);
		    echo "<script>alert('quý khách đã đăng tin thành công, vui lòng chờ admin xác nhận')</script>";
		}
		else echo "<script>alert('tin đăng không thành công, ví của quý khách không đủ 15000')</script>";
		
	}
}
?>