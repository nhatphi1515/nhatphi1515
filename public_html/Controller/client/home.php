<?php /**
 * 
 */
class Home
{
	
	function __construct()
	{
		require 'Model/PostModel.php';
		require 'Model/CategoryModel.php';
		require 'Model/AddressModel.php';
		require 'Model/BlogModel.php';
		$PostModel = new PostModel();
		$AddressModel = new AddressModel();
		$CategoryModel = new CategoryModel();
		$BlogModel = new BlogModel();
		$news =  $PostModel->all();
		$blogs =  $BlogModel->all();
		if (isset($_GET['type'])) {
			$id = $_GET['type'];
			$province = $AddressModel->getProvince();
			$news =  $PostModel->listByType($id);
			$type = $CategoryModel->getCategory($id);
			$brand =  $CategoryModel->listBrandByCategory($id);
			$color =  $PostModel->getColor();
		}
		if (isset($_GET['find'])) {
			$content = $_GET['find'];
			$news =  $PostModel->find($content);
		}
		require 'View/client/pages/home.php';
	}
} ?>