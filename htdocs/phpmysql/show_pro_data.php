<?php
    require "connectdb.php";
    $sqlquery = "SELECT * FROM product INNER JOIN producttype ON product.pt_id=producttype.pt_id ORDER BY product.pro_id";
    $result = mysqli_query($dbcon, $sqlquery);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แสดงข้อมูลสินค้า</title>
    </head>
    <body>
        <?php include "menu.php";?>
        <table border="1">
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>วันที่เพิ่มสินค้า</th>
                <th>หมวดสิ้นค้า</th>
                <th>แก้ไขสินค้า</th>
                <th>ลบสินค้า</th>
            </tr>
            <?php 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['pro_id'];?></td>
                <td><?php echo $row['pro_name'];?></td>
                <td><?php echo $row['pro_price'];?></td>
                <td><?php echo $row['pro_dateadd'];?></td>
                <td><?php echo $row['pt_name'];?></td>
                <td><a href="update_pro_frm.php?pro_id=<?php echo $row['pro_id'];?>">แก้ไข</a></td>
                <td><a href="del_pro_data.php?pro_id=<?php echo $row['pro_id'];?>">ลบ</a></td>
            </tr>
            <?php
                }
                @mysqli_free_result($result);
                mysqli_close($dbcon);
            ?>
        </table>
    
    </body>
</html>
