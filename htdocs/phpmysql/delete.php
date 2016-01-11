<?php

    require 'connectdb.php';
    
    $pro_id = 6;
    
    $sqlquery = "DELETE FROM product WHERE pro_id='$pro_id'";
    
    $result = mysqli_query($dbcon, $sqlquery);
            
    if($result == TRUE){
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
    else{
        echo "เกิดข้อผิดพลาด"." ". mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>