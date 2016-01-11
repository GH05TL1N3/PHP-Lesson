<?php
if(isset($_POST["submit"])){
    echo "<b>รายละเอียดไฟล์</b><br><br>";
    echo "ชื่อไฟล์ในเครื่องผู้ใช้ {$_FILES["uploadfile"]["name"]}<br>";
    echo "ชื่อไฟล์ชั่วคราวในเครื่องเซิฟเวอร์ {$_FILES["uploadfile"]["tmp_name"]}<br>";
    echo "ขนาดไฟล์ {$_FILES["uploadfile"]["size"]} ไบต์<br>";
    }
else{
    echo <<<HTML
    <form action="{$_SERVER['PHP_SELF']}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    เลือกไฟล์ที่ต้องการอัพโหลด : <input type="file" name="uploadfile"> :
    <input type="submit" name="submit" value="OK">
    </form>
HTML;
   }
?>