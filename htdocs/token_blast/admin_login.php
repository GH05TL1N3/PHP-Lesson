<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
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


  </style>
</head>
<body style="background-color:black">
    <br>
    <a href="index.php"><button type="button" class="btn btn-warning" >Back to Home</button></a>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
  
    <center>
        <form class="form-inline" role="form" action="admin_check.php" method="POST">
        <div class="form-group">
            <label for="username" style="font-size:20px"><button type="button" class="btn btn-success">Username</button></label> :
            <input type="text" class="form-control" id="username" name="username" size="20" placeholder="username"autofocus required><br>
            <label for="password" style="font-size:20px"><button type="button" class="btn btn-success">Password</button></label> :
            <input type="password" class="form-control" id="password" name="password" size="20" placeholder="password" required>
        </div><br><br> 
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form><br>
        
       
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
