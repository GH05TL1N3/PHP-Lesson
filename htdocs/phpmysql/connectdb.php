<?php
$host = "localhost";
$username = "root";
$password = "root";
$database = "ecomdb";

$dbcon = @mysqli_connect($host, $username, $password, $database) or die("ไม่สามารถเชื่อมต่อไปยังฐานข้อมูลได้"." ".mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');
?>