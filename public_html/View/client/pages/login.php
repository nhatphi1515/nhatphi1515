
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="Public/client/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="Public/client/css/style1.css">
</head>
<body>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="Public/client/img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="?controller=signup" class="signup-image-link">Đăng ký tài khoản</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form  method="POST" class="register-form" id="login-form" name="login" onsubmit="return checkLogin()">
                            <div class="form-group">
                                <label class="lb" for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Tên tài khoản"/>
                            </div>
                            <div class="form-group">
                                <label class="lb" for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ đăng nhập</label>
                            </div>
                            <div class="form-group">
                            	<label for="eror" class="label-agree-term" style="color: red"><?php echo $message ?></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                    </div>
                </div>
            </div>
        </section>

    <script type="text/javascript">
        function checkLogin(){
            var x = document.forms["login"]['your_name'].value;
            var y = document.forms["login"]['your_pass'].value;
            if (x == "") {
                alert("Bạn chưa nhập tên đăng nhập");
                return false;
            }
            else if (y == "") {
                alert("Bạn chưa nhập mật khẩu");
                return false;
            }
        }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
    
</html>