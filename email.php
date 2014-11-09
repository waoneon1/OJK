<?php
/**
* function.php
* @by : Dharmawan Sukma (waone.on1@gmail.com)
*/
//require_once('config.php');

require_once("phpMailer/class.phpmailer.php"); // path to the PHPMailer class


function sendmail($time_since){
		$mail = new PHPMailer();  
 
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Mailer = "smtp";
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPDebug = 2;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "ebdesk.autoscraper@gmail.com"; // SMTP username
		$mail->Password = "ebdeskrahasia"; // SMTP password 
 
		$mail->From     = "ebdesk.autoscraper@gmail.com";
		$email= "waone.on1@gmail.com";

		$mail->AddAddress($email);  
		$mail->FromName = "Wawan Dharmawan";
 
		$mail->Subject  = "Twitter Error";
		$mail->Body     = 'No tweets added for ' . $time_since . " minutes.";
		$mail->WordWrap = 50;  
 
		if(!$mail->Send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
		echo 'Message has been sent.';
		}


	}



sendmail(5);
?>