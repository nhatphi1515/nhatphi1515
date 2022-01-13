<?php 
	
	class Manage 
	{
		
		function __construct()
		{
			require '../Model/BillModel.php';
			$BillModel = new BillModel();
			$id = $_POST['id'];
			$news = $BillModel->selectBill($id);
			require '../View/client/pages/status.php';
		}
		public function getIcon($condition){
			switch ($condition) {
				case 'cho thuê':
					return 'checkmark.png';
					break;
				case 'không cho thuê':
					return 'cancel.png';
					break;
				default:
				break;
			}
		}
	}
	?>