<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require '../vendor/autoload.php';





	//data sent by contact form

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {  	//use filter to check email
		$email = "email is invalid";
	}

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullName = $firstname.' '. $lastname;
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$txt = "You have received an e-mail from ".$fullName ."\r\nEmail: " .$email ."\r\nMessage: ". $message;

	//Create an instance of PHPMailer; passing `true` enables exceptions
	$phpmailer = new PHPMailer();

	try {
		//Server settings
		$phpmailer->isSMTP();
		$phpmailer->Host = 'smtp.mailtrap.io';
		$phpmailer->SMTPAuth = true;
		$phpmailer->Port = 2525;
		$phpmailer->Username = '85b4c4715f9f6d';
		$phpmailer->Password = '339c8925bc24a3';

		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
		//$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

		//Recipients
		$phpmailer->setFrom($email, $fullName);
		$phpmailer->addAddress('info@mailtrap.io', '');     //Add a recipient

		//$mail->addAddress($email);               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$phpmailer->isHTML(false);                                  //Set email format to HTML
		$phpmailer->Subject = $subject;
		$phpmailer->Body    = $txt;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$phpmailer->send();
		//echo 'Message has been sent';
		header('Location:thankyou.html');
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: { $phpmailer->ErrorInfo }";
	}

?>
