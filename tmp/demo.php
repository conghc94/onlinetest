<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require './functions/connectdb.php';
            $sql = "SELECT `dapan` FROM `cauhoi`";
            $result = mysql_query($sql, $conn);
            
            while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                echo trim($row[0]);
            }
        ?>
    </body>
</html>
