<?php
require 'connectdb.php';

$pro_name = mysqli_real_escape_string($dbcon,@$_POST['pro_name']);
$pro_price = mysqli_real_escape_string($dbcon,@$_POST['pro_price']);
$pro_dateadd = mysqli_real_escape_string($dbcon,@$_POST['pro_dateadd']);
$pro_status = mysqli_real_escape_string($dbcon,@$_POST['pro_status']);
$pt_id = mysqli_real_escape_string($dbcon,@$_POST['pt_id']);
if($pro_name == NULL || $pro_price == NULL || $pro_dateadd == NULL || $pro_status == NULL || $pt_id == NULL){
    echo "คุณยังไม่ได้กรอกข้อมูล <br><br>";
    echo "<a href=\"product_frm.php\">คลิกที่นี่เพื่อไปยังหน้ากรอกข้อมูล</a>";
    exit();
    
}
else{
$sqlquery = "INSERT INTO product (pro_name, pro_price, pro_dateadd, pro_status, pt_id)";
$sqlquery .= "VALUES ('$pro_name', '$pro_price', '$pro_dateadd', '$pro_status', '$pt_id')";

$result = @mysqli_query($dbcon, $sqlquery);

if($result == TRUE){
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว <br><br>";
    echo "<a href=\"show_pro_data.php\">แสดงรายการสินค้า</a>";
    
}
else{
    echo "ไม่สามารถเพิ่มข้อมูลได้"." ".  mysqli_error($dbcon);
    
}
mysqli_close($dbcon);
}



?>

