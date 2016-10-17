        <link rel="stylesheet" type="text/css" href="css/style-header.css">


    <?php
        if(session_status() == PHP_SESSION_NONE)
            session_start ();
        
        echo '
            <div id="header">
                <div class="login_status">
                    <a href="logout.php">Đăng xuất</a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="exam.php">Danh sách Đề thi</a></li>
                        <li><a href="result.php">Kết quả thi</a></li>
                    </ul>
                </div>
            </div>
        ';

    ?>
