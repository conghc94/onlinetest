<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Test | Đăng nhập</title>
        <link rel="stylesheet" type="text/css" href="css/style-login.css">
        <script type="text/javascript">
            function isValid() {
                var magv = document.login.magv.value;
                var matkhau = document.login.matkhau.value;
                
                if("" == magv) {
                    alert("Chưa nhập Mã giáo viên!");
                    return false;
                }
                
                if("" == matkhau) {
                    alert("Chưa nhập mật khẩu!");
                    return false;
                }
                
                if(matkhau.length > 32 || matkhau.length < 5) {
                    alert("Sai mật khẩu!")
                    return false;
                }
            }
            
            function redirectTo() {
                var _magv = document.login.magv.value;
                window.location = "register.php?_magv=" + _magv;
            }
        </script>
        
    </head>
    <body onload="document.login.magv.focus()">
        <div id="form_login">
        <form id="login" name="login" method="POST" action="check-login.php" onsubmit="return isValid()">
            <input type="text" name="magv" placeholder="Mã giáo viên"/>
            <input type="password" name="matkhau" placeholder="Mật khẩu"/>
            <button id="button1" type="button" name="dangky" onclick="redirectTo()">Đăng ký</button>
            <button id="button2" type="submit" name="dangnhap">Đăng nhập</button>
        </form>
        </div>
        <!-- ?php
            if(isset($_POST['dangky'])) {
                $_GET['_magv'] = $_POST['magv'];
                header('location:register.php');
            }
        ? -->
    </body>
</html>
