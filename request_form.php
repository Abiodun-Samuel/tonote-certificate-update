<?php 
    // if($_POST) {
    //     $email = $_POST['email'] ?? "sakinropo@gmail.com";
    //     $firstname = $_POST['firstname'] ?? "John";
    //     $lastname = $_POST['lastname'] ?? "Doe";
    //     $phone = $_POST['phone'] ?? "";

        
    //     function mailer($email, $firstname, $lastname, $phone, $body){
    //         require 'admin/private/shared/mailer/class/class.phpmailer.php';
    //         $mail = new PHPMailer(true); 
            
    //         $mail->SMTPDebug = 0;                                       
    //         $mail->isSMTP();                                            
    //         $mail->Host       = 'localhost';                    
    //         $mail->SMTPAuth   = true;                             
    //         $mail->Username   = 'u474mp54g1x5';                 
    //         $mail->Password   = 'G3t2n0t3';                        
    //         // $mail->SMTPSecure = 'tls';                              
    //         $mail->Port       = 25;  
          
    //         $mail->setFrom('ask@gettonote.com', 'Tonote Technologies limited');           
    //         $mail->addAddress($email, $firstname." ".$lastname);
    //         // $mail->addCC('shafi@gettonote.com', 'Shafi Gettonote');
    //         $mail->addBCC("sakinropo@gmail.com");
               
    //         $mail->isHTML(true);                                  
    //         $mail->Subject = 'Request a notary session';
    //         $mail->Body    = $body;
    //         $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    //         $mail->send();
    //         // return true;
    //         if($mail->Send()){
    //             exit(json_encode(['success' => true, 'msg' => "Email sent successfully..."]));
    //         }else{
    //         // return false;
    //             exit(json_encode(['success' => false, 'msg' =>  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]));
    //         }

    //     }
    //     $body = '
    //         <p>Dear '. $firstname .'</p>

    //         <p>Thank you for completing our Request Form.</p>
        
    //         <p>Please <a href="https://docs.google.com/forms/d/e/1FAIpQLSeVqM0cMldS_rJYOHqDHoHBwXK64g_HxQtyIe9tprWpNCL3RQ/viewform">click here</a> to fill our enquiry form.</p>
            
    //         <p>This is a test email.</p>
        
    //         <p>Nnena from ToNote</p>
    //     ';
        
    //     $sendMail = mailer($email, $firstname, $lastname, $phone, $body);
        
        

        
    // }


 ?>