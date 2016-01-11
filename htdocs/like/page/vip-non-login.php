  <h1 style="margin-bottom:0;">VIP</h1>
  <script src="js/vip-log-re.js"></script>
  <div class="alert alert-info" style="margin-bottom:0">สมาชิก VIP สามารถใช้บริการได้ไม่จำกัด ในขณะที่ผู้ใช้งานทั่วไปมีข้อจำกัดมากมาย สามารถดูได้ที่ <a href="./limits">ข้อจำกัดผู้ใช้งานทั่วไป</a></div>
  <div class="row">
    <div class="span6">
      <h3 style="margin-top:0;">เข้าสู่ระบบ</h3>
      <form class="form-horizontal" id="vip-login" method="post">
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="email" id="inputEmail" class="input-large" placeholder="ex.admin@botlike.net" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" class="input-large" id="inputPassword" placeholder="Password" pattern=".{8,}" title="กรุณารหัสผ่านที่มีความยาวอย่างน้อย 8 หลัก" required>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox" id="memorize" name="memorize" value="true"> จดจำ
            </label>
            <button type="submit" class="btn" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">เข้าสู่ระบบ</button>
          </div>
        </div>
      </form>
    </div>
    <div class="span6">
      <h3 style="margin-top:0;">สมัครสมาชิก</h3>
      <form class="form-horizontal" id="vip-register" method="post">
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input type="email" class="input-large" id="email" name="email" placeholder="ex.admin@botlike.net" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="text" class="input-large" id="password" name="password" placeholder="ex. 1234" pattern=".{8,}" title="กรุณาตั้งรหัสผ่านที่มีความยาวอย่างน้อย 8 หลัก" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="TMPassword">รหัสบัตรทรูมันนี่</label>
          <div class="controls">
            <input type="text" class="input-medium" id="TMPassword" name="TMPassword" title="กรุณากรอกรหัสบัตรทรูมันนี่เป็นตัวเลข 14 หลัก" placeholder="รหัสบัตรเงินสดทรูมันนี่ 14 หลัก" size="14" maxlength="14" pattern="[0-9]{14}" required>
            <span style="vertical-align:middle"><a href="./price">ราคาบัตรทรูมันนี่และวันใช้งาน</a></span>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label></label>
            <button type="submit" class="btn" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">สมัครสมาชิก</button>
          </div>
        </div>
      </form>
    </div>
  </div>
