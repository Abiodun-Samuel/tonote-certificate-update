
 <?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']) ?? "";
        $firstname = strip_tags($_POST['firstname']) ?? "";
        $lastname = strip_tags($_POST['lastname']) ?? "";
        $phone = strip_tags($_POST['phone']) ?? "";
        // $trans_type = strip_tags($_POST['trans_type']) ?? "";
        // $req_no = strip_tags($_POST['req_no']) ?? "";


        $subject = "We have a new Notary Signup";
        $body = "
            <p>Hi Team,</p>
            <div>
                We have a new notary signup. See details below <br/><br/>
                <table>
                    
                    <tr>
                        <td>Customer Name:</td> <td> ".$firstname. " ". $lastname ." </td> 
                    </tr>
                    <tr>
                        <td>Customer Email:</td> <td> ".$email." </td> 
                    </tr>
                    <tr>
                        <td>Phone Number:</td> <td> ".$phone." </td> 
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