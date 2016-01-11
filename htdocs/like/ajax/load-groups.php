<?Php
$urlaccesstoken = $_POST["urlaccesstoken"];
$data = "groups";
if (empty($urlaccesstoken) or empty($data)) exit("ข้อมูลไม่ครบ");
$accesstoken = preg_replace("#(http|https)://(facebook.com|www.facebook.com)/connect//login_success.html\#access_token=(.*)&expires_in=0$#", "$3", $urlaccesstoken);
$url = "https://graph.facebook.com/me/{$data}?limit=1000&access_token={$accesstoken}";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content = curl_exec($ch);
curl_close($ch);

$arr = json_decode($content, true);
?>
          <table class="table table-striped" style="max-width:620px; margin:auto;">
            <thead>
              <tr>
                <th><input id="check-all" type="checkbox"></th>
				<th>Groups ID</th>
                <th>ชื่อกลุ่ม</th>
              </tr>
            </thead>
            <tbody>
<?Php for ($i=0;$i<=(count($arr["data"])-1);$i++){ ?>
              <tr>
                <td><input class="check-id" type="checkbox" data-gid="<?Php echo $arr["data"][$i]["id"]; ?>"></td>
				<td><?Php echo $arr["data"][$i]["id"]; ?></td>
                <td><a href="http://www.facebook.com/<?Php echo $arr["data"][$i]["id"]; ?>" target="_blank"><?Php echo $arr["data"][$i]["name"]; ?></td></td>
              </tr>
<?Php } ?>
            </tbody>
          </table>