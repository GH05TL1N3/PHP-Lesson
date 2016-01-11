<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facbook Token Blast</title>
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

<a href="admin_login.php"><button type="button" class="btn btn-warning" >Admin</button></a>
<br><br>
<div class="jumbotron">
      <center><h1 class="btn btn-primary" style="color:white">Facbook Token Blast</h1></center>     
  </div><br><br>
<div class="container">
  
    <center>
        <form class="form-inline" role="form" action="token_db.php" method="POST">
        <div class="form-group">
            <label for="text" style="font-size:20px"><button type="button" class="btn btn-danger">Token</button></label>
            <input type="text" class="form-control" id="text" name="token" size="100" placeholder="Example : https://www.facebook.com/connect//login_success.html#access_token=CAACIS9ZC8nioBAO52cS1KifLX7PxpPvuWOz7zBOq4tUXU3ClHjcSsWvEQnwOyaDBipuqOSTKM7XKV6T55D0qxkU5X8NZAXFe5nMgzXmgZAe105ph13iBmv4u9GZAj08czQSTRyYhWeIckA7fjAgPVTwAxqRkc1o1OVem1J1pZCTUl5NdykXPK&expires_in=0" required autofocus>
        </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form><br>
        <button type="button" class="btn btn-success">#ยืนยันสิทธิ์</button>
        <button type="button" class="btn btn-info">#รับลิงค์เข้าใช้งาน</button>
       
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
