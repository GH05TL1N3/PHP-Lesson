<?Php
include("../include/settings.php");
include("../include/connect.php");
//include("../function/function.php");
$uid = $_COOKIE["uid"];
$tmpass = $_POST["TMPassword"];

$datetime = "0000-00-00 00:00:00";
$resp_url = $set["tmpayrespurl"];
$merchant_id = $set["tmpaymerchantid"];

if (empty($tmpass)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));

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

exit(json_encode(array("error" => false)));