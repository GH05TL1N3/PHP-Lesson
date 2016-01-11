  <script src="js/like-load.js"></script>
  <div class="text-center">
    <h1>ดึงรายชื่อคนกดไลค์</h1>
<?Php if (($login == false) or (($login == true) and (strtotime(date("Y-m-d")) > strtotime($arr_user["expire"])))){ ?>
    <div class="alert alert-block" style="text-align:left">ผู้ใช้งานทั่วไป สามารถดึงรายชื่อผู้กด Like ได้สูงสุดเพียง 50 รายชื่อ <strong><a href="./vip">สมัครสมาชิก VIP</a></strong> เพื่อใช้การแสดงข้อมูลผู้กดไลค์ได้ไม่จำกัด</div>
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
      <button class="btn" id="btn-load" style="vertical-align:top;" data-loading-text="<img src='img/ajax-loader3.gif' /> รอซักครู่...">Show Like!</button>
      <div><img src="img/ajax-loader2.gif" id="loading" /></div>
      <div id="html-post"></div>
    </div>
  </div>
  
  <!-- Modal -->
  <div id="Like-lise-Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>Post ID: <span id="show-postid"></span></h3>
    </div>
    <div class="modal-body">
      <table class="table table-striped" style="margin-bottom:0">
        <thead>
          <tr>
            <th>รูป</th>
            <th>ชื่อ</th>
          </tr>
        </thead>
        <tbody id="lish-like">
        </tbody>
      </table>
      <button class="btn btn-block btn-info" id="load-to" data-loading-text="<img src='img/ajax-loader.gif' /> รอซักครู่...">แสดงเพิ่ม</button>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
  </div>
