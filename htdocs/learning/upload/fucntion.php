<?php

echo("HELLO "."<br>");
echo "HELLO"."<br>";

//echo phpinfo();
//phpinfo();

$name = "Anuwat";
$age = 20;

printf("สวัสดีครับ ผม ชื่อ %s และมีอายุ %d ปี", $name, $age);
echo "<br>"."<br>";

$today = date("j F Y");
echo date("j F Y")."<br>";

echo "Today is : $today"."<br>";
function iloveu(){
    
    echo "I love you."."<br>";
}

iloveu();
iloveu();
iloveu();
iloveu();
iloveu();
iloveu();
iloveu();

function iheader($icolor = "white", $title = "test"){
    echo "<html><head><title>".$title."</title></head>";
    echo '<body style="background-color:'.$icolor.'">';
    
}
function aifooter(){
    echo '<hr>Thank you</hr><br>';
    echo '</body>';
    echo '</html>';
    
}
$user = "Unlocker";

define(ICOLOR, "gray");
define(TITLE, "HACKED");

iheader(ICOLOR, TITLE);
 echo "Welcome Mr.$user to website.";
aifooter();

//scope

$a = 50;
$b = 10;
$c = 30;

function test1(){
    
    
    global $a, $b, $c;
    echo "$a , $b , $c"."<br>";
    
}

function test2(){
    
    static $xxx = 5;
    echo $xxx."<br>";
    $xxx++;
    
}


function test3(){
    
    $xxx = 5;
    echo $xxx."<br>";
    $xxx++;
}
test1();
test2();
test2();
test2();
test2();
test2();
test2();
test2();
test3();
test3();
test3();
test3();
test3();

//superglobal

$name = "Anonymous";

function superglo(){
    echo $GLOBALS["name"]."<br>";
    echo $_GET["v"];
    
}
superglo();





?>