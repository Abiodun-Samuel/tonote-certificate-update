<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $firstname = $_POST['firstname'] ?? "";
        $email = $_POST['email'] ?? "";
        
        $subject = "Request Acknowledge";
        $body = "
            <p>Hi ". $firstname .",</p>
            <div>Thanks for getting in touch!</div>
            <p>     
                    Your request will be processed between 9am and 6pm on the next working day, Mon - Fri.
            </p>
               

            <p>
                <div>Your Credibly,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">The ToNote Team.</h3>
                <div>W: www.gettonote.com <br /> A: 1625b Saka Jojo Street, Victoria Island, Lagos  </div>
            </p>

        ";
        $sendMail = MailScript::pushMail(['mailTo' => $email,  'subject' => $subject, 'body' => $body]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Weekend Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
    

    https://www.figma.com/file/CGG6jrQjesogqi26whFnFb/NEW-TONOTE?node-id=785%3A73297

    https://www.figma.com/file/hSdK8BC7I4Pbk3O7xFa1He/Tonote---3%264?node-id=3858%3A70796
 ?>