<?php
session_start();
require_once('connectdb.php');
require_once('check_session.php');

?>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Online Test | Thi</title>
    <style>
        div.fixed {       
            font-size: 18px;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100%;
            border: 3px solid #73AD21;
            margin-top: 10px;
            background-color: #73AD21;
            color: #A50E0E;
        }
    </style>
    <!-- require_once CSS File Here-->
    <link rel="stylesheet" href=""/>
    <!-- require_once JS File Here-->
    <link rel="stylesheet" href="css/test-style.css">
    <script src="js/auto_submit.js"></script>
</head>

<body>
    <div class="main">
        <?php
        $madethi = $_SESSION['ketquathi']['madethi'];
        $sql = "SELECT hocphan FROM dethi WHERE madethi='$madethi'";
        $result = mysql_query($sql,$conn);
        if ($result ===FALSE) {
            die(mysql_error());
        }
        while($row = mysql_fetch_array($result, MYSQL_BOTH)) { //Đưa ra một mảng với chỉ số kết hợp giữa hai loại trên                                                             
            $hocphan = $row['hocphan']; 
        }
        ?>

        <h3><?php echo"$hocphan"?></h3>
        <form name="QA" action="nopbai.php?socauhoi=<?php echo $_GET['socauhoi']?>&&madethi=<?php echo $_GET['madethi']?>" method="POST" id = "xacnhan" class="form">
            <?php
	//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);    
    //$_SESSION['ketquathi']['madethi'] = $madethi;
            $sql = "SELECT cauhoi.*,dethi.thoigian FROM cauhoi inner join dethi on dethi.madethi = cauhoi.madethi WHERE cauhoi.madethi = '".$_GET['madethi']."'";
            $result = mysql_query($sql, $conn);
            if($result === FALSE)
                die(mysql_error());
            $q=1;
            while($row = mysql_fetch_array($result, MYSQL_BOTH)) {

                $macauhoi = $row['macauhoi'];
                $thoigian = $row['thoigian'];
                $cauhoi = $row['cauhoi'];
                $cautraloi = $row['cautraloi'];
                $array_cautraloi = explode("&", $cautraloi);
                $arrcauhoi[$macauhoi] = $row['dapan'];

                echo '<p><b>'.$q.".</b> ".$cauhoi.'</p>';
       // echo '<p>'.$cautraloi.'</p>';        
                $q++;
                ?>
                <!--<i>Trả lời: </i><br /> -->
                <div class="radio">
                <input type="radio" name="<?php echo($macauhoi)?>" value="A">A. <?php echo "$array_cautraloi[0]";?><br>
                <input type="radio" name="<?php echo($macauhoi)?>" value="B">B. <?php echo "$array_cautraloi[1]";?><br>
                <input type="radio" name="<?php echo($macauhoi)?>" value="C">C. <?php echo "$array_cautraloi[2]";?><br>
                <input type="radio" name="<?php echo($macauhoi)?>" value="D">D. <?php echo "$array_cautraloi[3]";?><br>
                <br />
                </div>
                <?php
            }
            ?>
            <div class="input">
                <input id = "test" type="submit"  name="nopbai" align="center" style="margin-bottom: 80px; margin-top: 30px;" value = "Nộp bài" />
            </div>
        </form>

        <script>
            function myFunction() {
                document.getElementById("xacnhan").submit();
        //alert("fdsf");
    }   
</script>
        <?php
        ?>
        <div class="fixed">
            <p>Thời gian còn lại: <b id="counter"></b>. </p>
        </div>
        <script>
            var myVar = setInterval(myTimer, 1000);
            var k = <?php echo $thoigian?> * 60;
            function myTimer() {
                if(k == 0){
                        //clearInterval(myVar);
                        myFunction();
                    }
                    //
                    document.getElementById("counter").innerHTML = Math.floor((k/60)) + ":" + (k%60);
                    k--;
                }
            </script>

</div>
</body>
</html>