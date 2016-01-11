// Admin Template By Host-1gb.com

$(document).ready(function(e) {
    $("button").button().css({ "font-size": "12px" });
	$("#chk-all").click(function(e) {
		$(".checkbox-select").prop("checked", $(this).is(":checked"));
    });
	$("#select").change(function(e) {
        if ($(this).val() != 0){
			$("form").submit();
		}
    });
});