<?php
    $id = $_GET['id'];
    require './functions/connectdb.php';
    $sql = "DELETE FROM `ketquathi` WHERE `ketquathi`.`id` = '".$id."'";
    
    if (mysql_query($sql, $conn)) {
        require './functions/closeconnection.php';
        header('location:result.php');
    } else {
        echo "<script>alert('Lỗi!')</script>";
        echo "Error updating record: " . mysqli_error($conn);
        require './functions/closeconnection.php';
        header('location:result.php');
    }    
?>