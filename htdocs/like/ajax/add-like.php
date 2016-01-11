<?Php
include("../include/settings.php");
include("../include/connect.php");
include("../function/chk-login.php");
$fbid = $_POST["fbid"];
if (empty($fbid)) exit(json_encode(array("error" => true, "detail" => "ข้อมูลไม่ครบ")));

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

// Test Post
$url = "https://graph.facebook.com/{$fbid}?access_token={$accesstoken}";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content = curl_exec($ch);
curl_close($ch);

$arr = json_decode($content, true);
if (is_array($arr["error"])) exit(json_encode(array("error" => true, "detail" => "โพสนี้ ไม่สามารถเพิ่ม Like ได้, {$arr["error"]["message"]}")));

try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr_user = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
}

$stmt = $dbHandle->prepare("SELECT * FROM `accesstoken`");
$stmt->execute();

$like = 0;
while ($arr = $stmt->fetch()){
	/*$stmt = $dbHandle->prepare("INSERT INTO `like` (`id`, `fbid`, `accesstoken`) VALUES (NULL, :fbid, :accesstoken);");
	$stmt->bindParam(":fbid", $fbid);
	$stmt->bindParam(":accesstoken", $arr["accesstoken"]);
	$stmt->execute();*/
	$url = "https://graph.facebook.com/{$fbid}/likes?method=POST&access_token={$arr["accesstoken"]}";

	// cURL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$content = curl_exec($ch);
	curl_close($ch);
	
	if ($content == "true") $like++;
	if ((($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))) and ($like >= 40)) break 1;
	/*else{
		$stmt2 = $dbHandle->prepare("DELETE FROM `accesstoken` WHERE `accesstoken`.`id` = ?;");
		$stmt2->execute(array($arr["id"]));
	}*/
}
exit(json_encode(array("error" => false, "like" => $like)));
