$(function(){
	$("#vip-login").submit(function(e) {
        e.preventDefault();
		var form = $(this);
		var btn = $(this).find("button:submit");
		var input = $(this).find("input, button, select");
		btn.button('loading');
		input.attr("disabled", true);
		
		if (!validateEmail($("#inputEmail").val())){
			window.alert("กรุณากรอกอีเมล์, อีเมล์ไม่ถูกรูปแบบ");
			return false;
		}
		
		if ($("#inputPassword").val().length < 8){
			window.alert("กรุณากรอกรหัสผ่านให้มีความยาวอย่างน้อย 8 ตัวอักษร");
			return false;
		}
		
		$.post("vip-login.php", { email: $("#inputEmail").val(), pass: $("#inputPassword").val(), memorize: $("#memorize").is(":checked") }, function(data){
			if (data.error == false){
				window.alert("เข้าสู่ระบบสำเร็จ!");
				window.location.reload();
			}else{
				window.alert(data.detail);
				btn.button('reset');
				input.attr("disabled", false);
			}
		}, "json");
    });
	
	$("#vip-register").submit(function(e) {
        e.preventDefault();
		var form = $(this);
		var btn = $(this).find("button:submit");
		var input = $(this).find("input, button, select");
		btn.button('loading');
		input.attr("disabled", true);
		
		if (!validateEmail($("#email").val())){
			window.alert("กรุณากรอกอีเมล์, อีเมล์ไม่ถูกรูปแบบ");
			return false;
		}
		
		if ($("#TMPassword").val().length != 14){
			window.alert("กรุณากรอกรหัสบัตรทรูมันนี่ความยาว 14 ตัวอักษร");
			return false;
		}
		
		$.post("ajax/vip-register.php", { email: $("#email").val(), password: $("#password").val(), TMPassword: $("#TMPassword").val() }, function(data){
			if (data.error == false){
				window.alert("คุณสามารถเข้าสู่ระบบได้แล้ว โดยใช้รหัสผ่านเป็น:" + data.pass + " แต่เมื่อคุณเข้าสู่ระบบแล้ว อาจจะไม่พบกับวันคงเหลือ VIP ให้รอซักครู่ ระบบกำลังตรวจสอบยอดเงิน");
				form[0].reset();
			}
			else window.alert(data.detail);
			btn.button('reset');
			input.attr("disabled", false);
		}, "json");
    });
});