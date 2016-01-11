<?php
    require "connectdb.php";
    
    $pro_id = mysqli_real_escape_string($dbcon,@$_GET['pro_id']);
    
    $sqlquery = "DELETE FROM product WHERE pro_id='$pro_id'";
    
    $result = @mysqli_query($dbcon, $sqlquery);
    
    if($result == TRUE){
        header("Location: show_pro_data.php");
    }else{
        echo "เกิดข้อผิดพลาด"." ". mysqli_error($dbcon);
    }
    

?>