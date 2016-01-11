<?Php
include("../include/settings.php");
include("../include/connect.php");
//include("../function/function.php");
$email = $_POST["email"];
$tmpass = $_POST["TMPassword"];
$pass = $_POST["password"];

if (empty($email) or empty($tmpass)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ, ".file_get_contents("php://input"))));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) exit(json_encode(array("error" => true, "detail" => "รูปแบบอีเมล์ไม่ถูกต้อง")));

//$pass = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'),0,10);;
$expire = date("Y-m-d", strtotime(" -1 day"));
$md5_pass = md5($pass);
$datetime = "0000-00-00 00:00:00";
$resp_url = $set["tmpayrespurl"];
$merchant_id = $set["tmpaymerchantid"];

try{
	$stmt = $dbHandle->prepare("SELECT COUNT(`email`) AS `Count` FROM `vipuser` WHERE `email` = ?");
	$stmt->execute(array($email));
	$arr = $stmt->fetch();
	if ($arr["Count"] != 0) exit(json_encode(array("error" => true, "detail" => "มีการใช้เมล์นี้สมัครสมาชิกไปแล้ว")));
}catch(PDOException $e){
	exit(json_encode(array("error" => true, "detail" => $e)));
}

// Add Vip User to SQL
try{
	$stmt = $dbHandle->prepare("INSERT INTO `vipuser` (`id`, `email`, `pass`, `expire`) VALUES (NULL, :email, :pass, :expire);");
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":pass", $md5_pass);
	$stmt->bindParam(":expire", $expire);
	$stmt->execute();
	$uid = $dbHandle->lastInsertId();
}catch(PDOException $e){
	exit(json_encode(array("error" => true, "detail" => $e)));
}

// Send Pay to TMPay
$url = "https://www.tmpay.net/TPG/backend.php?merchant_id={$merchant_id}&password={$tmpass}&resp_url={$resp_url}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
if (!$content = curl_exec($ch)) exit(json_encode(array("error" => true, "detail" => curl_error($ch))));
curl_close($ch);
if(!preg_match('/SUCCEED/', $content)) exit(json_encode(array("error" => true, "detail" => "เกิดความผิดพลาดกับระบบ TMPay, {$content}")));

// Add Truemoney Log to SQL
try{
	$stmt = $dbHandle->prepare("INSERT INTO `truemoneylog` (`id`, `uid`, `password`, `datetime`) VALUES (NULL, :uid, :tmpass, :datetime);");
	$stmt->bindParam(":uid", $uid);
	$stmt->bindParam(":tmpass", $tmpass);
	$stmt->bindParam(":datetime", $datetime);
	$stmt->execute();
}catch(PDOException $e){
	exit(json_encode(array("error" => true, "detail" => $e)));
}

//if (to_mail($email, "ขอบคุณสำหรับการสมัครสมาชิก VIP", "<div><b>ข้อมูลที่ใช้เข้าสู่ระบบ</b></div><ul><li>E-mail: {$email}</li><li>Password: {$pass}</li></ul><div>คุณสามารถเข้าสู่ระบบได้แล้ว แต่ยอดวันคงเหลือของคุณอาจจะไม่แสดง เพราะต้องรอระบบทำการตรวจสอบบัตรทรูมมันนี่ไม่เกิน 20 นาที หลังจากการตรวจสอบผ่านแล้ว ระบบจะแจ้งไปทางอีเมล์ของคุณอีกครั้ง"))  exit(json_encode(array("error" => true, "detail" => "เกิดความผิดพลาดในการส่งเมล์แจ้งรหัสผ่านของคุณ")));

exit(json_encode(array("error" => false, "pass" => $pass)));