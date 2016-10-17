<?php
        session_start();
        require_once('check_session.php');
        require_once('connectdb.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <title>Online Test | Học phần</title>
	<link rel="stylesheet" href="css/home-style.css">
</head>
<body>
<div class="content">
<div class="text">
    <h3>Chọn học phần</h3>
    <p>Bấm chọn học phần để vào thi.</p>
    <?php
       // error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        $masv=$_SESSION['ketquathi']['masv'];
        $hoten=$_SESSION['ketquathi']['hoten'];
        $lophp=$_SESSION['ketquathi']['lophp'];
        $madethi=$_SESSION['ketquathi']['madethi'];

        //$madethi = $_POST['madethi'];
     

        $query22 = "SELECT * FROM dethi WHERE (madethi NOT IN (SELECT madethi FROM ketquathi WHERE masv = '$masv' and hoten = '$hoten' and lophp = '$lophp')) AND madethi='$madethi' ";
        $result = mysql_query($query22, $conn);
        if($result === FALSE)
            die(mysql_error());
        echo '<dl>';
        while($row = mysql_fetch_array($result, MYSQL_BOTH)) { //Đưa ra một mảng với chỉ số kết hợp giữa hai loại trên                                                             
            $madethi = $row['madethi'];                         //MYSQL_ASSOC: Đưa ra một mảng với chỉ số của mảng là tên trường
            $hocphan = $row['hocphan'];                         //MYSQL_NUM: Đưa ra một mảng với chỉ số của mảng là số thứ tự của trường được liệt kê trong câu truy vấn SQL
            $socauhoi = $row['socauhoi'];
            $thoigian = $row['thoigian'];
            $mota = $row['mota'];
            
            echo '<a href="test.php?madethi='.$madethi.'&&socauhoi='.$socauhoi.'"><dt><b>'.$row['hocphan'].'</b></dt></a>'; //
            echo "<dd>Mã đề: ".$madethi." - Thời gian làm bài: ".$thoigian." phút</dd>";
        }
        echo '</dl>';
        require_once('closeconnection.php');
 ?>
 <?php
    ?>
</div>
</div>  
</body>
</html>