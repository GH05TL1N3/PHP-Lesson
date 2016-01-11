<?php
$file = "openw.txt";
$fileopen = fopen($file, "w");
for($i=1;$i<=100;$i++){
    $writenn = fwrite($fileopen, $i."\r\n");
    }
echo "OK";
fclose($fileopen);


?>