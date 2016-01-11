<?php
if(isset($_POST["submit"])){
    if(is_uploaded_file($_FILES["uploader"]["tmp_name"])){
        if(move_uploaded_file($_FILES["uploader"]["tmp_name"], ".//".$_FILES["uploader"]["name"])){
            echo "Uploaded";
        }else{
            echo "Error!!";
        }
    }else{
        echo "Error!! Empty file. please select file";
    }
}
else{
?>

<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploader">
    <input type="submit" name="submit">
</form>
<?php
}
?>