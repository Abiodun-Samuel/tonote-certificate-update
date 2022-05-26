<?php 
	require_once('../../private/initialize.php'); 
    if($_POST){
        $company_name = strip_tags($_POST['company_name']) ?? "";
        $email = strip_tags ($_POST['email']);
        $phone = strip_tags($_POST['phone']) ?? "";
        $subject = "Welcome to our Comunity";
        $body = "
            <p>Hi ". $company_name .",</p>
            <div>
                <p>Thank you for signing up to join the ToNote community!</p>

                <p>Our mission is to create a world where every document shared can be trusted.
                We are building a platform that helps you notarise documents and swear affidavits virtually.</p>


                <div>From time to time, you will be receiving product and press updates from us. Please feel free to contact us whenever you want to notarise a document or get an affidavit virtually. You can do this via the upload feature on our website, email, telephone or WhatsApp. </div>
            </div>
            <div>Have a great day!</div>

            <p>
                <div>Yours Credibly,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">ToNote Team.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
            </p>

        ";
        $sendMail = MailScript::pushMail(['mailTo' => $email, 'recieverName' => $company_name, 'subject' => $subject, 'body' => $body]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
 ?>