<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "tracnghiemdb";
    
    $conn = mysql_connect($host, $user, $pass) or die("Could not connect to Database");
    
    mysql_select_db($database, $conn) or die("Not Found Database");
    
    mysql_set_charset("utf8", $conn);