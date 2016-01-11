<?php
    require "connectdb.php";
    $pro_id = mysqli_real_escape_string($dbcon,@$_GET['pro_id']);
    if(empty($pro_id)){
        header("Location: show_pro_data.php");
    }else{
    $update_query = "SELECT * FROM product WHERE pro_id='$pro_id'";
    $update_result = mysqli_query($dbcon, $update_query);
    $update_row = mysqli_fetch_array($update_result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แก้ไขสินค้า</title>
        <style>
            label {
                display: block;
            }
        </style>
    </head>
    <body>
        <?php include "menu.php";?>
        <h2>แก้ไขสินค้า</h2>
        <form action="product_update_to_db.php" method="POST" enctype="multipart/form-data" id="form1">
            <fieldset>
                <legend>แก้ไขสินค้า</legend>
                <label>ชื่อสินค้า</label><input type="text" name="pro_name" id="pro_name" size="40" required="" value="<?php echo $update_row['pro_name'];?>">
                <label>ราคาสินค้า</label><input type="text" name="pro_price" id="pro_price" size="20" required="" value="<?php echo $update_row['pro_price'];?>">
                <label>วันที่เพิ่มสินค้า</label><input type="date" name="pro_dateadd" id="pro_dateadd" required="" value="<?php echo $update_row['pro_dateadd'];?>">
            <label>สถานะสินค้า</label>
            <label>
                <input type="radio" name="pro_status" id="pro_status_0" value="0" <?php if($update_row['pro_status'] == '0'){echo "checked";};?>>ซื้อขายได้
            </label>
            <label>
                <input type="radio" name="pro_status" id="pro_status_1" value="1" <?php if($update_row['pro_status'] == '1'){echo "checked";};?>>สินค้าหมด
            </label>
            <label>ประเภทสินค้า</label>
            <select name="pt_id" id="pt_id" required="">
                <?php
                        $sqlquery = "SELECT * FROM producttype";
                        $result = mysqli_query($dbcon, $sqlquery);
                ?>
                <?php 
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                    if($row['0'] == $update_row['pt_id']){
                ?>
                <option value="<?php echo $row['0'];?>" selected><?php echo $row['1'];?></option>
                <?php
                    }
                    else{
                ?>
                
                <option value="<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                <?php
                }
                }
    }
                mysqli_free_result($result);
                mysqli_close($dbcon);
                ?>
            </select><br><br>
            <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $update_row['pro_id'];?>">
            <input type="submit" name="submit" id="submit" value="แก้ไขข้อมูล">
            </fieldset>
        </form>
    </body>
</html>
