<?php 
	require_once('../../private/initialize.php'); 
    if($_POST){
        $id = strip_tags($_POST['id']) ?? "";
        $notary = Certificate::find_by_id($id);

        $email = $notary->email;
        $fullname = $notary->fullname;
        $commission_no = $notary->commission_no;
        $score = $notary->score;
        $certificate_no = $notary->certificate_no;

        $subject = "Congratulation";
        $body = "
            <p>Congratulation ". $fullname ."</p>
            <p>You have completed the ToNote e-Notary assessment course.</p>

            <p>You scored ".$score." out of 10</p> 

            <p> <a href=\"https://gettonote.com/classroom/certificate.php?cert=".$certificate_no."\">Click here</a> to download your certificate</p>

            <p>
                <div>Yours Credibly,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">The ToNote Team.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
            </p>

        ";
        $sendMail = MailScript::pushMail(['mailTo' => $email, 'recieverName' => $fullname, 'subject' => $subject, 'body' => $body]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
 ?>