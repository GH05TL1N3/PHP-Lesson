<?php
    session_start();
    if(@$_SESSION['username'] == NULL){
        echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
            echo "<body style=\"background-color:black\">";
            echo "<center>";
            echo "<div class=\"jumbotron\" style=\"background-color:black\">";
            echo "<a href=\"admin_login.php\">";
            echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR #GO TO LOGIN NOW</h1>";
            echo "</a>";
            echo "</div>";
            echo "</center>";
            echo "</body>";
            echo "</html>";
    }else{
    
?>
<?php
require "connect_db.php";
$sqlquery = "SELECT * FROM victim_token";
$result = mysqli_query($connect_db, $sqlquery);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
    #footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    padding:5px; }
    
    th {
        color: white;
    }


  </style>
    </head>
    <body style="background-color: black">
        <br>
        <?php
            echo "<button type=\"button\" class=\"btn btn-success\">";
            echo "Wecome ".$_SESSION['username'];
            echo "</button>";
        ?>
       
        <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
<div class="container">
  
    <center>
        <table class="table">
          <caption style="font-size:20px;text-align:center"><button type="button" class="btn btn-primary">Token List</button></caption><br>
   <thead>
      <tr>
         <th>Token_id</th>
         <th>Token_value</th>
         <th>Token_date</th>
      </tr>
   </thead>
   <tbody>
       <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
        
       ?>
      <tr class="success">
          <td><?php echo $row['token_id']; ?></td>
          <td><?php echo $row['token_value']; ?></td>
          <td><?php echo $row['token_date']; ?></td>
         
         
      </tr>
      <?php
        }
        mysqli_free_result($result);
        mysqli_close($connect_db);
      ?>
      
   </tbody>
</table>
        
       
    </center>
</div>

    <footer id="footer">
        <br><br><br><br><br><br><br><br><br>
        <p class="text-primary">Copyright © Unl0ck3r</p>
        <?php
        echo date("j F Y",time());
        ?>
    </footer>

    </body>
</html>
<?php
    }
?>