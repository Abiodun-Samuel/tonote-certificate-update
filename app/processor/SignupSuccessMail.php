<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $firstname = strip_tags($_POST['firstname']) ?? "";
        $lastname = strip_tags($_POST['lastname']) ?? "";
        $full_name = $firstname ." ". $lastname;
        $email = strip_tags ($_POST['email']);
        $phone = strip_tags($_POST['phone']) ?? "";
        $subject = "Signup Successful";
        $body = "
            <p>Dear ". $firstname ."</p>
            <p>Thank you for signing up to join the ToNote community!</p>

            
            <p>Your form is currently being reviewed.</p> 

            <p>A member of our team will reach out to you once your information has been verified.</p>

            <p>
                <div>Regards,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">The ToNote Team.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
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