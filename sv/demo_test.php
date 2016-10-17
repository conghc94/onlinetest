<!-- Written by: thuanup-gdth@yahoo.com.vn -->
<?php
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    $_SESSION['thoigian'] = $thoigian = $_GET['thoigian'];
    $_SESSION['madethi'] = $madethi = $_GET['madethi'];
    
    // echo "đang Thi... ".$madethi." - Thời gian làm bài: ".$thoigian." phút";

    
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>thuantd :: Test program</title>
</head>
<body onload="timedText()">
<h1 align="center"><strong>TẬP LÀM TRẮC NGHIỆM</strong></h1>
<h2><strong>Nội dung trắc nghiệm</strong></h2>
<?php
$socau=0;
//$fhandle = @fopen("cttn.txt", "r") or die("Data not found!"); 

if(session_status() == PHP_SESSION_NONE)
        session_start();
        
    $_SESSION['madethi'] = $madethi;
    $madethi = $_GET['madethi'];
    $_SESSION['thoigian'] = $thoigian;
    $thoigian = $_GET['thoigian'];
    $_SESSION['socauhoi'] = $socauhoi;
    $socauhoi = $_GET['socauhoi'];
    
    include('connectdb.php');
    $sql = "SELECT * FROM `cauhoi` WHERE `madethi` = '".$madethi."'";
    
    $result = mysql_query($sql, $conn);
    
    if($result === FALSE)
        die(mysql_error());


?>




<form method="POST" action="">
 <input type="hidden" name="posted" value="true">

<?php
$q=1;
while ($row = mysql_fetch_array($result, MYSQL_BOTH))
{ 
        $macauhoi = $row['macauhoi'];
        $cauhoi = $row['cauhoi'];
        $cautraloi = $row['cautraloi'];
	$txt = $row;
 if ($txt[0]=="?")
 { $socau++;
 $txt[0]='.$cauhoi.';
 echo "<P><strong>Câu số ".$socau.".".$txt."</strong>";
 }
 if ($txt[0]=="!")
 { echo "<br><input type=\"radio\" name=\"pac[".$socau."]\"
value=\"".$txt[1]."\" />";
 $txt[0]=" "; $txt[1]=" ";
 echo "&nbsp;&nbsp;".$txt;
 }
}
$q++;
?>
<p><input type="submit" value="Nộp bài"></p>
</form>
<?php
if (isset($_POST['posted']))
{ $sodiem=0;
echo "<hr />";
echo "<h2><strong>Kết quả từng câu: </strong></h2>";
for ($i=1; $i<=$socau; $i++)
{ if ($i>1) echo "<br />";
 echo "&nbsp; &nbsp; &nbsp; - Câu ".$i.": ";
 if (empty($_POST['pac'][$i])) echo "Không làm";
 else
 { if ($_POST['pac'][$i]=="=")
 { $sodiem++;
 echo "Đúng"; 
 }
 else echo "Sai";
 }
}
echo "<P><strong>Tổng số điểm: </strong>".$sodiem."</P>";
}
?>
</body>
</html> 