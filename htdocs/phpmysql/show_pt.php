<?php
require 'connectdb.php';

$sqlquery = "SELECT * FROM producttype";

$result = @mysqli_query($dbcon, $sqlquery);

if($result == TRUE){
    //echo "<table border=\"1\">";    
   
    //echo "<th>รหัสหมวดสินค้า</th><th>ชื่อประเภทสิ้นค้าสินค้า</th>";
    //while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
   // echo "<tr>";
   // echo "<td>".$row['pt_id']."</td><td>".$row['pt_name']."</td>";
   // echo "</tr>";
   // }
   // echo "</table>"; 






while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       echo "รหัสหมวดสินค้า ".$row['pt_id']."<br>";
        echo "ชื่อประเภทสิ้นค้าสินค้า ".$row['pt_name']."<br>";
        echo "<hr>";
        
    }
mysqli_free_result($result);
}

else{
    
    echo "ไม่สามารถแสดงข้อมูลได้"." ".  mysqli_error($dbcon);
}

mysqli_close($dbcon);
?>