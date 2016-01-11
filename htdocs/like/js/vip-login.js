$(function(){
    $("#vip-renew").submit(function(e) {
        e.preventDefault();
		var form = $(this);
		var btn = $(this).find("button:submit");
		var input = $(this).find("input, button, select");
		btn.button('loading');
		input.attr("disabled", true);
		
		if ($("#TMPassword").val().length != 14){
			window.alert("กรุณากรอกรหัสบัตรทรูมันนี่ความยาว 14 ตัวอักษร");
			return false;
		}
		
		$.post("ajax/vip-renew.php", { TMPassword: $("#TMPassword").val() }, function(data){
			if (data.error == false){
				window.alert("ระบบได้รับการต่ออายุของท่านแล้ว กรุณารอไม่เกิน 20 นาที การต่ออายุของคุณจึงจะเห็นผล");
				form[0].reset();
			}
			else window.alert(data.detail);
			btn.button('reset');
			input.attr("disabled", false);
		}, "json");
    });
	
	$("#vip-newpass").submit(function(e) {
        e.preventDefault();
		var form = $(this);
		var btn = $(this).find("button:submit");
		var input = $(this).find("input, button, select");
		btn.button('loading');
		input.attr("disabled", true);
		
		if ($("#new-pass").val().length < 8){
			window.alert("กรุณากรอกรหัสผ่านที่มีความยาวอย่างน้อย 8 ตัวอักษร");
			return false;
		}
		
		$.post("ajax/vip-newpass.php", { newpass: $("#new-pass").val() }, function(data){
			if (data.error == false){
				window.alert("รหัสผ่านของคุณถูกเปลี่ยนเป็น:" + data.pass + " แล้ว");
				form[0].reset();
				window.location.reload();
			}
			else window.alert(data.detail);
			btn.button('reset');
			input.attr("disabled", false);
		}, "json");
	});
});