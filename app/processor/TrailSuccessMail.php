<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags ($_POST['email']);
        $subject = "Signup Successful";
        $full_name = '';
        $body = "
            <p>Hi ". $email ."</p>
            <p>Thank you for signing up for 30 days free trail on the ToNote Application!</p>

            
            <p>Your will be informed as soon as we launch.</p> 
            <p> To get affidavits and notarised documents at the moment, Please fill-in the request form on the website or contact sales at the below details. </p>

            <p>
                <div>Yours Credibly,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">The ToNote Team.</h3>
                <div>Phone: +2348146507035</div>
                <div>Email: ask@gettonote.com</div>
                <div>Website: www.gettonote.com  </div>
                <div>Address: 1625b Saka Jojo Street, Victoria Island, Lagos</div>
            </p>

        ";
        $sendMail = MailScript::pushMail(['mailTo' => $email, 'recieverName' => $full_name, 'subject' => $subject, 'body' => $body]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
 ?>