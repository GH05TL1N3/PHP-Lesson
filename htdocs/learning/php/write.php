<!DOCTYPE html>

<html>
<head>
<title>PHP I/O [write]</title>
</head>
<body>
<?php 
$target_file = "wrt.txt";
$openfile = fopen($target_file, "w");
if($openfile == FALSE){
	echo "Can't open file.";
	exit();
	}
$checkwrt = fwrite($openfile, "Hacked by Loozlz.");
if($checkwrt == TRUE){
	echo "Write complete.";
	fclose($openfile);
	}
else{
	echo "Can't write.";
	}

?>
</body>
</html>