<?php
$madethi = $_GET['madethi'];
include './functions/connectdb.php';
// delete from table dethi
$sql1 = "DELETE FROM `dethi` WHERE `dethi`.`madethi` = '".$madethi."'";
// delete questions from table cauhoi
$sql2 = "DELETE FROM `cauhoi` WHERE `cauhoi`.`madethi` = '".$madethi."'";

if(mysql_query($sql1, $conn) && mysql_query($sql2, $conn)) {
    include './functions/closeconnection.php';
    header('location:exam.php');
} else {
    echo "<script>alert('Lỗi!')</script>";
    echo "Error updating record: " . mysqli_error($conn);
    //header('location:exam.php');
    header("refresh:1;url=exam.php");
    include("closeconnection.php");
}