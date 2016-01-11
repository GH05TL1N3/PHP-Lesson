<?Php
include("../include/settings.php");
include("../include/connect.php");
$transaction_id = $_GET["transaction_id"]; 
$password = $_GET["password"]; 
$amount = $_GET["real_amount"]; 
$status = $_GET["status"]; 
$nowdatetime = date("Y-m-d H:i:s");
$file_log = "../logs/tmpay.log";
$msg_log = "[{$nowdatetime}] {$password} - {$amount} - {$status}\r\n";

// Add log
file_put_contents($file_log, $msg_log.file_get_contents($file_log));

if ($_SERVER["REMOTE_ADDR"] != "203.146.127.112") exit("302");
if ($status != 1) exit("ERROR|ANY_REASONS");

// Add Vip User to SQL
try{
	$stmt = $dbHandle->prepare("SELECT * FROM `truemoneylog` WHERE `password` = ?");
	$stmt->execute(array($password));
	$arr = $stmt->fetch();
}
catch(PDOException $e){
	exit($e);
}

$uid = $arr["uid"];
$id = $arr["id"];
if ($amount == 50.00) $day = 10;
if ($amount == 90.00) $day = 15;
if ($amount == 150.00) $day = 30;
if ($amount == 300.00) $day = 60;
if ($amount == 500.00) $day = 90;
if ($amount == 1000.00) $day = 180;

try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ?;");
	$stmt->execute(array($uid));
	$arr = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
	exit();
}

$now_expire = $arr["expire"];
if (strtotime(date("Y-m-d")) > strtotime($arr["expire"])) $expire = date("Y-m-d", strtotime("+{$day} day"));
else $expire = date("Y-m-d", strtotime("+{$day} day", strtotime($arr["expire"])));

// Update Data Truemoney Log and Vip User expire
try{
	$stmt = $dbHandle->prepare("UPDATE `truemoneylog` SET `datetime` = :nowdatetime WHERE `truemoneylog`.`id` = :id;");
	$stmt->bindParam(":nowdatetime", $nowdatetime);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$stmt = $dbHandle->prepare("UPDATE `vipuser` SET `expire` = :expire WHERE `vipuser`.`id` = :uid;");
	$stmt->bindParam(":expire", $expire);
	$stmt->bindParam(":uid", $uid);
	$stmt->execute();
}catch(PDOException $e){
	exit($e);
}

exit("SUCCEED|UID={$uid}");