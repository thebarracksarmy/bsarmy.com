<?php

/*

Structure & Login flow:

1. User enters phone number
 - If phone number is not in database, send to register page |BREAK -> 1|
 - If phone number is in database, send to login page
2. User enters code
 - If code is correct, send to home page with a new session
 - If code is incorrect, send to login page |BREAK -> 1|
3. User enters password
 - If password is correct, send to home page with a new session
 - If password is incorrect, send to login page |BREAK -> 1|


How SMS login works:

1. User enters phone number, clicks submit
2. Server looks up phone number in database
 - Determines cellular provider and corresponding sms gateway
 - Generates a random 6 digit code that's stored in memory only 
 - Sends the code to the user's phone number via sms gateway
3. User enters code, clicks submit
 - Server checks if code matches the one stored in memory
 - If code matches, send to home page with a new session
 - If code does not match, send to login page |BREAK -> 1|
 

TODO: If a sms message goes to the wrong person, make it VERY easy to 
remove from the database. Like instant removal without verification. 
But then we'd need a way for a user to login with an alternative method, 
maybe just contact us?


Email credentials are contained in ../../../creds.php, 
same as the database credentials (not version controlled for obvious reasons)

SUMMARY: 

This page accepts a phone number and outputs a 6 digit code.
Intermediately stores the code in memory and removes it after 5 minutes.


The following may be helpful: https://stackoverflow.com/questions/48128618/how-to-use-phpmailer-without-composer
*/




require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception;

if (!isset($_POST['phone_number']) && !empty($_POST['phone_number'])) {
	echo "No phone number provided";
	exit();
} else {
	$phone_number = $_POST['phone_number'];
	$cellular_provider = $_POST['cellular_provider'];
}

$code = 


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
$emailTo = $phone_number . $cellular_provider;
$mail->addAddress($emailTo, $emailToName);
$mail->isHTML(false);
$mail->Body = 'Your bsarmy.com login code is: $code. Please use within 5 minutes. To unsubscribe, go to https://bsarmy.com/unsubscribe_sms.';

var_dump($mail);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}
?>