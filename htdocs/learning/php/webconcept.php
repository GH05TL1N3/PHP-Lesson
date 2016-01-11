<html>
<head>
<title>WEB Concept</title>
</head>
<body>


<?php
	 if(!empty($_POST["name"]) || !empty($_POST["age"])){
		 
		 echo "Welcom ".$_POST["name"]."<br>";
		 echo "And your old is ".$_POST["age"]."<br>";
		 exit();
		 }


?>





<form action="<?php $_PHP_SELF ?>" method="POST">

Name : <input type="text" name="name" placeholder="Name"><br><br>
Age  : <input type="text" name="age" placeholder="Age"><br>

<input type="submit" value="OK">


</form>

<body>

</html>