<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $firstname = strip_tags($_POST['firstname']);
        $lastname = strip_tags($_POST['lastname']);

        $full_name = $firstname ." ". $lastname;
        $email = strip_tags ($_POST['email']);
        $password = strip_tags ($_POST['password']);
        $subject = "Welcome to ToNote CRM";
        $body = "
            <p>Hello ". $firstname ."</p>
            <p>You now have access to the ToNote Customer Relation Management Systems!</p>
            <div>Sign-in URL: </div>
            <div><a href=\"https://gettonote.com/app\">www.gettonote.com/app</a></div>
            <div>Login Email: ". $email . "</div>
            <div>One time Password: ". $password . "</div>
            <p>You will be asked to change your password on first attempt login<p>
            <p>
                <div>Regards,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">Auto Email Engine.</h3>
                <div>W: www.gettonote.com | A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
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