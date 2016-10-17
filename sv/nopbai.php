<?php
        session_start();
        require_once('check_session.php');
        require_once('connectdb.php');
       
?>

<?php   
    $arrayDapAn = $_POST;
    array_pop($arrayDapAn);
    $numRight = 0;
    foreach($arrayDapAn as $key => $value){
        $sqlCheck = "SELECT COUNT(macauhoi) AS result FROM cauhoi WHERE macauhoi = ".trim($key, "\n")." && dapan = '".trim($value, "\n")."'";
        $result = mysql_query($sqlCheck, $conn);
        while($row = mysql_fetch_array($result, MYSQL_BOTH)){
            if($row['result'] > 0){
                $numRight ++;
            }
        }
    }
    $numQuestion = $_GET['socauhoi'];
    $ketquathi = "$numRight/$numQuestion";
    $_SESSION['ketquathi']['diem'] = $ketquathi;

        $madethi = $_GET['madethi'];
        $masv=$_SESSION['ketquathi']['masv'];
        $hoten=$_SESSION['ketquathi']['hoten'];
        $lophp=$_SESSION['ketquathi']['lophp'];
        $ketquathi=$_SESSION['ketquathi']['diem'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date=date('Y-m-d h:i:s');
        $result = mysql_query(" INSERT INTO ketquathi(masv,hoten,lophp,madethi,ngaythi,ketqua) VALUES ('$masv','$hoten','$lophp', '$madethi', '$date','$ketquathi')");
        if($result === FALSE)
           die(mysql_error());
      //  echo '<dl>';
     //   unset($_SESSION['ketquathi']
    //$_SESSION['ketquathi']['hocphan'] = $hocphan;
    header("location:ketqua.php?madethi=".$_GET['madethi']);
    //echo ("Ket qua:$numRight/$numQuestion");
?>
<?php   
    ?>