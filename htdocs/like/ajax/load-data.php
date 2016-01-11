<?Php
$urlaccesstoken = $_POST["urlaccesstoken"];
$data = $_POST["data"];
if (empty($urlaccesstoken) or empty($data)) exit("ข้อมูลไม่ครบ");
$accesstoken = preg_replace("#(http|https)://(facebook.com|www.facebook.com)/connect//login_success.html\#access_token=(.*)&expires_in=0$#", "$3", $urlaccesstoken);
$url = "https://graph.facebook.com/me/{$data}?limit=30&access_token={$accesstoken}";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content = curl_exec($ch);
curl_close($ch);

$arr = json_decode($content, true);
for ($i=0;$i<=(count($arr["data"])-1);$i++){
	if (!empty($arr["data"][$i]["picture"])) $fbid = $arr["data"][$i]["object_id"];
	else{
		$ar = explode("_", $arr["data"][$i]["id"]);
		$fbid = $ar[1];
	}
	if (($data == "accounts") or (($data == "posts") and !empty($fbid))){
?>
      <div class="box-post" data-fbid="<?Php echo ($data == "posts" ? $fbid : ($data == "accounts" ? $arr["data"][$i]["id"] : "")); ?>">
        <div class="top">
          <div class="pic">
            <img src="https://graph.facebook.com/<?Php echo ($data == "posts" ? $arr["data"][$i]["from"]["id"] : ($data == "accounts" ? $arr["data"][$i]["id"] : "")); ?>/picture?type=square" />
          </div>
          <div class="msg">
            <h5><?Php echo ($data == "posts" ? $arr["data"][$i]["from"]["name"] : ($data == "accounts" ? $arr["data"][$i]["name"] : "")); ?></h5>
            <div><?Php echo ($data == "posts" ? $arr["data"][$i]["created_time"] : ($data == "accounts" ? "" : "")); ?></div>
          </div>
        </div>
<?Php
		if ($data == "posts"){
			if (!empty($arr["data"][$i]["picture"])){
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
	
				$ar = json_decode($content, true);
			}
?>
        <div class="msg"><?Php echo nl2br($arr["data"][$i]["message"]); ?></div>
		<div><img src="<?Php echo $ar["images"][0]["source"]; ?>" /></div>
<?Php } ?>
      </div>
<?Php
	}
}