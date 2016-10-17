<?php

    if(session_status() == PHP_SESSION_NONE)
        session_start();
    
    if(session_destroy())
        header("location:login.php");
    else {
        echo '<script>alert("Đăng xuất không thành công. Vui lòng thử lại sau!");</script>';
        header("refresh:1;url=exam.php");
    }