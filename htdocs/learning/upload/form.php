<?php
echo "ได้รับข้อมูลแล้ว"."<br><br>";

echo "วัน/เดือน/ปี ที่กรอกข้อมูล : "."<b>".$_POST["date"]."</b>"."<br>";
echo "ชื่อ : "."<b>".$_POST["firstname"]."</b>"."<br>";
echo "สกุล : "."<b>".$_POST["lastname"]."</b>"."<br>";
echo "username : "."<b>".$_POST["username"]."</b>"."<br>";
echo "password : "."<b>".$_POST["password"]."</b>"."<br>";
echo "comment : "."<b>".$_POST["comment"]."</b>"."<br>";
echo "Programming : "."<b>".$_POST["programing"]."</b>"."<br>";
echo "sex : "."<b>".$_POST["sex"]."</b>"."<br>";
echo "การศึกษา : "."<b>".$_POST["edu"]."</b>"."<br><br><br>";



echo print_r($_POST);

?>
