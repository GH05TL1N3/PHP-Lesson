<?php
if(isset($_POST["name"]) && $_POST["name"] != NULL){
    echo "Welcom "."<b>".htmlspecialchars($_POST["name"])."</b>"." to admin panal";
    }
else{
?>

   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        Enter your name : <input type="text" name="name"><br>
        <input type="submit" value="OK">
   </form>
 <?php
}
?>
    



