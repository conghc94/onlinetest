<?php
		session_start();
		require_once('check_session.php');
		require_once('connectdb.php');
		$masv=$_SESSION['ketquathi']['masv'];
		$hoten=$_SESSION['ketquathi']['hoten'];
		$lophp=$_SESSION['ketquathi']['lophp'];
		$madethi=$_GET['madethi'];
		$ketquathi=$_SESSION['ketquathi']['diem'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date=date('Y-m-d h:i:s');
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Online Test | Kết quả thi</title>
	<link rel="stylesheet" href="css/ketqua-style.css">
</head>
<body>
	
	<?php
		if(isset($_POST['submit'])){
			include("location: login.php");
		}
	?>
	<div class="main">
	<form action="" name="frmketqua" method="POST" class="form">
		<label class="ketqua">Kết quả</label> <br />
		<label class="label">Mã sinh viên:</label><input type = "text" disabled name="masv" value = "<?php echo $masv?>" /><br />
		<label class="label">Họ tên:</label><input type = "text" disabled name="hoten" value = "<?php echo $hoten?>" /> <br />
		<label class="label">Lớp học phần:</label><input type = "text" disabled name="lophp" value = "<?php echo $lophp?>" /><br />
		<label class="label">Mã đề thi:</label><input type = "text" disabled name="madethi" value = "<?php echo $madethi?>" /><br />
		<label class="label">Kết quả thi:</label><input type = "text" disabled name="ketquathi" value = "<?php echo $ketquathi?>" /><br />
		<label class="label">Ngày thi:</label><input type = "text" disabled name="ngaythi" value = "<?php echo $date?>" /><br />
		<input type="submit" name="submit" value="Xác nhận" style="width:110px"/>
		<?php
			unset($_SESSION['ketquathi']);
		?>
	</form>
	</div>
</body>
</html>