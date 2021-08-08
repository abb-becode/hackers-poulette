<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	//require ("../vendor/autoload.php");

	$errors = [];
	$result = [];

	function alpha ($string):string {
		return preg_match("/^[a-zA-Z]+( [a-zA-Z]+)+$/",$string) || preg_match("/^[a-zA-Z ]+$/",$string);
	}
	/*function alphaNum ($string):string {
		return preg_match("/^[a-zA-Z0-9 ]*$/",$string);
	}*/
	function validEmail ($string):string {
		$string = filter_var($string, FILTER_SANITIZE_EMAIL);
		return  filter_var($string, FILTER_VALIDATE_EMAIL);
		//&& preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/",$string);
	}

	function html($string):string
	{
		$string = trim($string); // remove spaces
		$string = stripcslashes($string); //remove backslash
		$string = htmlspecialchars($string); //Convert "<"  and ">" to HTML entities:
		return htmlentities($string, ENT_QUOTES, 'ISO-8859-1'); //Convert some characters to HTML entities
	}

	//check if submit button was clicked
	if (empty($_POST) || !isset($_POST["btn-submit"])) return;

	// Debug
	$firstname = html($_POST['firstname']);
	$lastname = html($_POST['lastname']);
	$email = html($_POST['email']);
	$message = html($_POST['message']);
	$subject = $_POST['subject'];

	if ( empty($firstname) || !alpha($firstname) ) {
		$errors['firstname'] = "Enter a valid first name";
	}
	if ( empty($lastname) || !alpha($lastname) ) {
		$errors['lastname'] = "Enter a valid last name";
	}
	if ( empty($email) || !validEmail($email) ) {
		$errors['email'] = "Enter a valid email";
	}
	if ( empty($message) || !alpha($message) ) {
		$errors['message'] = "Enter a valid message";
	}

	//check errors : if error stop propagation and return
	if (count($errors) > 0) { return; }

	//echo "all fields are ok";


	//compose email
	/*$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullName = $firstname.' '. $lastname;
	$subject = $_POST['subject'];
	$message = $_POST['message'];*/

	$fullName = $firstname.' '. $lastname;
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
		$phpmailer->isHTML(true);                                  //Set email format to HTML
		$phpmailer->Subject = $subject;
		$phpmailer->Body    = $txt;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$phpmailer->send();

		$_POST = [];
		$result['success'] = "Your message was sent successfully!  ";

		header('Location:index.php');
	} catch (Exception $e) {
		//echo "Message could not be sent. Mailer Error: { $phpmailer->ErrorInfo }";
		$result['failed'] = "Something went wrong. Check your Network connection and Please try again.";
	}

?>
