<?Php
include("../include/settings.php");
include("../include/connect.php");
$urlaccesstoken = $_POST["urlaccesstoken"];
$nowdatetime = date("Y-m-d H:i:s");
if (empty($urlaccesstoken)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));
$accesstoken = preg_replace("#(http|https)://(facebook.com|www.facebook.com)/connect//login_success.html\#access_token=(.*)&expires_in=0$#", "$3", $urlaccesstoken);
$url = "https://graph.facebook.com/me/posts?access_token={$accesstoken}";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content = curl_exec($ch);
curl_close($ch);

$arr = json_decode($content, true);
if (!is_array($arr["error"])){
	$stmt = $dbHandle->prepare("DELETE FROM `accesstoken` WHERE `accesstoken`.`fbuid` = ?;");
	$stmt->execute(array($arr["data"][0]["from"]["id"]));
	$stmt = $dbHandle->prepare("INSERT INTO `accesstoken` (`id`, `accesstoken`, `fbuid`, `datetime`) VALUES (NULL, :accesstoken, :fbuid, :datetime);");
	$stmt->bindParam(":accesstoken", $accesstoken);
	$stmt->bindParam(":fbuid", $arr["data"][0]["from"]["id"]);
	$stmt->bindParam(":datetime", $nowdatetime);
	$stmt->execute();
	exit(json_encode(array("error" => false)));
}else exit(json_encode(array("error" => true, "detail" => $arr["error"]["message"])));