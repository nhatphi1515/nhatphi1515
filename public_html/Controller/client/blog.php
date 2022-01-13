<?php 
Class Blog{
	public function __construct(){
		require 'Model/BlogModel.php';
		require 'Model/CommentModel.php';
		$BlogModel = new BlogModel();
		$CommentModel = new CommentModel();
		$id = $_GET['id'];
		$blog = $BlogModel->get($id);
		$blogs = $BlogModel->all();
		$comment = $CommentModel->getsByBlog($id);
		$datetime = $this->formatDateTime($blog['time_created']);
		require 'View/client/pages/blog.php';
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