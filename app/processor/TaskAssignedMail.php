<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = $_POST['email'] ?? "";
        $staff = Admin::find_by_email($email);
        $firstname = $staff->first_name;
        $lastname = $staff->last_name;

        $full_name = $firstname ." ". $lastname;

        $subject = "You have been assigned new task ";
        $body = "
            <p>Hi ". $firstname ."</p>

            <p>
                You have been assigned a new task!
                <div><a href=\"https://gettonote.com/app\">Login</a> to the portal for further action.</div> 
            </p>

            <p>
                <div>Regards,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">ToNote Email Assistant.</h3>
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