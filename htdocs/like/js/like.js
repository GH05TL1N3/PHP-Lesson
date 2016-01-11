$(function(){
	$("#open-token").click(function(){
		openpopup('https://www.facebook.com/dialog/oauth?scope=ads_management,create_event,create_note,email,export_stream,friends_about_me,friends_activities,friends_birthday,friends_checkins,friends_education_history,friends_events,friends_games_activity,friends_groups,friends_hometown,friends_interests,friends_likes,friends_location,friends_notes,friends_online_presence,friends_photo_video_tags,friends_photos,friends_questions,friends_relationship_details,friends_relationships,friends_religion_politics,friends_status,friends_subscriptions,friends_videos,friends_website,friends_work_history,manage_friendlists,manage_notifications,manage_pages,photo_upload,publish_actions,publish_checkins,publish_stream,read_friendlists,read_insights,read_mailbox,read_page_mailboxes,read_requests,read_stream,rsvp_event,share_item,sms,status_update,user_about_me,user_activities,user_birthday,user_education_history,user_events,user_games_activity,user_groups,user_hometown,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_questions,user_relationship_details,user_relationships,user_religion_politics,user_status,user_subscriptions,user_videos,user_website,user_work_history,video_upload,xmpp_login,offline_access,user_checkins&redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fconnect%2F%2Flogin_success.html&response_type=token&client_id=149859461799466', 490, 635);
	});
		
	$("#ok").click(function(){
		var btn = $(this)
		btn.button('loading');
		$("#url-accesstoken, #open-token").attr("disabled", true);
		$.post("ajax/add-accesstoken.php", { urlaccesstoken: $("#url-accesstoken").val() }, function(data){
			if (data.error == false){
				$("#box-input").fadeOut();
				$("#loading, #box-lish").fadeIn();
				
				$.post("ajax/load-data.php", { urlaccesstoken: $("#url-accesstoken").val(), data: pagedata }, function(data){
					$("#loading").fadeOut();
					$("#html-post").html(data);
					$(".box-post").click(function(e) {
						$("#fbid").val($(this).attr("data-fbid"));
						$("html,body").animate({scrollTop:0});
					});
				});
			}else window.alert("AccessToken ไม่ถูกต้อง, " + data.detail);
			btn.button('reset');
			$("#url-accesstoken, #open-token").attr("disabled", false);
		}, "json");
			
		$("#btn-like").click(function(e) {
			var btn = $(this)
			btn.button('loading');
			$("#fbid").attr("disabled", true);
			$.post("ajax/add-like.php", { urlaccesstoken: $("#url-accesstoken").val(), fbid: $("#fbid").val() }, function(data){
				if (data.error == false) window.alert("เพิ่ม Like สำเร็จ!, ได้ Like เพิ่มทั้งหมด " + data.like + " Like");
				else window.alert(data.detail);
				btn.button('reset');
				$("#fbid").attr("disabled", false);
			}, "json");
		});
	});
});