<?Php
include("../include/settings.php");
include("../include/connect.php");
include("../function/chk-login.php");
$gid = $_POST["gid"];
$msg = $_POST["msg"];
if (empty($gid) or empty($msg)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));

// Test AccessToken
$urlaccesstoken = $_POST["urlaccesstoken"];
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
if (is_array($arr["error"])) exit(json_encode(array("error" => true, "detail" => "AccessToken ไม่ถูกต้อง, {$arr["error"]["message"]}")));

$exgid = explode(",", $gid);

foreach ($exgid as $gid){
	if ($gid != ""){
		// Test Groups
		$url = "https://graph.facebook.com/{$gid}?access_token={$accesstoken}";

		// cURL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$content = curl_exec($ch);
		curl_close($ch);

		$arr = json_decode($content, true);
		if (is_array($arr["error"])) exit(json_encode(array("error" => true, "detail" => "กลุ่ม  Groups ID: {$gid} ไม่สามารถโพสได้ กรุณาไม่เลือกโพสกลุ่มนี้")));
	}
}

try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr_user = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
}

$g_no = 0;

foreach ($exgid as $gid){
	if ($gid != ""){
		$url = "https://graph.facebook.com/{$gid}/feed?method=POST&message={$msg}&access_token={$accesstoken}";

		// cURL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$content = curl_exec($ch);
		curl_close($ch);
		$g_no++;
		if ((($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))) and ($g_no >= 10)) break 1;
	}
}
exit(json_encode(array("error" => false)));
