<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload Files</title>
</head>

<?php echo "สวัสดี PHP";
echo '<center><br><b style="color:red;text-align:center"> Like A Lot</b></center>';

echo "ขณะนี้เวลา";
echo date("H:i:s")."<br>";
echo "วันที่";
echo date("j F Y");
$var_int = 100;
$var_str = "ANuwaT";
$var_dbu = 3.14;
echo "<br>";

echo gettype($var_int)."<br>";
echo gettype($var_str)."<br>";
echo gettype($var_dbu)."<br>";

$number = "500";
echo gettype($number)."<br>";
settype($number, "integer");
echo gettype($number)."<br>";

$speed = 384;

echo "ความเร็วอินเตอร์เน็ตในตอนนี้ {$speed} kb/s."."<br>";
echo "ความเร็วอินเตอร์เน็ตในตอนนี้ $speed kb/s."."<br>";
echo "ความเร็วอินเตอร์เน็ตในตอนนี้ \$speed kb/s."."<br>";

echo '<a href="www.facebook.com" target="_blank">คลิกที่นี้เพื่อไปยัง facebook</a>'."<br>";
echo "Hello 'Anuwat'"."<br>";
//constant

define("HELLO", "สวัสดี");
define("VAT", 7);
echo "<br>";
echo HELLO;
echo "<br>";
echo VAT;

echo "<br>";

$numberr = 7 . 5;
echo "ตัวแปร \$numberr จะมีค่าเท่ากับ $numberr ซึ่งเป็นชนิดข้อมูล " . gettype($numberr) . "<br>";

$k = 50; $l = 20;
echo "$k + $l จะมีค่าเท่ากับ " . ($k + $l). "<br>";
echo "$k - $l จะมีค่าเท่ากับ " . ($k - $l). "<br>";
echo "$k * $l จะมีค่าเท่ากับ " . ($k * $l). "<br>";
echo "$k / $l จะมีค่าเท่ากับ " . ($k / $l). "<br>";
echo "$k % $l จะมีค่าเท่ากับ " . ($k % $l). "<br>";

$name = "อนุวัฒน์";
$lastname = "คงช่วย";

echo $name . " " . $lastname . "<br>";

//

$dd = 50;
$ff = 50.0;

if( $dd === $ff ){
	echo "ตัวแปร \$dd และ \$ff เป็นข้อมูลชนิดเดียวกัน"."<br>";
}
else{
	echo "ตัวแปร \$dd และ \$ff ไม่เป็นเป็นข้อมูลชนิดเดียวกัน"."<br>";
	}
	
while($dd < 101){
	echo $dd++ . " ";
	
	}
echo "<br>";
$username = "Admin";
if($username == "Admin"){
	echo "ยินดีต้อนรับ Admin :"."<br>";
	}
else{
	echo "ยินดีต้อนรับ คุณ $username"."<br>";
	}
	
	
	
//nested if

$yy = 500;
$pp = 200;

if($yy < $pp){
	echo "\$yy < \$pp"."<br>";
}
else{
		if($yy > $pp){
			echo "\$yy > \$pp"."<br>";
			}
		else{
			"\$yy == \$pp again"."<br>";
			}
	}
	
$grade = 80;

if($grade >= 80){
	echo "A"."<br>";
	}
elseif($grade >= 70){
	echo "B"."<br>";
	}
elseif($grade >= 60){
	echo "C"."<br>";
	}
elseif($grade >= 50){
	echo "D"."<br>";
	}
else{
	echo "F"."<br>";
	}
	
	
	
	
//switch

$ii = 3;
switch($ii){
	case 0 : echo "\$ii = 0"."<br>";
	break;
	case 1 : echo "\$ii = 1"."<br>";
	break;
	case 2 : echo "\$ii = 2"."<br>";
	break;
	default : echo "no value for \$ii "."<br>"."<br>"."<br>";
}

//condition oparetor


$user_login = FALSE;

$user = "Admin";

$msg = $user_login ? "Welcom $user to Management system" : "You are not loggin.";

echo $msg."<br>";


// loop
//while

$start = 1;
$end = 31;

echo 'Date : <select name="day_of_month">'."<br>";

$i = $start;
while($i <= 31){
	echo "<option>$i</option>";
	$i++;
	}
echo '</select>';	

//do..while

$kk = 2;

do {
	$power = $kk * $kk ;
	echo "$kk  ยกกำลัง 2 จะเท่ากับ $power"."<br>";
	$kk += 2; 
	}
while($kk <= 100);

//loop..for

echo "โปรแกรมจะนับ 1 - 100"."<br>";
echo "เริ่ม"."<br>";

for($numn = 1; $numn <= 100; $numn++){
	echo "$numn"."<br>";
	if($numn == 50){
		echo "ถึง 50 แล้ว"."<br>";
		break;
		}
		
	if($numn == 70){
		echo "ถึง 70 แล้ว"."<br>";
		}
	}
	
echo "ครบ 100 แล้ว"."<br>"."<br>";


$found = FALSE;

for($o = 1; $o <= 50; $o++){
	if($o * 2 == 16 ){
		$found = TRUE;
		break;
		}
	}
if($found){
echo "เลข 1 - 50 ที่คูณ 2 เท่ากับ 16 คือ $o"."<br>";
}
else{
	echo "ไม่มีเลขที่คุณกันได้ 16 "."<br>";
	}
	
	
	
	
	
$plx = 0;
while(++$plx){
	echo "$plx"."<br>";
	switch($plx){
		case 10 : echo "ถึง 10 แล้ว"."<br>";
		break 1;
		case 50 : echo "ถึง 50 แล้ว"."<br>";
		break ;
		case 100 : echo "ถึง 100 แล้ว"."<br>";
		break ;
		case 150 : echo "ถึง 150 แล้ว"."<br>";
		break ;
		case 200 : echo "ถึง 200 แล้ว"."<br>";
		break ;
		case 300 : echo "ถึง 300 แล้ว"."<br>";
		break ;
		case 500 : echo "ถึง 500 แล้ว"."<br>";
		break ;
		case 800 : echo "ถึง 800 แล้ว"."<br>";
		break ;
		case 1000 : echo "ถึง 1000 แล้ว"."<br>";
		break 2;
		default : break;
		}
	}
	$s = -5; $e = 5;
	
	for($i = $s; $i <= $e; $i++){
		if($i == 0){
			$sum = $i + 0;
			continue;
			}
			$sum = $i + 2;
			
		echo "$i + 2 = $sum"."<br>";
		}
	
	
$token = "abcdefghijklmnopqrstuvwxyz";

$cut_token = substr($token, 23, 3);

echo $cut_token;
	
?>

<body>
</body>
</html>



















