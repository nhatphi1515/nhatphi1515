<?php 
class Filter
{
	function __construct()
	{
		require '../Model/PostModel.php';
		$PostModel = new PostModel();
		error_reporting(0);
		$city = $_POST['city'];
		$brand = $_POST['brand'];
		$price = $_POST['price'];
		$color = $_POST['color'];
		$category = $_POST['category'];
		preg_match_all('!\d+!', $price, $prices);
		$min = $prices[0][0];
		$max = $prices[0][1];
		$news = $PostModel->Select($category, $brand, $city, $min, $max, $color);
		require '../View/client/pages/news.php';
	}
} 
?>
