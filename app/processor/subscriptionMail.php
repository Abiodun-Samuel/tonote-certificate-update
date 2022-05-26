<?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']) ?? "";
        // $full_name = $firstname. " ". $lastname;

        $subject = "Welcome to our community";
        $body = "
            <p>Hi ". $email .",</p>
            <div>
                <div>Thank you for signing up to join the ToNote community!</div>
                <div>
                    From time to time, you will be receiving product and press updates from us. Please feel free to contact us whenever you want to notarise a document or get an affidavit virtually.
                </div>
            </div>

            <p>
                <div>Thanks,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">The ToNote Team.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
            </p>

        ";
        $sendMail = MailScript::pushMail(['mailTo' => $email,  'subject' => $subject, 'body' => $body]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
?>