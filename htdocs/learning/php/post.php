<html>
<head>
<title>WELCOME</title>
</head>
<body>

<?php
if( $_POST["fname"] || $_POST["lname"] ){
	echo "<h1>"."Welcome ".htmlspecialchars($_POST['fname'])." ".htmlspecialchars($_POST['lname'])."</h1>";
		exit();	
		
	}

?>
<body>

</html>