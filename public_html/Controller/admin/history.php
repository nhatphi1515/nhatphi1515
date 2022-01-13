<?php 
class History
{
	function __construct()
	{
		require '../../Model/Bill_topupModel.php';
		$Bill_topupModel = new Bill_topupModel();
		$bill =  $Bill_topupModel->all();
		require 'pages/history.php';
	}
} ?>