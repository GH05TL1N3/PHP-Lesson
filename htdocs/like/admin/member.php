<?Php
include("../include/settings.php");
include("../include/connect.php");
include("function/chk-login.php");
if (isset($_GET["select"])){
	if ($_POST["select"] == "del"){
		try{
			foreach ($_POST["checkbox-select"] as $id){
				$stmt = $dbHandle->prepare("DELETE FROM `vipuser` WHERE `id` = :id");
				$stmt->bindParam(":id", $id);
    			$stmt->execute();
			}
		}catch(PDOException $e){die("MySQL Error: {$e->getMessage()}");}
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จัดการสมาชิก - Admin</title>
<link rel="stylesheet" href="css/redmond/jquery-ui-1.10.3.custom.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/js-jq.js"></script>
</head>

<body>
<?Php include("template/nav.php"); ?>
<div class="re-html">
  <h2>จัดการสมาชิก</h2>
  <hr>
<?Php $a = $_GET["a"]; if (empty($a)){ ?>
  <form action="?select" method="post">
    <table cellpadding="0" cellspacing="0" width="100%">
      <thead>
        <th>#ID</th>
        <th>E-mail</th>
        <th>หมดอายุ</th>
        <th><input type="checkbox" id="chk-all"></th>
      </thead>
      <tbody>
<?Php
$limit = 30;
if(empty($_GET["page"])) $start = 0;
else $start = ($_GET["page"] - 1) * $limit;
$arr = $dbHandle->query("SELECT COUNT(`id`) AS `Count` FROM `vipuser`")->fetch();
$total = $arr["Count"];
$page = ceil($total/$limit);
if (($_GET["page"] < 1 and $_GET["page"] != "") or (!is_numeric($_GET["page"]) and $_GET["page"] != "")) echo "<script>window.location = '?page=1'</script>";
else if ($_GET["page"] > $page) echo "<script>window.location = '?page=".$page."'</script>";
$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` ORDER BY `id` DESC LIMIT ?, ?;");
$stmt->execute(array($start, $limit));
while($arr = $stmt->fetch()){
?>
        <tr>
          <td align="center"><a href="?a=edit&id=<?Php echo $arr["id"]; ?>">#<?Php echo $arr["id"]; ?></a></td>
          <td><?Php echo $arr["email"]; ?></td>
          <td align="center"><?Php echo $arr["expire"]; ?></td>
          <td align="center"><input type="checkbox" class="checkbox-select" name="checkbox-select[]" value="<?Php echo $arr["id"]; ?>"></td>
        </tr>
<?Php } ?>
      </tbody>
      <tfoot>
        <tr>
          <td align="right" colspan="5">
<?Php if ($total != 0): ?>
            <ul class="pager">
    <?Php echo (1 >= ($_GET["page"] == "" ? 1 : $_GET["page"]) ? "<li><a href=\"?page=1\">&larr; หน้าที่ผ่านมา</a></li>" : "<li><a href=\"?page=".($_GET["page"] - 1)."\">&larr; หน้ารที่ผ่านมา</a></li>"); ?>

    <?Php echo ($page <= ($_GET["page"] == "" ? 1 : $_GET["page"]) ? "<li><a href=\"?page=".$_GET["page"]."\">หน้าถัดไป &rarr;</a></li>" : "<li><a href=\"?page=".(($_GET["page"] == "" ? 1 : $_GET["page"]) + 1)."\">หน้าถัดไป &rarr;</a></li>"); ?>

            </ul>
<?Php endif ?>
          </td>
        </tr>
        <tr>
          <td align="right" colspan="5">
            <select name="select" id="select">
              <option value="0">เลือก...</option>
              <option value="del">ลบ</option>
            </select>
            <span>ที่เลือก</span>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
<?Php
}else if ($a == "edit"){
	$uid = $_GET["id"];
	try{
		$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ?;");
		$stmt->execute(array($uid));
		$arr_user = $stmt->fetch();
	}catch(PDOException $e){
		var_dump($e);
	}
?>
  <script>
  $(function(){
  	$("#expire").datepicker({ dateFormat: "yy-mm-dd" });
  });
  </script>
  <form action="?a=save&id=<?Php echo $uid; ?>" method="post">
    <div>
      <label>ID</label>
      <span><?Php echo $arr_user["id"]; ?></span>
    </div>
    <div>
      <label>Email</label>
      <span><?Php echo $arr_user["email"]; ?></span>
    </div>
    <div>
      <label for="expire">Expire</label>
      <input name="expire" type="text" id="expire" value="<?Php echo $arr_user["expire"]; ?>" size="12">
    </div>
    <div>
      <label for="setpassto">Set Pass to</label>
      <input name="setpassto" type="text" id="setpassto" size="25">
    </div>
    <div>
      <label>&nbsp;</label>
      <button type="submit">บันทึก</button>
      <button type="reset">ยกเลิก</button>
    </div>
  </form>
<?Php 
}else if ($a == "save"){
	$uid = $_GET["id"];
	$md5_newpass = md5($_POST["setpassto"]);
	try{
		if (!empty($_POST["setpassto"])) $stmt = $dbHandle->prepare("UPDATE `vipuser` SET `pass` = :newpass, `expire` = :expire WHERE `vipuser`.`id` = :uid;");
		else $stmt = $dbHandle->prepare("UPDATE `vipuser` SET `expire` = :expire WHERE `vipuser`.`id` = :uid;");
		if (!empty($_POST["setpassto"]))$stmt->bindParam(":newpass", $md5_newpass);
		$stmt->bindParam(":expire", $_POST["expire"]);
		$stmt->bindParam(":uid", $uid);
		$stmt->execute();
	}catch(PDOException $e){
		var_dump($e);
	}
?>
Save True
<script>setTimeout(function(){ window.location = "?a=edit&id=<?Php echo $uid; ?>"; }, 1000)</script>
<?Php }else echo "404"; ?>
</div>
</body>
</html>