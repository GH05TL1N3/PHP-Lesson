<?Php
include("../include/settings.php");
include("../include/connect.php");
include("../function/chk-login.php");

$urlaccesstoken = $_POST["urlaccesstoken"];
$postid = $_POST["postid"];
$after = $_POST["after"];
if (empty($urlaccesstoken) or empty($postid)) exit("ข้อมูลไม่ครบ");
$accesstoken = preg_replace("#(http|https)://(facebook.com|www.facebook.com)/connect//login_success.html\#access_token=(.*)&expires_in=0$#", "$3", $urlaccesstoken);

try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr_user = $stmt->fetch();
}catch(PDOException $e){
	ob_start();
	var_dump($e);
	$a = ob_get_contents();
	ob_end_clean();
	exit(json_encode(array("error" => true, "detail" => $a)));
}

if (($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))) $limit = 50;
else $limit = 1000;

$url = "https://graph.facebook.com/{$postid}/likes?limit={$limit}&after={$after}&access_token={$accesstoken}";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content = curl_exec($ch);
curl_close($ch);

exit($content);