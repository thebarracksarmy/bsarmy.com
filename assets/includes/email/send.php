<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function send_sms($id, $message) {

	global $conn;

	$gateway_address = get_sms_gateway($id);

	// 244 characters, but we don't care because extended messaging is a thing for most people and it will be split
	// for those that don't have it

	$code = rand(100000, 999999);
	$epoch = time();
	

	$new_user_message = 'Thank you for registering at bsarmy.com. Your instead of a password, please click this link: https://bsarmy.com/verify.php?code=$code&epoch=$epoch to verify your account. If you did not register, please ignore this message.';

	// Send the message using php mailer
	


	require 'email/Exception.php';
	require 'email/PHPMailer.php';
	require 'email/SMTP.php';

	if (!isset($_POST['phone_number']) && !empty($_POST['phone_number'])) {
		echo "No phone number provided";
		exit();
	} else {
		$phone_number = $_POST['phone_number'];
		$cellular_provider = $_POST['cellular_provider'];
	}



	$mail = new PHPMailer(true); // Passing `true` enables exceptions
	$mail->isSMTP(); 
	$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
	$mail->Port = 465; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->SMTPAuth = true;
	// Get sensitive information from a credential file
	require_once($_SERVER["DOCUMENT_ROOT"] . '../email_creds.php');
	$mail->Username = $smtpUsername;
	$mail->Password = $smtpPassword;
	$mail->setFrom($smtpUsername, 'bsarmy.com SMS Login $phone_number with $cellular_provider');
	$emailTo = $gateway_address;
	$mail->addAddress($emailTo, $emailToName);
	$mail->isHTML(false);
	$mail->Body = 'Your bsarmy.com login link is: https://bsarmy.com/login/index.php?code=' . $code . '&epoch=' . time() . '. Please use within 5 minutes. To unsubscribe, go to https://bsarmy.com/unsubscribe_sms/.';

	// var_dump($mail);

	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
}

?>