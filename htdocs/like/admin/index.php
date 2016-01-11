<?Php
include("../include/settings.php");
include("../include/connect.php");
include("function/chk-login.php");
if (isset($_GET["save"])){
	try{
		$_POST["index"] = stripslashes($_POST["index"]);
		$_POST["header"] = stripslashes($_POST["header"]);
		$_POST["footer"] = stripslashes($_POST["footer"]);
		$_POST["help"] = stripslashes($_POST["help"]);
		$_POST["content"] = stripslashes($_POST["content"]);
		$stmt = $dbHandle->prepare("UPDATE `settings` SET `index` = :index, `header` = :header, `footer` = :footer, `help` = :help, `content` = :content, `tmpayrespurl` = :tmpayrespurl, `tmpaymerchantid` = :tmpaymerchantid WHERE `id` = 1;");
		$stmt->bindParam(":index", $_POST["index"]);
		$stmt->bindParam(":header", $_POST["header"]);
		$stmt->bindParam(":footer", $_POST["footer"]);
		$stmt->bindParam(":help", $_POST["help"]);
		$stmt->bindParam(":content", $_POST["content"]);
		$stmt->bindParam(":tmpayrespurl", $_POST["tmpayrespurl"]);
		$stmt->bindParam(":tmpaymerchantid", $_POST["tmpaymerchantid"]);
		$stmt->execute();
	}catch(PDOException $e){die("MySQL Error: {$e->getMessage()}");}
	$stmt = $dbHandle->query("SELECT * FROM `settings` WHERE `id` = 1 LIMIT 1");
	$set = $stmt->fetch();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="css/redmond/jquery-ui-1.10.3.custom.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/js-jq.js"></script>
<!-- <script src="ckeditor/ckeditor.js"></script> -->
<script src="tinymce/tinymce.min.js"></script>
<script>
$(function(){
	tinymce.init({selector: '.ckeditor', plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste moxiemanager"], toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image" });
});
</script>
<style>
.ckeditor{
	width:100%;
	box-sizing:border-box;
	height:300px;
}
</style>
</head>

<body>
<?Php include("template/nav.php"); ?>
<div class="re-html">
  <h2>ตั้งค่าทั่วไป</h2>
  <hr>
  <form action="?save" method="post" id="settings">
    <div>
      <label for="index">คำที่แสดงในหน้าแรก</label>
      <textarea class="ckeditor" id="index" name="index"><?Php echo $set["index"]; ?></textarea>
    </div>
    <div>
      <label for="header">ส่วนหัว</label>
      <textarea class="ckeditor" id="header" name="header"><?Php echo $set["header"]; ?></textarea>
    </div>
    <div>
      <label for="footer">ส่วนท้าย</label>
      <textarea class="ckeditor" id="footer" name="footer"><?Php echo $set["footer"]; ?></textarea>
    </div>
    <div>
      <label for="content">หน้าวิธีใช้</label>
      <textarea class="ckeditor" id="help" name="help"><?Php echo $set["help"]; ?></textarea>
    </div>
    <div>
      <label for="content">หน้าติดต่อเรา</label>
      <textarea class="ckeditor" id="content" name="content"><?Php echo $set["content"]; ?></textarea>
    </div>
    <div>
      <label for="tmpayrespurl">TMPay Respurl</label>
      <input name="tmpayrespurl" type="text" id="tmpayrespurl" value="<?Php echo $set["tmpayrespurl"]; ?>" size="45">
    </div>
    <div>
      <label for="tmpaymerchantid">TMPay MerchantID</label>
      <input name="tmpaymerchantid" type="text" id="tmpaymerchantid" value="<?Php echo $set["tmpaymerchantid"]; ?>" size="20">
      <label for="tmpaymerchantid">สมัคร https://www.tmpay.net</label>
    </div>
    <div>
      <label>&nbsp;</label>
      <button type="submit">บันทึก</button>
      <button type="reset">ยกเลิก</button>
    </div>
  </form>
</div>
</body>
</html>