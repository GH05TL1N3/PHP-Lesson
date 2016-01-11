<?php
if(isset($_POST["submit"])){
    if(is_uploaded_file($_FILES["uploadfile"]["tmp_name"])){
    echo "<b>ได้รับไฟล์เรียบร้อยแล้ว</b><br>";
    echo "<b>รายละเอียดไฟล์</b><br><br>";
    echo "ชื่อไฟล์ในเครื่องผู้ใช้ {$_FILES["uploadfile"]["name"]}<br>";
    echo "ชื่อไฟล์ชั่วคราวในเครื่องเซิฟเวอร์ {$_FILES["uploadfile"]["tmp_name"]}<br>";
    echo "ขนาดไฟล์ {$_FILES["uploadfile"]["size"]} ไบต์<br>";
    $target = 'C:\xampp\htdocs\www\target\\'.$_FILES["uploadfile"]["name"];
    $movetotarget = move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target);
            if($movetotarget){
            echo "และได้ทำการย้ายไฟล์ไปยัง ".$target." เรียบร้อยแล้ว";
            }else{
            echo "เกิดปัญหาในการย้ายไฟล์";    
            }
    
            
}
    else{
    echo "เกิดปัญหาในการอัพโหลด";
    }
}
else{
    echo <<<HTML
    <form action="{$_SERVER['PHP_SELF']}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    เลือกไฟล์ที่ต้องการอัพโหลด : <input type="file" name="uploadfile" > :
    <input type="submit" name="submit" value="OK">
    </form>
HTML;
   }
?>