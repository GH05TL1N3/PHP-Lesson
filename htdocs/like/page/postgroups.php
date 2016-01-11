  <script src="js/postgroups.js"></script>
  <div class="text-center">
    <h1>โพสลงกลุ่ม</h1>
<?Php if (($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))){ ?>
    <div class="alert alert-block" style="text-align:left">ผู้ใช้งานทั่วไป จะโพสกลุ่มได้สูงสุดเพียง 10 กลุ่ม <strong><a href="./vip">สมัครสมาชิก VIP</a></strong> สามารถโพสลงกลุ่มได้ไม่จำกัด</div>
<?Php } ?>
    <div id="box-input">
      <input type="url" class="input-xxlarge" id="url-accesstoken" name="url-accesstoken" placeholder="https://www.facebook.com/connect//login_success.html#access_token=CAACIS9ZC8nioBAO52cS1KifLX7PxpPvuWOz7zBOq4tUXU3ClHjcSsWvEQnwOyaDBipuqOSTKM7XKV6T55D0qxkU5X8NZAXFe5nMgzXmgZAe105ph13iBmv4u9GZAj08czQSTRyYhWeIckA7fjAgPVTwAxqRkc1o1OVem1J1pZCTUl5NdykXPK&expires_in=0" required />
      <p>
        <button class="btn btn-primary" id="open-token">รับ Token</button>
        <button class="btn btn-success" id="ok" data-loading-text="<img src='img/ajax-loader.gif' /> รอซักครู่...">เข้าใช้งาน</button>
      </p>
    </div>
    <div id="box-lish">
      <div><textarea id="msg" class="input-xlarge" placeholder="กรอกข้อความที่นี่"></textarea></div>
      <button class="btn" id="btn-post" style="vertical-align:top;" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">Post!</button>
      <div><img src="img/ajax-loader2.gif" id="loading" /></div>
      <div id="html-groups"></div>
    </div>
  </div>
