<html>
<head>
<title>WELCOME</title>
</head>
<body>

<?php
if( $_GET["fname"] || $_GET["lname"] ){
	echo "<h1>"."Welcome ".htmlspecialchars($_GET['fname'])." ".htmlspecialchars($_GET['lname'])."</h1>";
		exit();	
		
	}

?>
<body>

</html>