<?php /**
 * 
 */
class ListComment
{
	
	function __construct()
	{
		require '../../Model/CommentModel.php';
		$CommentModel = new CommentModel();
		$datacomment = $CommentModel->list();
		require 'pages/comment/list.php';
	}
} ?>