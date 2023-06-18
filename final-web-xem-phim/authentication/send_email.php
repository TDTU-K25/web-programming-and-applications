<?php
require_once "../PHPMailer/src/DSNConfigurator.php";
require_once "../PHPMailer/src/Exception.php";
require_once "../PHPMailer/src/OAuthTokenProvider.php";
require_once "../PHPMailer/src/OAuth.php";
require_once "../PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/src/POP3.php";
require_once "../PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function send_email($receiver, $subject, $content) {
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->CharSet = 'UTF-8';
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'thanhtung24102003@gmail.com';                     //SMTP username
		$mail->Password   = 'zecnrdyboemygunj';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('thanhtung24102003@gmail.com', 'Admin');
		$mail->addAddress($receiver);

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $content;

		$mail->send();
	} catch (Exception $e) {
		die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
	}
}
