<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Online Test | Tải lên đề thi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style-upload.css">
    <script type="text/javascript">
        
        function checkValid() {
            var socauhoi = document.metadata.socauhoi.value;
            var thoigian = document.metadata.thoigian.value;
            var textFile = document.getElementById('text-file').value;
            
            if("" == document.metadata.hocphan.value) {
                alert("Bạn quên chưa nhập tên học phần.");
                return false;
            }
            
            if("" == document.metadata.madethi.value) {
                alert("Bạn quên chưa nhập mã đề thi.");
                return false;
            }
            
            if("" == socauhoi) {
                alert("Bạn quên chưa nhập số câu hỏi.");
                return false;
            }
            
            if("" == thoigian) {
                alert("Bạn quên chưa nhập thông tin về thời gian làm bài.");
                return false;
            }
            
            if("" == textFile) {
                alert("Bạn quên chưa chọn file đính kèm.");
                return false;
            }
        }
    </script>
    
</head>
<body onload="document.metadata.hocphan.focus()">
    <?php
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    
    require 'header.php';
    ?>
    <div id="main_content">
    <h3>Tải lên đề thi</h3>
    <div class="thongtin">Thông tin đề thi:</div>
    <p id="info">Điền đầy đủ thông tin mô tả cho đề thi, sau đó chọn file đề thi và nhấn nút Tải lên để hoàn tất quá trình tải lên</p>
    <form id="metadata" name="metadata" method="post" action="" enctype="multipart/form-data" onsubmit="return checkValid()">
        <label class="lb">Tên học phần<font color="red">*</font> </label> <input type="text" name="hocphan" placeholder="VD: Lập trình hệ thống"><br/>
        <label class="lb">Mã đề thi<font color="red">*</font> </label><input type="text" name="madethi" placeholder="VD: LTHT01-2016"><br/>
        <label class="lb">Số câu hỏi<font color="red">*</font> </label><input type="text" name="socauhoi" placeholder=""><br/>
        <label class="lb">Thời gian làm bài<font color="red">*</font> </label><input type="text" name="thoigian" placeholder="(phút)"><br/>
        <label class="lb">Ghi chú </label><input type="text" name="mota" placeholder=""><br/>
        <label class="lb">Chọn file đề thi để tải lên<font color="red">*</font> </label>
        <input type="file" id="text-file" name="textFile" accept="text/plain" /><br/>
        <button type="submit" name="uploadButton">Tải lên</button>
        <br/>
    </form>
    <br/><div class="luuy">Lưu ý:</div>
    <div class="list">
    <ul>
        <li>Các thông tin đều yêu cầu phải nhập <b><font color="red">chính xác</font></b> và <b><font color="red">đầy đủ</font></b> (trừ phần mô tả).</li>
        <li>Mã đề thi không được trùng với mã đề thi đang tồn tại.</li>
        <li>Hệ thống chỉ chấp nhận những file văn bản định dạng text <i>(<b>*.txt</b>)</i>.<br/>
            Nội dung bên trong file văn bản chứa các câu hỏi phải soạn đúng theo mẫu: <br/>
            <div class="code">
            <code>
                Nội dung câu hỏi<br/>
                <b>%</b>Đáp án thứ nhất.<br/>
                <b>&</b>Đáp án thứ Hai.<br/>
                <b>&</b>Đáp án thứ ba.<br/>
                <b>&</b>Đáp án thứ tư.<br/>
                <b>%</b>Đáp án đúng.<br/>
                <b>`</b>
            </code>
            </div>
            <i>Ví dụ:</i>
            <div class="code">
            <code>
                Đâu là thủ đô của Việt Nam?<br/>
                <b>%</b>A. Ninh Bình.<br/>
                <b>&</b>B. Huế.<br/>
                <b>&</b>C. TP. HCM.<br/>
                <b>&</b>D. Hà Nội.<br/>
                <b>%</b>D<br/>
                `Việt Nam nằm ở múi giờ GMT thứ mấy?<br/>
                <b>%</b>A. +6.<br/>
                <b>&</b>B. +7.<br/>
                <b>&</b>C. -6.<br/>
                <b>&</b>D. -7.<br/>
                <b>%</b>B<br/>
                `Đâu là tỉnh thuộc Miền Trung Việt Nam?<br/>
                <b>%</b>A. Lai Châu.<br/>
                <b>&</b>B. Quảng Ngãi.<br/>
                <b>&</b>C. Bà Rịa-Vũng Tàu.<br/>
                <b>&</b>D. Đồng Tháp.<br/>
                <b>%</b>B<br/>
            </code>
            </div>
        </li>
    </ul>
    </div>
    
    <!-- Xử Lý Upload -->
    <?php 
    
    // Nếu người dùng click Upload
    if (isset($_POST['uploadButton'])) {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['textFile'])) {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['textFile']['error'] > 0) {
                echo '<script>
                        alert("Lỗi!\nHệ thống không thể tải lên file của bạn. Vui lòng kiểm tra lại.\nXin cám ơn!");
                      </script>';
            } else{
                /*
                $checkFile = './upload/'.$_FILES['textFile']['name'];
                if (file_exists('./upload/'.$_FILES['textFile']['name'])) {
                    unlink($fileName);
                }
                 */
                // Upload file vào thư mục ./gv/upload
                // Tên file = mã-đề-thi_tên-file-gốc.
                move_uploaded_file($_FILES['textFile']['tmp_name'], './upload/'.$_FILES['textFile']['name']);
                echo '<script>
                        alert("Đã tải lên!\nHệ thống đang sử xử lý đề thi. Vui lòng không tắt hoặc tải lại trình duyệt trong giây lát.\nXin cám ơn!");
                      </script>';
                
                // Kết nối đến DB
                require './functions/connectdb.php';
                
                $magv = $_SESSION['magv'];
                $hocphan = $_POST['hocphan'];
                $madethi = $_POST['madethi'];
                $socauhoi = $_POST['socauhoi'];
                $thoigian = $_POST['thoigian'];
                $mota = $_POST['mota'];
                
                //Xử lý dữ liệu
                //Mở file và đọc nội dung file
                $fileName = './upload/'.$_FILES['textFile']['name'];
                $fs = fopen($fileName, 'r');
                $content = fread($fs, 8192);
                fclose($fs);
                //unlink($fileName);
                //echo $content;
                
                // Cập nhật thông tin vào bảng đề thi
                $sql_dethi = "INSERT INTO `dethi`(`magv`, `madethi`, `hocphan`, `socauhoi`, `thoigian`, `mota`) VALUES ('".$magv."','".$madethi."','".$hocphan."','".$socauhoi."','".$thoigian."','".$mota."')";
                if(mysql_query($sql_dethi, $conn)){
                    // Xử lý tách từng câu hỏi trong file
                    $question = explode("`", $content);
                    $length = count($question);
                    //echo 'rows: '.$length.'<br/>';
                    //$cauhoi = new CauHoi();
                    // Đưa từng dòng (record) vào db
                    for($i = 0; $i < $length; $i++) {
                        // Tách từng trường câu hỏi, trả lời, đáp án.
                        $element = explode("%", $question[$i]);
                        $len = count($element);
                        //echo $len.' : ';
                        /*
                        echo $element[0];
                        echo $element[1];
                        echo $element[2];
                        for($j = 0; $j < $len; $j++) {
                            echo $element[$j];
                            //echo '<br/>';
                        }
                        */
                        // Cập nhật vào bảng `cauhoi`
                        $sql_cauhoi = "INSERT INTO `cauhoi`(`madethi`, `cauhoi`, `cautraloi`, `dapan`) VALUES ('".trim(trim($madethi), "\n")."','".trim(trim($element[0]), "\n")."','".trim(trim($element[1]), "\n")."','".trim(trim($element[2]), "\n")."')";
                        // Thực thi sql và đóng kết nối
                        if(mysql_query($sql_cauhoi, $conn)) {
                            //require './functions/closeconnection.php';
                            //header('location:exam.php');
                            //header("refresh:1;url=exam.php");
                        } else {
                            echo "Error updating record: " . mysql_error($conn);
                            echo "<script>alert('Lỗi! Có lỗi xảy ra, bạn vui lòng xóa đề thi có mã vừa tạo trong trang quản lý đề thi.')</script>";
                            //die();
                            //header('location:exam.php');
                            //header("refresh:1;url=exam.php");
                            //require './functions/closeconnection.php';
                        }
                    }
                    require './functions/closeconnection.php';
                    echo "<script>alert('Đã hoàn tất!')</script>";
                    header("refresh:1;url=exam.php");
                } else {
                    echo "Error updating record: " . mysql_error($conn);
                    echo "<script>alert('Lỗi! Chưa tạo đề thi thành công.')</script>";
                    //die();
                    //header('location:exam.php');
                    //header("refresh:1;url=exam.php");
                    require("./functions/closeconnection.php");
                }
               //require './functions/closeconnection.php';
            }
        } else{
            echo '<script>
                    alert("Opps!\nBạn quên chọn file để tải lên.");
                  </script>';
        }
    }
    
    ?>
    </div>
</body>
</html>

<?php ob_flush(); ?>