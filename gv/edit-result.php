<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Test | Cập nhật thông tin</title>
        <link rel="stylesheet" href="css/style-edit-result.css">
        <script type="text/javascript">
            function checkValid() {
                var hoten = document.editForm.hoten.value;
                var lophp = document.editForm.lophp.value;
                
                if("" == hoten) {
                    alert("Bạn quên chưa nhập thông tin Họ tên.");
                    return false;
                }
                
                if("" == lophp) {
                    alert("Bạn quên chưa nhập thông tin Lớp học phần.");
                    return false;
                }
            }
        
        </script>
    </head>
    <body>
        <?php
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        
        require './header.php';
        echo '<div id="main_content">';
        echo '<h3>Cập nhật thông tin</h3>';
        
        $id = $_GET['id'];
        require './functions/connectdb.php';
        $sql = "SELECT * FROM `ketquathi` WHERE `id` = '".$id."'";
        $result = mysql_query($sql, $conn);
        while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            $id = $row['id'];
            $masv = $row['masv'];
            $hoten = $row['hoten'];
            $lophp = $row['lophp'];
            $madethi = $row['madethi'];
            $ngaythi = $row['ngaythi'];
            $ketqua = $row['ketqua'];
        }
        $_SESSION['id'] = $id;
        echo '
            <form name="editForm" action="update-result.php" onsubmit="return checkValid()">
                <label>Mã số SV: </label>
                <input type="text" name="masv" disabled="true" value="'.$masv.'"><br/>
                <label>Họ và tên: </label>
                <input type="text" name="hoten" value="'.$hoten.'"><br/>
                <label>Lớp học phần: </label>
                <input type="text" name="lophp" value="'.$lophp.'"><br/>
                <label>Mã đề thi: </label>
                <input type="text" name="madethi" disabled="true" value="'.$madethi.'"><br/>
                <label>Ngày thi: </label>
                <input type="text" name="ngaythi" disabled="true" value="'.$ngaythi.'"><br/>
                <label>Kết quả thi: </label>
                <input type="text" name="ketqua" disabled="true" value="'.$ketqua.'"><br/>
                <button type="submit">Lưu</button>
        ';
        echo '</div>';
        ?>
    </body>
</html>
