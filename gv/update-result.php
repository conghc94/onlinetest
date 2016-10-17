<?php

    if(session_status() == PHP_SESSION_NONE)
        session_start();
    $hoten = $_GET['hoten'];
    $lophp = $_GET['lophp'];
    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    require './functions/connectdb.php';
    $sql = "UPDATE ketquathi SET hoten = '".$hoten."', lophp = '".$lophp."' WHERE id = '".$id."'";
    mysql_query($sql, $conn);
    require './functions/closeconnection.php';
    header('location:result.php');
