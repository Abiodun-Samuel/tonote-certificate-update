
 <?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']) ?? "";
        $company_name = strip_tags($_POST['company_name']) ?? "";
        $phone = strip_tags($_POST['phone']) ?? "";
        // $trans_type = strip_tags($_POST['trans_type']) ?? "";
        // $req_no = strip_tags($_POST['req_no']) ?? "";


        $subject = "We have a new Company Signup to our community";
        $body = "
            <p>Hi Team,</p>
            <div>
                We have a new Company signup. See details below <br/><br/>
                <table>
                    
                    <tr>
                        <td>Company Name:</td> <td> ".$company_name ." </td> 
                    </tr>
                    <tr>
                        <td>Company Email:</td> <td> ".$email." </td> 
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