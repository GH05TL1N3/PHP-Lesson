<?Php
include("include/settings.php");
include("include/connect.php");
include("function/chk-login.php");
include("function/function.php");
$page = array(
	"./" => array(
		"name" => "หน้าแรก",
		"page" => "home.php"
	),
	"post" => array(
		"name" => "เพิ่มไลค์โพส",
		"page" => "post.php"
	),
	"fanpage" => array(
		"name" => "เพิ่มไลค์เพจ",
		"page" => "fanpage.php"
	),
	"postgroups" => array(
		"name" => "โพสลงกลุ่ม",
		"page" => "postgroups.php"
	),
/*	"linklike" => array(
		"name" => "สร้างลิ้งบังคับไลค์",
		"page" => "linklike.php"
	),*/
	"like" => array(
		"name" => "ดึงรายชื่อคนกดไลค์",
		"page" => "like.php"
	),
	"vip" => array(
		"name" => "VIP",
		"page" => "vip.php"
	),
	"help" => array(
		"name" => "วิธีใช้",
		"page" => "help.php"
	),
	"content" => array(
		"name" => "ติดต่อเรา",
		"page" => "content.php"
	),
);

//var_dump($page);

define("_DIR",str_replace("\\", "/", dirname(__FILE__)));
# Function
function cleanArray($arr){
	$size = sizeof($arr);
	for($i=0;$i<$size;$i++){
		$thum = trim($arr[$i]);
		if($thum != ""){
			$r[] = $thum;
		}
	}
	return $r;
}
# SERVER_URI
$GURI = str_replace(_DIR . "/","", $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"]);
$URIALL = explode("?",$GURI);
$uri_past = cleanArray(explode("/",$URIALL[0]));
$uri_frist = cleanArray(explode("&",$URIALL[1]));
if(is_array($uri_frist)){
	foreach($uri_frist as $xuri){
		$thum = explode("=",$xuri,2);
		if(count($thum) == 2 and trim($thum[0]) != "") $uri[trim($thum[0])] = trim($thum[1]);
	}
}

try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr_user = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ระบบแลกไลค์อัตโนมัติ</title>
<!-- Enabling responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Css -->
<?Php include("template/include_css.php"); ?>

<!-- Javascript -->
<?Php include("template/include_js.php"); ?>
</head>

<body>
<!-- ส่วนหัวเว็บ -->
<?Php include("template/header.php"); ?>
  
<!-- ส่วนเมนู -->
<?Php include("template/nav.php"); ?>

<!-- ส่วนเนื้อหา -->
<section class="container">
<?Php
//var_dump($uri_past);
if(!empty($uri_past[0])){
	if (is_array($page[$uri_past[0]])) include("page/".(file_exists("page/{$page[$uri_past[0]]["page"]}") ? $page[$uri_past[0]]["page"] : "404.php"));
	else if (file_exists("page/{$uri_past[0]}.php")) include("page/{$uri_past[0]}.php");
	else if (file_exists("page/{$uri_past[0]}.html")) include("page/{$uri_past[0]}.html");
	else include("page/404.php");
}else include("page/home.php");
?>
</section>

<!-- ส่วนท้าย -->
<?Php include("template/footer.php"); ?>
</body>
</html>