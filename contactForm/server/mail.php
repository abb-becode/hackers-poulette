<?php
	use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	//require 'vendor/autoload.php';
	/*require 'vendor/phpmailer/phpmailer/src/Exception.php';
	require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'vendor/phpmailer/phpmailer/src/SMTP.php';*/

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);


	//check email
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email = "email is invalid";
	}
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullName = $firstname.' '. $lastname;
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$txt = "You have received an e-mail from ".$fullName ."\r\nEmail: " .$email ."\r\nMessage: ". $message;

	try {
		//Server settings
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = '2c8cefa4148a0a';                     //SMTP username
		$mail->Password   = '20436aa88e08ac';                                //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
		$mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

		//Recipients
		$mail->setFrom('from@example.com', 'Mailer');
		$mail->addAddress($email, $fullName);     //Add a recipient
		//$mail->addAddress($email);               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(false);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $txt;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
		header('Location:thankyou.html');
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}






	// Add a recipient
	//$mail->addAddress('khedda.iyad@gmail.com');


	// Set email format to HTML
	//$mail->isHTML(true);

	// Mail subject
	/*$subject = $_POST['subject'];
	$mail->Subject = $subject;*/


	// Mail body content
/*	$message = $_POST['message'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullName = $firstname.' '. $lastname;
	//$headers = "From: ".$fullName. "\r\n";
	$txt = "You have received an e-mail from ".$fullName ."\r\nEmail: " .$email ."\r\nMessage: ". $message;
	$bodyContent = $txt;
	//$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
	$mail->Body    = $bodyContent;*/

	// Send email
	/*if(!$mail->send()) {
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	} else {
		echo 'Message has been sent.';
	}*/

	/*
	$errors = [];
	$emailValid = false;
	echo "email valid ? ".$emailValid;
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullname = $firstname.' '. $lastname;

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	echo "email after sanitize : ".$email;
	if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
		//$errors['email'] = "email is invalid.";
		$email = "email is invalid";
	} else { $emailValid = true; }

	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$to = "khedda.iyad@gmail.com";

	$headers = "From: ".$fullname. "\r\n";
	$txt = "You have received an e-mail from ".$fullname ."\r\nEmail: " .$email ."\r\nMessage: ". $message;
*/
	//echo "email valid 2 ? ";
	//if($emailValid) {
		//if (mail($to, $subject, $txt, $headers)) { echo "send email success"; } else { echo "send email failure"; } ;
	//}

	//header('Location:thankyou.html');
?>
