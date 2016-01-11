<?php
require 'connectdb.php';

$pt_name = "รองเท้า";

$sqlquery = "INSERT INTO producttype (pt_id, pt_name) VALUES ('', '$pt_name')";

$result = @mysqli_query($dbcon, $sqlquery);

if($result == TRUE){
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
}
else{
    echo "ไม่สามารถเพิ่มข้อมูลได้"." ".mysqli_errno($dbcon);
}









?>

