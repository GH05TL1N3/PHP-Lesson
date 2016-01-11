<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HTML FORM</title>
    </head>
    <body>
        <p id="thistop"></p>
        <form action="form.php" method="POST">
            วัน/เดือน/ปี ที่กรอกข้อมูล : <input type="text" name="date" size="10" maxlength="10" value="<?php echo date("d/m/Y");?>"><br><br>
            ชื่อ : <input type="text" name="firstname" size="20" maxlength="50">
            สกุล : <input type="text" name="lastname" size="20" maxlength="50">
            อายุ : <input type="text" name="age" size="5" maxlength="5"><br><br>
            username : <input type="text" name="username" size="20" maxlength="50">
            password : <input type="password" name="password" size="20" maxlength="50"><br><br>
            <textarea name="comment" rows="10" cols="10" placeholder="Input your comment here." style="margin: 0px; width: 722px; height: 161px;">
            </textarea><br><br>
            
            <input type="checkbox" name="programing" value="HTML">HTML<br>
            <input type="checkbox" name="programing" value="CSS">CSS<br>
            <input type="checkbox" name="programing" value="Javascript">Javascript<br>
            <input type="checkbox" name="programing" value="PHP">PHP<br>
            <input type="checkbox" name="programing" value="MySQL">MySQL<br>
            <input type="checkbox" name="programing" value="CandCpp">C/C++<br>
            <input type="checkbox" name="programing" value="Python" checked>Python<br>
            <input type="checkbox" name="programing" value="Perl">Perl<br>
            <br><br>
            
            <input type="radio" name="sex" value="male" checked>เพศชาย<br>
            <input type="radio" name="sex" value="female">เพศหญิง<br>
            <br><br>
            
            <select name="edu" size="10">
                <option value="ptt" selected>ประถมตอนต้น</option>
                <option value="ptp">ประถมตอนปลาย</option>
                <option value="mtt">มัธยมตอนต้น</option>
                <option value="mtp">มัธยมตอนปลาย</option>
                <option value="pvch">ปวส</option>
                <option value="pvs">ปวช</option>
                <option value="graduate">ปริญญาตรี</option>
            </select>
            
            <select name="edu" size="10" multiple>
                <option value="ptt" selected>ประถมตอนต้น</option>
                <option value="ptp">ประถมตอนปลาย</option>
                <option value="mtt">มัธยมตอนต้น</option>
                <option value="mtp">มัธยมตอนปลาย</option>
                <option value="pvch">ปวส</option>
                <option value="pvs">ปวช</option>
                <option value="graduate">ปริญญาตรี</option>
            </select>
            
            <select name="edu" size="1">
                <option value="ประถมตอนต้น" selected>ประถมตอนต้น</option>
                <option value="ประถมตอนปลาย">ประถมตอนปลาย</option>
                <option value="มัธยมตอนต้น">มัธยมตอนต้น</option>
                <option value="มัธยมตอนปลาย">มัธยมตอนปลาย</option>
                <option value="ปวส">ปวส</option>
                <option value="ปวช">ปวช</option>
                <option value="ปริญญาตรี">ปริญญาตรี</option><br><br>
            </select>
            
            <input type="hidden" name="secret" value="Unl0ck3r"><br><br>
            กรุณาเลือกไฟล์ : <br>
            <input type="file" name="user_file" size="20" maxlength="30">
            <br><br>
            
            <input type="submit" name="submit" value="OK">
            <br><br>
            <input type="image" name="okimg" src="../../favicon.ico">
            <br><br>
            <a href="#thistop"><input type="button" name="thistop" value="Go to top"></a>
            <br><br>
            <input type="reset" name="reset" value="RESET ALL">
            
            <br><br>
            
      
            
            
        </form>
    </body>
</html>
