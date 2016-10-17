<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Test | Danh Sách đề thi</title>
        <link rel="stylesheet" type="text/css" href="css/style-exam.css">
        <script type="text/javascript" language="javascript">

            function getConfirmation(madethi) {
                if(confirm("Xóa đề thi có mã " + madethi + " thì bạn sẽ không thể xem kết quả thi của các sinh viên đã thi học phần đó.\nXác nhận xóa khỏi Cơ sở dữ liệu?"))
                    window.location = ("delete.php?madethi=" + madethi);
            }
            
            function redirectTo(location) {
                window.location = location;
            }
        </script>
        
    </head>
    <body>
        <?php
            if(session_status() == PHP_SESSION_NONE)
                session_start();
            $magv = $_SESSION['magv'];
            $hoten = $_SESSION['hoten'];
            // echo "Chào mừng ".$hoten." đã đăng nhập.";
            require 'header.php';
        ?>
        
        <div id="main_content">
            <div id="title">
                <h2>DANH SÁCH ĐỀ THI</h2>
            </div>
            <button name="upload" onclick="redirectTo('upload.php')">Tải lên đề thi mới</button>
            <?php
            require('./functions/connectdb.php');
            $result = mysql_query("SELECT * FROM dethi WHERE magv = '".$magv."'", $conn);
            if($result === FALSE) { 
                die(mysql_error());
            }
            echo '<br/>
                <table>
                <tr>
                    <th width="10%">Mã đề thi</th>
                    <th width="25%">Học phần</th>
                    <th width="10%">Số câu hỏi</th>
                    <th width="10%">Thời gian làm bài</th>
                    <th width="35%">Mô tả</th>
                    <th width="10%">Tùy chọn</th>
                </tr>';
            while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                $key = $row['madethi'];
                echo '<tr>
                        <td>'.$key.'</td>
                        <td>'.$row['hocphan'].'</td>
                        <td>'.$row['socauhoi'].'</td>
                        <td>'.$row['thoigian'].'</td>
                        <td>'.$row['mota'].'</td>
                        <td align="center">
                            <a href="edit-exam.php?madethi='.$key.'"><img src="img/edit16.png" title="Xem và sửa đề thi"></a>  
                            <a href="javascript:void(0)" onClick="javascript:getConfirmation(\''.$key.'\')"><img src="img/remove16.png" title="Xóa khỏi danh sách"></a></td>
                        </tr>';
            }
            echo '</table>';

            require './functions/closeconnection.php';
        ?>
        </div>
    </body>
</html>
