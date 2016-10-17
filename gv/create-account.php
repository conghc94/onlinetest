<?php

$magv = $_POST['magv'];
//$matkhau = $_POST['password_1'];
$matkhau = md5(md5($_POST['password_1']).$magv);
$hoten = $_POST['hoten'];
$khoa = $_POST['khoa'];
$e_mail = $_POST['e_mail'];
//echo $e_mail;
require './functions/connectdb.php';
$sql = "INSERT INTO `account`(`magv`, `matkhau`, `hoten`, `khoa`, `email`) VALUES ('" . $magv . "', '" . $matkhau . "', '" . $hoten . "', '" . $khoa . "', '".$e_mail."');";
//echo $sql;
if (mysql_query($sql, $conn)) {
    require './functions/closeconnection.php';
    echo "<script>alert('Xin chúc mừng! Tài khoản của bạn đã được tạo!')</script>";
    //header('location:exam.php');
    header("refresh:1;url=login.php");
} else {
    echo "<script>alert('Mã giáo viên đã tồn tại.')</script>";
    echo "Error updating record: " . mysql_error($conn);
    //die();
    //header('location:exam.php');
    require 'closeconnection.php';
    header("refresh:1;url=register.php");
} echo '<br/>';
