<?Php
include("../include/settings.php");
include("../include/connect.php");
include("function/chk-login.php");
if (isset($_GET["select"])){
	if ($_POST["select"] == "del"){
		try{
			foreach ($_POST["checkbox-select"] as $id){
				$stmt = $dbHandle->prepare("DELETE FROM `accesstoken` WHERE `id` = :id");
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
<title>Access Tokens - Admin</title>
<link rel="stylesheet" href="css/redmond/jquery-ui-1.10.3.custom.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/js-jq.js"></script>
</head>

<body>
<?Php include("template/nav.php"); ?>
<div class="re-html">
  <h2>Access Tokens</h2>
  <hr>
  <form action="?select" method="post">
    <table cellpadding="0" cellspacing="0" width="100%">
      <thead>
        <th>#ID</th>
        <th>AccessToken</th>
        <th>Facebook User ID</th>
        <th><input type="checkbox" id="chk-all"></th>
      </thead>
      <tbody>
	  
<?Php
$limit = 30;
if(empty($_GET["page"])) $start = 0;
else $start = ($_GET["page"] - 1) * $limit;
$arr = $dbHandle->query("SELECT COUNT(`id`) AS `Count` FROM `accesstoken`")->fetch();
$total = $arr["Count"];
$page = ceil($total/$limit);
if (($_GET["page"] < 1 and $_GET["page"] != "") or (!is_numeric($_GET["page"])) and !empty($_GET["page"])) echo "<script>window.location = '?page=1'</script>";
else if ($_GET["page"] > $page) echo "<script>window.location = '?page=".$page."'</script>";
$stmt = $dbHandle->prepare("SELECT * FROM `accesstoken` ORDER BY `id` ASC LIMIT ?, ?;");
$stmt->execute(array($start, $limit));
while($arr = $stmt->fetch()){
?>
        <tr>
          <td align="center">#<?Php echo $arr["id"]; ?></td>
          <td><?Php echo $arr["accesstoken"]; ?></td>
          <td><a href="http://www.facebook.com/<?Php echo $arr["fbuid"]; ?>" target="_blank"><?Php echo $arr["fbuid"]; ?></a></td>
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
</div>
</body>
</html>