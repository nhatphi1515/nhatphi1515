<?php

 class ListOrder
 {
 	
 	function __construct()
	{
		require '../../Model/BillModel.php';
		$BillModel = new BillModel();
		$dataorder = $BillModel->all();
		$dataorder1 = $BillModel->listByStatus('chờ xác nhận');
		$dataorder2 = $BillModel->listByStatus('đã nhận hàng');
		require 'pages/order/list.php';
	}
 }
	
?>