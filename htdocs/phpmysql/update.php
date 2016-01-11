<?php
require "connectdb.php";

$pro_id = 1;
$pro_name = "เสื้อเชิร์ต";

$sqlquery = "UPDATE product SET pro_name='$pro_name' WHERE pro_id='$pro_id'";

$result = @mysqli_query($dbcon, $sqlquery);

if($result == TRUE){
    echo "แก้ไขข้อมูลเรียบร้อยแล้ว";
}
else{
    echo "เกิดข้อผิดพลาด"." ".mysqli_error($dbcon);
}

mysqli_close($dbcon);


?>