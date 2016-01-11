<!DOCTYPE html>

<html>
<head>
<title>PHP I/O [read]</title>
</head>
<body>
<?php 
$target_file = "lz.txt";
$filename = fopen($target_file, "r");

if($filename == FALSE){
echo "Can't open file..";
	exit();
	}
	
$filesize = filesize($target_file);
$filecontent = fread($filename, $filesize);
fclose($filename);

echo "Content in file : <br>".$filecontent."<br>";
echo "Files size is ".$filesize." bytes."




?>
</body>
</html>