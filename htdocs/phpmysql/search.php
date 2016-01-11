<?php
    require 'connectdb.php';
    
    
    if(isset($_POST['submit'])){
        if(empty($_POST['search'])){
            echo "<b style=\"color:red\">กรุณากรอกข้อมูลการค้นหา</b><br>";
        }
    }
  
    
    $searchkey = mysqli_real_escape_string($dbcon,@$_POST['search']);
    $prokey = "%".$searchkey."%";
    $sqlquery = "SELECT * FROM product WHERE pro_name LIKE '$prokey'";
    $result = @mysqli_query($dbcon, $sqlquery);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ค้นหาสินค้า</title>
        <style>
            label {
                display: block;
            }
            
        </style>
    </head>
    <body>
        <?php include "menu.php";?>
        <form action="search.php" method="POST">
            <label>
                ค้นหาข้อมูล : <input type="text" name="search" id="search" size="20">
                <input type="submit" name="submit" value="OK">
            </label><br>
            
        </form>
        
        <table border="1">
            
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>วันที่เพิ่มสินค้า</th>
                
                
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['pro_id']; ?></td>
                <td><?php echo $row['pro_name']; ?></td>
                <td><?php echo $row['pro_price']; ?></td>
                <td><?php echo $row['pro_dateadd']; ?></td>
            </tr>
            <?php
            }
            mysqli_free_result($result);
            mysqli_close($dbcon);
            ?>
            
        </table>
       
    </body>
</html>


