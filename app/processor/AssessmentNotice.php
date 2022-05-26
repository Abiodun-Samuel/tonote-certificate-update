
 <?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $id = strip_tags($_POST['id']) ?? "";
        $notary = Certificate::find_by_id($id);
        $fullname = $notary->fullname;
        $email = $notary->email;
        $commission_no = $notary->commission_no;
        $score = $notary->score;
        $certificate_no = $notary->certificate_no;


        $subject = "Notary has completed assessment";
        $body = "
            <p>Hi Team,</p>
            <div>
                A Notary has completed assessment. See details below <br/><br/>
                <table>
                    
                    <tr>
                        <td>Full Name:</td> <td> ".$fullname ." </td> 
                    </tr>
                    <tr>
                        <td>Email:</td> <td> ".$email ." </td> 
                    </tr>
                    <tr>
                        <td>Commission Number:</td> <td> ".$commission_no ." </td> 
                    </tr>
                    <tr>
                        <td>Score:</td> <td> ".$score." </td> 
                    </tr>
                    <tr>
                        <td>Certificate Number:</td> <td> ".$certificate_no." </td> 
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