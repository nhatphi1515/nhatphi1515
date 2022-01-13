<?php
class ListNews {
	public function __construct()
	{
		require('../../Model/PostModel.php');
		$PostModel = new PostModel();
		$data = $PostModel->list();
		require('pages/post/list.php');
	}
}