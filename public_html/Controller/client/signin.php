<?php

class Signin{
	public function __construct(){
		require('Model/UserModel.php');
		$userModel = new UserModel();
		$message = $this->signIn($userModel);
		require('View/client/pages/login.php');
	}
	public function signIn($userModel) {
		$message = NULL;
		if (isset($_POST['signin'])) {
			$username = $_POST['your_name'];
			$password = md5($_POST['your_pass']);
			if ($username && $password) {
				$checkuser = $userModel->signin($username, $password);
				if ($checkuser->num_rows > 0) {
					$user = $checkuser->fetch_array();
					if ($user['role']=='visitor') 
						$message = 'Tài khoản của bạn chưa được xác nhận';
					else{
						$_SESSION['user'] = $user;
						echo "<script>	
							location.href='./';
						</script>";
						} 
				}else {
					$message = "Đăng nhập thất bại";
				}
			}
		return $message;	
		}
	}
}
?>