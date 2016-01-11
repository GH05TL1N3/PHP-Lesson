<?Php
include("PHPMailer_5.2.4/class.phpmailer.php");

function to_mail($to, $subject, $message){
	if ($set["mailtype"] == "smtp"){
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->CharSet = "utf-8";
		$mail->SMTPAuth = "true";
		
		// Set SMTP
		$mail->Host = $set["mailsmtphost"];
		$mail->Port = $set["mailsmtpport"];
		$mail->Username = $set["mailsmtpuser"];
		$mail->Password = data_decode($mail_set["mailsmtppass"]);
		
		// Set to mail
		$mail->From = $set["mailfrom"];
		$mail->FromName = $set["mailfromname"];
		$mail->AddAddress($to);
		$mail->AddBCC($set["mailbcc"]);  
		$mail->Subject = $subject;
		$mail->Body = $message;
		
		$send = $mail->Send();
	}else if ($set["mailtype"] == "php"){
		
		// Encode Subject to base64
		$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
		
		// To send HTML mail, the Content-type header must be set
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		
		// Additional headers
		$header .= "To: <{$to}>\r\n";
		$header .= "From: {$mail_set["mailfrom"]}<{$mail_set["mailfromname"]}>\r\n";
		$header .= "Bcc: {$mail_set["mailbcc"]}\r\n";
		
		$send = mail($to,$subject,$message,$header);
	}
	return $send;
}

function getNumDay($d1,$d2){
	$dArr1    = preg_split("/-/", $d1);
	list($year1, $month1, $day1) = $dArr1;
	$Day1 =  mktime(0,0,0,$month1,$day1,$year1);
	$dArr2    = preg_split("/-/", $d2);
	list($year2, $month2, $day2) = $dArr2;
	$Day2 =  mktime(0,0,0,$month2,$day2,$year2);
	return round(abs( $Day2 - $Day1 ) / 86400 )+1;
}
?>