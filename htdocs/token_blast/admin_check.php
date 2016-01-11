<?php
require 'connect_db.php';
if(isset($_POST['username']) || isset($_POST['password'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
        echo "<body style=\"background-color:black\">";
        echo "<center>";
        echo "<div class=\"jumbotron\" style=\"background-color:black\">";
        echo "<a href=\"index.php\">";
        echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR NULL DATA #GO TO LOGIN</h1>";
        echo "</a>";
        echo "</div>";
        echo "</center>";
        echo "</body>";
        echo "</html>";
    }else{

            $username = mysqli_real_escape_string($connect_db,@$_POST['username']);
            $password = mysqli_real_escape_string($connect_db,@$_POST['password']);

            $sqlquery = "SELECT * FROM admin WHERE username=? AND password=?";

            $stmt = mysqli_prepare($connect_db, $sqlquery);
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_execute($stmt);

            $result_user = mysqli_stmt_get_result($stmt);

                if($result_user->num_rows == 1){
                    session_start();
                    $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
                    $_SESSION['username'] = $row_user['username'];
                    header("Location: admin_panel.php");
    
                }else{
                    echo "<!DOCTYPE html>";
                    echo "<html>";
                    echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
                    echo "<body style=\"background-color:black\">";
                    echo "<center>";
                    echo "<div class=\"jumbotron\" style=\"background-color:black\">";
                    echo "<a href=\"admin_login.php\">";
                    echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR #INCORRECT USER</h1>";
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
                    echo "<a href=\"admin_login.php\">";
                    echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#FUCK #GO TO LOGIN NOW</h1>";
                    echo "</a>";
                    echo "</div>";
                    echo "</center>";
                    echo "</body>";
                    echo "</html>";
    
}




?>