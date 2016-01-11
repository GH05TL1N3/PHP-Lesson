  <script src="js/like.js"></script>
  <script>pagedata = "posts"</script>
  <div class="text-center">
    <h1>เพิ่มไลค์โพส</h1>
<?Php if (($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))){ ?>
    <div class="alert alert-block" style="text-align:left">ผู้ใช้งานทั่วไป จะได้ไลค์สูงสุด 40 ไลค์ <strong><a href="./vip">สมัครสมาชิก VIP</a></strong> สามารถได้ไลค์ไม่จำกัด</div>
<?Php } ?>
    <div id="box-input">
      <input type="url" class="input-xxlarge" id="url-accesstoken" name="url-accesstoken" placeholder="https://www.facebook.com/connect//login_success.html#access_token=CAACIS9ZC8nioBAO52cS1KifLX7PxpPvuWOz7zBOq4tUXU3ClHjcSsWvEQnwOyaDBipuqOSTKM7XKV6T55D0qxkU5X8NZAXFe5nMgzXmgZAe105ph13iBmv4u9GZAj08czQSTRyYhWeIckA7fjAgPVTwAxqRkc1o1OVem1J1pZCTUl5NdykXPK&expires_in=0" required />
      <p>
        <button class="btn btn-primary" id="open-token">รับ Token</button>
        <button class="btn btn-success" id="ok" data-loading-text="<img src='img/ajax-loader.gif' /> รอซักครู่...">เข้าใช้งาน</button>
      </p>
    </div>
    <div id="box-lish">
      <input type="text" class="input-large" id="fbid" name="fbid" placeholder="Post ID" required />
      <button class="btn" id="btn-like" style="vertical-align:top;" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">Like!</button>
      <div><img src="img/ajax-loader2.gif" id="loading" /></div>
      <div id="html-post"></div>
    </div>
  </div>
