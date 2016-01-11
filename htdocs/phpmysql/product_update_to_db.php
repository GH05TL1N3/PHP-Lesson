<?php
    require "connectdb.php";
    
    $pro_id = mysqli_real_escape_string($dbcon,@$_POST['pro_id']);
    $pro_name = mysqli_real_escape_string($dbcon,@$_POST['pro_name']);
    $pro_price = mysqli_real_escape_string($dbcon,@$_POST['pro_price']);
    $pro_dateadd = mysqli_real_escape_string($dbcon,@$_POST['pro_dateadd']);
    $pro_status = mysqli_real_escape_string($dbcon,@$_POST['pro_status']);
    $pt_id = mysqli_real_escape_string($dbcon,@$_POST['pt_id']);

if(empty($pro_id || $pro_name || $pro_price || $pro_dateadd || $pro_status || $pt_id)){
    header("Location: update_pro_frm.php");
}else{
    $sqlquery = "UPDATE product SET pro_name='$pro_name', pro_price='$pro_price', pro_dateadd='$pro_dateadd', pro_status='$pro_status', pt_id='$pt_id' WHERE pro_id='$pro_id'";
    
    $result = @mysqli_query($dbcon, $sqlquery);
    if($result == TRUE){
        echo "แก้ไขข้อมูลเรียบร้อยแล้ว <br><br>";
        echo "<a href=\"show_pro_data.php\">คลิกเพื่อไปยังหน้าแสดงรายการสินค้า</a>";
    }else{
        echo "เกิดข้อผิดพลาด"." ".  mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
}

?>