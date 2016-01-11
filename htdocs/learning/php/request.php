<html>
<head>
<title>WELCOME</title>
</head>
<body>

<?php
if( $_REQUEST["fname"] || $_REQUEST["lname"] ){
	echo "<h1>"."Welcome ".htmlspecialchars($_REQUEST['fname'])." ".htmlspecialchars($_REQUEST['lname'])."</h1>";
		exit();	
		
	}

?>
<body>

</html>