<?php 
class Comment
{
	
	function __construct()
	{
		require '../Model/CommentModel.php';
		$CommentModel = new CommentModel();
		$key['content'] = $_GET['content'];
		$iduser = $_GET['iduser'];
		$idblog = $_GET['idblog'];
		$idnews = $_GET['idnews'];
		$time = getTime();
		$CommentModel->insert($key['content'], $iduser,$idnews ,$idblog, $time);
		$key['avatar'] = $_SESSION['user']['avatar'];
		$key['name'] = $_SESSION['user']['name'];
		$key['time_created'] = $time;
		require '../View/client/pages/comment.php';
	}
	public function formatDateTime($datetime){
		$datetime = splitDateTime($datetime);
		$day = dayOfTheDateVN($datetime[0]);
		$date = formatDate($datetime[0]);
		$time = formatTime($datetime[1]);
		return "$day, $date, $time";
	}
} ?>