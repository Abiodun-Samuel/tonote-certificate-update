<?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']) ?? "";
        $numb = FreeTrailSubscription::find_by_undeleted();

            $subject = "We have a new free Trail Signup";
            $body = "
            <p>Hi Team,</p>
            <div>
                we have ". count($numb) ." new free trail signup 
                <table>
                    <tr>
                        <td>Email:</td> <td> ". $email ." </td> 
                    </tr>
                    
                </table>
                <p><a href=\"https://gettonote.com/app\">Login</a> to the portal for further action.</p> 
            </div>

            <p>
                <div>Regards,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">Auto Email Engine.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
            </p>

        ";

        
        $sendMail = MailScript::pushMail(['mailTo' => 'ask@gettonote.com', 'recieverName' => 'ToNote Email Assistant', 'subject' => $subject, 'body' => $body, 'copy' => true]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
 ?>