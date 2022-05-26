<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $firstname = $_POST['firstname'] ?? "";
        $email = $_POST['email'] ?? "";
        
        $subject = "Tell Us How We Did!";
        $body = "
            <p>Hi ". $firstname .",</p>
           
            <div>If you're receiving this email it's because we've notarised a document for you!</div>
            <p>     
                Please take a moment to complete this short survey and let us know how to serve you better in the future by clicking 
                <a href=\"https://docs.google.com/forms/d/e/1FAIpQLSdqEP1F5sdzcbItdqtR0hMeGsgN8ZxRSi7rblLd1FsPISuSmg/viewform?usp=sf_link\">here</a>
            </p>
               
             <div>Thank you for choosing us!<div>
            <p>
                <div>Your Credibly,<br></div>
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