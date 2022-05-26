<?php 
// if(isset($_POST["sendMail"]))
// {	
	
	// $from = $_POST['from'] ?? "sakinropo@gmail.com";
	// $firstname = $_POST['firstname'] ?? "John";
	// $lastname = $_POST['lastname'] ?? "Doe";
	// $subject = $_POST['subject'] ?? "";
	// $body = $_POST['body'] ?? "";
	// $exception = $_POST['exception'] ?? '';

	require '../private/shared/mailer/class/class.phpmailer.php';
	$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = "smtp.gmail.com";		//smtpout.secureserver.net //Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = "465";								//80 Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                       // 1 = errors and messages
                                       // 2 = messages only
	$mail->Username = "sakinropo@gmail.com";					//Sets SMTP username
	$mail->Password = "D3p0rtiv0@#";					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = "sakinropo@gmail.com";			//Sets the From email address for the message
	$mail->FromName = "Sandsify Systems";			//Sets the From name of the message
	$mail->AddAddress("sandsify@gmail.com", "Shafi Testing");	
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML	

	//Address to which recipient will reply
	$mail->addReplyTo("ask@gettonote.com", "Reply");

	//CC and BCC
	// $mail->addCC("nnena@thespace.com.ng");
	// $mail->addBCC("fikayo@gettonote.com");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = "<i>Mail body in HTML</i>";
	$mail->AltBody = "This is the plain text version of the email content";

	// if($mail->Send())//Send an Email. Return true on success or false on error
	// {
	// 	// $message = '<label class="text-success">Email sent successfully...</label>';
	// 	exit(json_encode(['success' => true, 'msg' => "Email sent successfully..."]));
	// }else{
	// 	//exit(json_encode(['success' => false, 'msg' => "Fail to send mail"]));
	// 	exit(json_encode(['success' => false, 'msg' =>  $mail->ErrorInfo]));
	// }
	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
// }
 ?>