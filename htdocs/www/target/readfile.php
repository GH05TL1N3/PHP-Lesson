<?php
$file = "openw.txt";
$fileopen = fopen($file, "r");
$content = fread($fileopen, 100000);

    echo $content;



fclose($fileopen);
?>