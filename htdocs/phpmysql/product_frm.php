<?php
require 'connectdb.php';
$sqlquery = "SELECT * FROM producttype";
$result = @mysqli_query($dbcon, $sqlquery);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>เพิ่มสินค้า</title>
        <style>
            label {
                display: block;
            }
        </style>
    </head>
    <body>
        <?php include "menu.php";?>
        <h2>เพิ่มสินค้า</h2>
        <form action="product_insert.php" method="POST" enctype="multipart/form-data" id="form1">
            <fieldset>
                <legend>เพิ่มสินค้า</legend>
                <label>ชื่อสินค้า</label><input type="text" name="pro_name" id="pro_name" size="40" required="">
                <label>ราคาสินค้า</label><input type="text" name="pro_price" id="pro_price" size="20" required="">
                <label>วันที่เพิ่มสินค้า</label><input type="date" name="pro_dateadd" id="pro_dateadd" required="">
            <label>สถานะสินค้า</label>
            <label>
                <input type="radio" name="pro_status" id="pro_status_0" value="0" checked="">ซื้อขายได้
            </label>
            <label>
                <input type="radio" name="pro_status" id="pro_status_1" value="1" >สินค้าหมด
            </label>
            <label>ประเภทสินค้า</label>
            <select name="pt_id" id="pt_id" required="">
                <option value="">-----เลือกประเภทสินค้า-----</option>
                <?php 
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <option value="<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                <?php
                }
                mysqli_free_result($result);
                mysqli_close($dbcon);
                ?>
            </select><br><br>
            <input type="submit" name="submit" id="submit" value="เพิ่มข้อมูล">
            </fieldset>
        </form>
    </body>
</html>









