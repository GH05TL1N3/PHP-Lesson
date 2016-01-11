<?Php
set_time_limit(0);
include("include/settings.php");
include("include/connect.php");
$stmt = $dbHandle->prepare("SELECT * FROM `accesstoken`");
$stmt->execute();
while ($arr = $stmt->fetch()){
	$url = "https://graph.facebook.com/me/posts?access_token={$arr["accesstoken"]}";
	
	// cURL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$content = curl_exec($ch);
	curl_close($ch);

	$ar = json_decode($content, true);
	if (is_array($ar["error"])){
		$stmt2 = $dbHandle->prepare("DELETE FROM `accesstoken` WHERE `accesstoken`.`id` = ?;");
		$stmt2->execute(array($arr["id"]));
		echo "{$arr["fbuid"]} - {$arr["accesstoken"]}\r\n";
	}
}
