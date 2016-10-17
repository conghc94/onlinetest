<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Test | Tạo tài khoản miễn phí</title>
        <script type="text/javascript">
            function checkValid(randomCode) {
                var magv = document.register.magv.value;
                var password_1 = document.register.password_1.value;
                var password_2 = document.register.password_2.value;
                var hoten = document.register.hoten.value;
                var khoa = document.register.khoa.value;
                var email = document.register.e_mail.value;
                var capcha = document.register.capcha.value;
                
                if("" == magv) {
                    alert("Bạn quên chưa điền Mã giáo viên của mình");
                    return false;
                }
                
                if("" == password_1) {
                    alert("Chọn một mật khẩu.");
                    return false;
                }
                
                if(password_1.length < 5 || password_1.length >32) {
                    alert("Mật khẩu quá ngắn hoặc quá dài, mật khẩu hợp lệ có độ dài từ 5-32 ký tự.");
                    return false;
                }
                
                if("" == password_2) {
                    alert("Nhập lại mật khẩu.");
                    return false;
                }
                
                if("" == hoten) {
                    alert("Bạn quên chưa điền thông tin Họ tên của mình");
                    return false;
                }
                
                if("" == khoa) {
                    alert("Bạn quên chưa điền thông tin Khoa bạn đang công tác");
                    return false;
                }
                
                if("" == email) {
                    alert("Bạn quên chưa điền địa chỉ email của mình");
                    return false;
                }
                
                if("" == capcha) {
                    alert("Bạn quên chưa điền mã bảo vệ");
                    return false;
                }
                
                if(password_1 != password_2) {
                    alert("Mật khẩu không khớp giữa 2 lần nhập, vui lòng thử lại.");
                    location.reload();
                    return false;
                }
                
                if(randomCode != capcha) {
                    alert("Mã bảo vệ không đúng!");
                    location.reload();
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <?php
        if(isset($_GET['_magv']))
            $_magv = $_GET['_magv'];
        else
            $_magv = "";
        
        $randomCode = rand(1000, 9999);
        //echo $randomCode; 
        ?>
        
        <form name="register" method="POST" action="create-account.php" onsubmit="return checkValid(<?php echo $randomCode; ?>)">
            <label>Mã giáo viên: </label>
            <input type="text" name="magv" placeholder="Nhập mã giáo viên" value="<?php echo $_magv; ?>"><br/>
            <label>Mật khẩu: </label>
            <input type="password" name="password_1" placeholder="Mật khẩu"><br/>
            <label>Nhập lại mật khẩu: </label>
            <input type="password" name="password_2" placeholder="Mật khẩu"><br/>
            <label>Họ và tên: </label>
            <input type="text" name="hoten" placeholder="Nhập họ và tên"><br/>
            <label>Khoa công tác: </label>
            <input type="text" name="khoa" placeholder="Nhập tên khoa"><br/>
            <label>Địa chỉ email: </label>
            <input type="text" name="e_mail" placeholder="Nhập địa chỉ email"><br/>
            <label>Mã bảo vệ: <b><?php echo $randomCode; ?></b></label>
            <input type="text" name="capcha" placeholder="Nhập mã bảo vệ"><br/>
            <button type="submit" >Tạo tài khoản</button>
        </form>
    </body>
</html>
