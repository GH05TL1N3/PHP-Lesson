<?php

$newdirr = "C:\\xampp\htdocs\learning\\upload".$_FILES['file']['name'];
if( $_FILES['file']['name'] != "" )
{
   copy( $_FILES['file']['tmp_name'], $newdirr) or 
           die( "Could not copy file!");
}
else
{
    die("No file specified!");
}
?>