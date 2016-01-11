<?Php
include("../include/settings.php");
include("../include/connect.php");
include("../function/chk-login.php");
$uid = $_COOKIE["uid"];
$newpass = $_POST["newpass"];
$md5_newpass = md5($newpass);

if ($login == false) exit(json_encode(array("error" => true, "detail" => "กรุณาเข้าสู่ระบบ")));
if (empty($newpass)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));

try{
	$stmt = $dbHandle->prepare("UPDATE `vipuser` SET `pass` = :newpass WHERE `vipuser`.`id` = :uid;");
	$stmt->bindParam(":newpass", $md5_newpass);
	$stmt->bindParam(":uid", $uid);
	$stmt->execute();
}catch(PDOException $e){
	ob_start();
	var_dump($e);
	$a = ob_get_contents();
	ob_end_clean();
	exit(json_encode(array("error" => true, "detail" => $a)));
}
exit(json_encode(array("error" => false, "pass" => $newpass)));