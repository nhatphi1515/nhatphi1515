<?php 

class Logout {
	public function __construct()
	{
		unset($_SESSION['user']); 
			echo "<script> location.href='./'; </script>";
	}
}
?>