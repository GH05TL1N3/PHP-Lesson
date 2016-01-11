<?Php
include("../include/settings.php");
$error = "";
if (isset($_GET["login"])){
	$user = $_POST["username"];
	$pass = $_POST["password"];
	if (($config["admin"]["user"] == $user) and ($config["admin"]["pass"] == $pass)){
		session_start("Admin");
		$_SESSION["user"] = $usre;
		$_SESSION["pass"] = $pass;
		exit("<script>window.location = \"index.php\";</script>");
	}else $error = "Username หรือ Password ไม่ถูกต้อง";
}
if (isset($_GET["logout"])){
	unset($_SESSION["user"]);
	unset($_SESSION["pass"]);
	exit("<script>window.location = \"login.php\";</script>");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Admin</title>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/redmond/jquery-ui-1.10.3.custom.css">
<style>
body{
	text-align:center;
	margin:3px;
}
.box{
	display:inline-block;
	border:#B5EDFF 1px solid;
	background:#ECFAFF;
	padding:16px;
	padding-bottom:0px;
	margin-top:20px;
}
form > div > label{
	width:70px;
}
</style>
<script>
$(document).ready(function(e) {
	$("button").button().css({ "font-size": "12px" });
});
</script>
</head>

<body>
<div class="box">
  <h2>Admin Login</h2>
  <?Php echo ($error != "" ? "<p>{$error}</p>" : ""); ?>
  <form action="?login" method="post">
    <div>
      <label for="username">Username</label>
      <input name="username" type="text" id="username" size="40" required>
    </div>
    <div>
      <label for="password">Password</label>
      <input name="password" type="password" id="password" size="40" required>
    </div>
    <div style="text-align:right">
      <button type="submit">Login</button>
    </div>
  </form>
</div>
</body>
</html>