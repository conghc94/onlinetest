<?php
    // Start session if it haven't started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $lophp = $_POST['lophp'];
    
    
    include('connectdb.php');
    $result = mysql_query("SELECT * FROM kequathi WHERE masv = '$masv' AND lophp = '$lophp' ", $conn);

    if(mysql_num_rows($result) > 0) {
        // $row = mysql_fetch_array($result);
        include("closeconnection.php");
        $_SESSION['masv'] = $masv;
        header('location:home.php');
        
    } else {
        header('location:login.php');
    }

    

?>