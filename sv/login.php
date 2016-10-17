<?php
ob_start ();
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Online Test | Đăng nhập</title>
   
    <link rel="stylesheet" href="css/login-style.css">
<?php 
if (isset ($_POST['login'])) {
    // lay du lieu tu nguoi dung && loc loi
   // session_start (); 
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $lophp = $_POST['lophp'];
    $madethi = $_POST['madethi'];
    
    $_SESSION['ketquathi']['masv']=$masv;
    $_SESSION['ketquathi']['hoten']=$hoten;
    $_SESSION['ketquathi']['lophp']=$lophp;
    $_SESSION['ketquathi']['madethi']=$madethi;
   // echo "<pre>";
   // print_r($_SESSION['ketquathi']);
   // echo "<pre>";
        header("location:home.php");
}
?>
    <script type="text/javascript" >
        function validateForm(randomCode) {
            var x = document.forms["register"]["code"].value;
            var masv = document.forms["register"]["masv"].value;
            var hoten = document.forms["register"]["hoten"].value;
            var madethi = document.forms["register"]["madethi"].value;
            var lophp = document.forms["register"]["lophp"].value;
            
            if(masv == null || masv == "") {
                alert("Mã sinh viên không được bỏ trống!");
                return false;
            }
            
            if(hoten == null || hoten == "") {
                alert("Trường Họ và tên không được bỏ trống!");
                return false;
            }

            if(madethi == null || madethi == "") {
                alert("Trường Mã đề thi không được bỏ trống!");
                return false;
            }
            
            if(lophp == null || lophp == "") {
                alert("Trường Lớp học phần không được bỏ trống!");
                return false;
            }
            
            if (x != randomCode) {
                alert("Mã xác nhận không đúng!");
                location.reload();
                return false;
            }
        }


        function checkRegister(randomCode) {
            var code = document.register.code.value;
            if(randomCode != code)
                alert("Mã xác nhận không đúng" + randomCode);
                
                return false;
        }
    </script>
</head>
<body>
    <?php
        $randomCode = rand(1000, 9999);
        //echo $randomCode; 
    ?>
    <div class="register">
        <form name="register" action="" onsubmit="return validateForm(<?php echo $randomCode ?>)" method="POST" class="form">
            <label class="dangnhap" >Đăng nhập</label>
            <input type="text" name="masv" placeholder="Mã sinh viên" /><br />
            <input type="text" name="hoten" placeholder="Họ và tên" /><br />
            <input type="text" name="lophp" placeholder="Lớp học phần" /><br />
           <input type="text" name="madethi" placeholder="Mã đề thi" /><br />
            <label class="l1">Mã xác nhận: </label>
            <label class="l2"><b>
            <?php
                echo $randomCode;
            ?>
            </b></label><br />
            <input type="text" name="code" placeholder="Nhập mã xác nhận" /><br />
            <button type="submit" name="login" >Tiếp >></button>
        </form>
    </div>
</body>
</html>