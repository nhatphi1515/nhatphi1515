
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="Public/client/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="Public/client/css/style1.css">
    <style type="text/css">
        input{
            padding: 6px;
        }
    </style>
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký tài khoản</h2>
                        <form method="POST"  enctype="multipart/form-data" class="register-form" id="register-form" name="regis" onsubmit="return checkRegis()">
                            <div class="form-group">
                                <input type="text" name="name" maxlength="20" id="name" placeholder="Họ và tên"/>
                            </div>
                            <div class="row">
                                <div class="form-group col-9">
                                    <input type="text" name="email" id="email" placeholder="Email"/>
                                </div>
                                <div class="form-group col-3">
                                    <select name="sex" style="width: 100%; padding-left: 10px">
                                        <option value="male">nam</option>
                                        <option value="female">nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="account" id="account" placeholder="Tên tài khoản"/>
                            </div>
                            <div class="row">
                                <div class="form-group col-7">
                                    <input type="text" name="dob"   onfocus="(this.type='date')" maxlength="10" id="dob" placeholder="Ngày sinh(mm/dd/yyyy)"/>
                                </div>
                                <div class="form-group col-5">
                                    <input type="number" name="phone" id="phone" placeholder="Số điện thoại"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" id="pass" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <label for="frontID" style="width: 100%">
                                <div class="form-group" id="frntid" style="width: 100%; height: 200px; border: 1px solid black;">
                                    <input type="file" name="frontID" id="frontID" style="display: none;" accept=".jpg,.jpeg,.png" />
                                    <img src="" id="ifid" for="frontID" style="display: none;">
                                    <label id="fid" for="frontID" >ảnh CMND mặt trước</label>
                                </div>
                            </label>
                            <label for="backID" style="width: 100%">
                                 <div class="form-group" style="width: 100%; height: 200px; border: 1px solid black;">
                                    <input type="file" name="backID" id="backID" accept=".jpg,.jpeg,.png"  style="display: none;"/>
                                    <img src="" id="ibid" style="display: none;">
                                    <label id="bid" for="backID" >ảnh CMND mặt sau</label>
                                </div>
                            </label>
                            <div class="form-group">
                                <label for="eror" class="label-agree-term" style="color: red"><?php  echo $message; ?></label>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image"> 
                        <figure><img src="Public/client/img/signup-image.jpg" alt="sign up image"></figure>
                        <a href="?controller=signin" class="signup-image-link">Tôi đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function checkRegis(){
            var x = document.forms["regis"]['name'].value;
            var y1 = document.forms["regis"]['pass'].value;
            var y2 = document.forms["regis"]['re_pass'].value;
            var z = document.forms["regis"]['account'].value;
            if (x == "") {
                alert("Bạn chưa nhập tên hiển thị");
                return false;
            }
            else if (z == "") {
                alert("Bạn chưa nhập tên tài khoản");
                return false;
            }
            else if (y1 == "") {
                alert("Bạn chưa nhập tên tài khoản");
                return false;
            }
            else if (y1 != y2) {
                alert("Mật khẩu nhập lại không khớp");
                return false;
            }
       }
        $("#frontID").change(function(){
            var fullPath = $("#frontID").get(0).files;
            if (fullPath) {
               var filename = document.getElementById('frontID').files[0].name;
                $("#ifid").attr("src",URL.createObjectURL(event.target.files[0]));
                $("#ifid").css("display","block");
                $("#fid").text(filename);
            }   
        });
        $("#backID").change(function(){
            var fullPath = $("#backID").get(0).files;
            if (fullPath) {
                var filename = document.getElementById('backID').files[0].name;
                $("#ibid").attr("src",URL.createObjectURL(event.target.files[0]));
                $("#ibid").css("display","block");
                $("#bid").text(filename);
            }   
        });
    </script>
</body>
    
</html>
