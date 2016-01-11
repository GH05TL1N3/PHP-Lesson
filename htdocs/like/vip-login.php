<?Php
include("include/settings.php");
include("include/connect.php");
$email = $_POST["email"];
$pass = $_POST["pass"];
$memorize = $_POST["memorize"];
$md5_pass = md5($pass);

if (empty($email) or empty($pass)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) exit(json_encode(array("error" => true, "detail" => "รูปแบบอีเมล์ไม่ถูกต้อง")));
if (strlen($pass) < 8) exit(json_encode(array("error" => true, "detail" => "รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร")));

try{
	$stmt = $dbHandle->prepare("SELECT COUNT(`email`) AS `Count`, `id`  FROM `vipuser` WHERE `email` = ? and `pass` = ? LIMIT 1;");
	$stmt->execute(array($email, $md5_pass));
	$arr = $stmt->fetch();
}catch(PDOException $e){
	ob_start();
	var_dump($e);
	$a = ob_get_contents();
	ob_end_clean();
	exit(json_encode(array("error" => true, "detail" => $a)));
}

if ($arr["Count"] <= 0) exit(json_encode(array("error" => true, "detail" => "ชื่อผู้ใช้งาน หรือรหัสผ่านผิด")));


$uid = $arr["id"];
$time = ($memorize == true ? time() + (60 * 60 * 24 * 30 * 12 * 10) : 0);

setcookie("uid", $uid, $time);
setcookie("pass", $pass, $time);

exit(json_encode(array("error" => false)));