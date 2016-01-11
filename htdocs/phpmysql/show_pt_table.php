<?php
require 'connectdb.php';
$sqlquery = "SELECT * FROM producttype";
$result = @mysqli_query($dbcon, $sqlquery);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แสดงข้อมูลประเภทสินค้า</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>รหัสประเภทสินค้า</th><th>ชื่อประเภทสินค้า</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['pt_id'];?></td><td><?php echo $row['pt_name'];?></td>
            </tr>
            <?php
            }
            mysqli_free_result($result);
            mysqli_close($dbcon);
            ?>
        </table>
        
    </body>
</html>
