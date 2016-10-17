<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Test | Kết quả thi</title>
        <link rel="stylesheet" type="text/css" href="css/style-result.css">
        <script type="text/javascript" language="javascript">
            function getConfirmation(masv) {
                if(confirm("Xóa kết quả thi có id = " + masv + " khỏi danh sách?"))
                    window.location = ("delete-student.php?id=" + masv);
            }
            
        </script>
    </head>
    <body onload="document.searchBar.focus.focus()">
        <?php
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        
        $magv = $_SESSION['magv'];
        
        require './header.php';
        ?>
        <div id="main_content">
            <div id="title">
                <h2>DANH SÁCH KẾT QUẢ THI</h2>
            </div>
            
            <div class="search-wrapper">
                <form name="searchBar" action="search-result.php" >
                    <input type="text" name="focus" required class="search-box" placeholder="Tìm tên sinh viên..." />
                    <button class="close-icon" type="reset"></button>
                </form>
            </div>

            
            <!--div id="search">
                <form name="searchBar" action="#" onsubmit="return 0" >
                    <input type="text" name="item" placeholder="Tìm kiếm tên sinh viên"/>
                    <button type="submit"></button>
                </form>
            </div-->     
            
        <?php
        
        require './functions/connectdb.php';
        
        $sql = "SELECT * FROM `ketquathi` WHERE `madethi` IN (SELECT `madethi` FROM `dethi` WHERE `magv` = '".$magv."')";
        //"SELECT * FROM `ketquathi`"
        $result = mysql_query($sql, $conn);
        if($result === false){
            die(mysql_error());
        }
        
        echo '
            <table>
                <tr>
                    <th>ID</th>
                    <th>Mã SV</th>
                    <th>Họ và tên</th>
                    <th>Lớp HP</th>
                    <th>Mã đề thi</th>
                    <th width="17%">Ngày thi</th>
                    <th>Kết quả</th>
                    <th>Tùy chọn</th>
                </tr>';
        while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            echo '
              <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['masv'].'</td>
                <td width="30%">'.$row['hoten'].'</td>    
                <td align="center">'.$row['lophp'].'</td>
                <td align="center">'.$row['madethi'].'</td>
                <td align="right">'.$row['ngaythi'].'</td>
                <td align="center">'.$row['ketqua'].'</td>    
                <td align="center">
                    <a href="edit-result.php?id='.$row['id'].'"><img src="img/edit16.png" title="Sửa thông tin"></a>
                    <a href="javascript:void(0)" onClick="getConfirmation('.$row["id"].')" ><img src="img/remove16.png" title="Xóa khỏi danh sách"></a></td>
              </tr>
            ';
        }
        echo '</table>';
        require './functions/closeconnection.php';
        ?>
        </div>
    </body>
</html>
