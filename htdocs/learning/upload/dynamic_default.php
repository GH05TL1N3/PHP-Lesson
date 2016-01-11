<?php
if(isset($_POST["telenum"]) && $_POST["telenum"] != NULL){
    $defvalue = $_POST["telenum"];
    settype($defvalue, "integer");
    
}
else{
    $defvalue = 1;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            Enter your Telephone number : <input type="text" name="telenum" value="<?php echo $defvalue; ?>">
            <input type="submit" value="OK">
        </form>
    </body>
</html>
