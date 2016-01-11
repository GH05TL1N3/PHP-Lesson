<?Php
try{
	$stmt = $dbHandle->prepare("SELECT * FROM `vipuser` WHERE `id` = ? and `pass` = ?;");
	$stmt->execute(array($login_uid, $login_md5_pass));
	$arr = $stmt->fetch();
}catch(PDOException $e){
	var_dump($e);
}
$last = (strtotime(date("Y-m-d")) > strtotime($arr["expire"]) ? 0 : getNumDay(date("Y-m-d"), $arr["expire"]));
?>
  <script src="js/vip-login.js"></script>
  <div class="row">
    <div class="span6">
      <h1 style="margin-bottom:0;">VIP</h1>
    </div>
    <div class="span6" style="text-align:right">
      <a class="btn btn-danger" href="vip-logout.php">ออกจากระบบ</a>
    </div>
  </div>
  <div class="row">
    <div class="span6">
      <h3 style="margin-top:0;">คุณสมบัติ</h3>
      <table class="table table-striped" style="max-width:280px; margin-bottom:0;">
        <tbody>
          <tr>
            <td>วันคงเหลือ</td>
            <td><?Php echo $last; ?> วัน</td>
          </tr>
          <tr>
            <td>วันหมดอายุ</td>
            <td><?Php echo $arr["expire"]; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="span6">
      <h3 style="margin-top:0;">ต่ออายุ</h3>
      <form class="form-horizontal" id="vip-renew" method="post">
        <div class="control-group" style="margin-bottom:10px;">
          <label class="control-label" for="TMPassword">รหัสบัตรทรูมันนี่</label>
          <div class="controls">
            <input type="text" class="input-medium" id="TMPassword" name="TMPassword" title="กรุณากรอกรหัสบัตรทรูมันนี่เป็นตัวเลข 14 หลัก" placeholder="รหัสบัตรเงินสดทรูมันนี่ 14 หลัก" size="14" maxlength="14" pattern="[0-9]{14}" required>
            <span style="vertical-align:middle"><a href="./price">ราคาบัตรทรูมันนี่และวันใช้งาน</a></span>
          </div>
        </div>
        <div class="control-group" style="margin-bottom:0;">
          <div class="controls">
            <label></label>
            <button type="submit" class="btn" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">ต่ออายุ</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="span6">
      <h3>เปลี่ยนรหัสผ่าน</h3>
      <form class="form-horizontal" id="vip-newpass" method="post">
        <div class="control-group" style="margin-bottom:10px;">
          <label class="control-label" for="new-pass">New Password</label>
          <div class="controls">
            <input type="text" class="input-medium" id="new-pass" name="new-pass" title="กรุณากรอกรหัสผ่านใหม่ ที่มีความยาวอย่างน้อย 8 ตัวอักษร" placeholder="ex. 1234" pattern=".{8,}" required>
          </div>
        </div>
        <div class="control-group" style="margin-bottom:0;">
          <div class="controls">
            <label></label>
            <button type="submit" class="btn" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">เปลี่ยนรหัสผ่าน</button>
          </div>
        </div>
      </form>
    </div>
    <div class="span6">
      &nbsp;
    </div>
  </div>
