<?php 
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    
    $magv = $_POST['magv'];
    $matkhau = md5(md5($_POST['matkhau']).$magv);
    
    include 'functions/connectdb.php';
    
    $result = mysql_query("SELECT * FROM account WHERE magv = '$magv' AND matkhau = '$matkhau'", $conn);

    if(mysql_num_rows($result) > 0) {
        while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            $hoten = $row['hoten'];
        }
        $_SESSION['magv'] = $magv;
        $_SESSION['hoten'] = $hoten;
        
        include("functions/closeconnection.php");
        header('location:exam.php');
    } else {
        header('location:login.php');
    }
