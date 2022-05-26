<?php
class MailScript extends DatabaseObject
{

    public static function pushMail($options=[]){ 
            $subject = $options['subject'] ?? false;
            $copy = $options['copy'] ?? false;
            $body = $options['body'] ?? false;
            $mailTo = $options['mailTo'] ?? '';
            $recieverName = $options['recieverName'] ?? false;

            $recipients = [
                  'shafi@gettonote.com' => 'Shafi',
                  'daniel@gettonote.com' => 'Daniel',
                  'olaide@gettonote.com' => 'Olaide',
                  'florence@gettonote.com' => 'Florence',
                  'nnena@thespace.com.ng' => 'Nnena',
                  'anu@thespace.com.ng' => 'Anuoluwapo',
                  'fikayo@gettonote.com' => 'Fikayo Durosinmi-etti',
            ];

            $group_email = $options['group_email'] ?? $recipients;

            // print_r($group_email);

            require_once(SHARED_PATH . '/mailer/class/class.phpmailer.php');
  
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            
            // // localhost method
            $mail->Host       = "localhost"; // SMTP server example
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
            $mail->Username   = "u474mp54g1x5"; // SMTP account username example
            $mail->Password   = "@G3t2n0t3#";        // SMTP account password example


            //smtp method
            // $mail->Host       = "smtp.gmail.com";
            // $mail->Username   = "sakinropo@gmail.com";
            // $mail->Password   = "D3p0rtiv0@#";
            // $mail->SMTPDebug  = 1;  
            // $mail->SMTPAuth   = TRUE;
            // $mail->SMTPSecure = "ssl";
            // $mail->Port       = 465; // Port for SSL: 465 Port for TLS/STARTTLS: 587
            

            $mail->From = "ask@gettonote.com";
            $mail->FromName = "Tonote Technologies limited";

            $mail->AddAddress($mailTo, $recieverName);
            $mail->AddReplyTo('ask@gettonote.com', 'ToNote Technologies Limited');
            if($copy == true){
                // $recipients = array(
                //   'shafi@gettonote.com' => 'Shafi',
                //   'daniel@gettonote.com' => 'Daniel',
                //   'olaide@gettonote.com' => 'Olaide',
                //   'florence@gettonote.com' => 'Florence',
                //   'nnena@thespace.com.ng' => 'Nnena',
                //   'anu@thespace.com.ng' => 'Anuoluwapo',
                //   'fikayo@gettonote.com' => 'Fikayo Durosinmi-etti',
                // );
                foreach($group_email as $email => $name)
                {
                   $mail->AddCC($email, $name);
                }
            }
            $mail->IsHTML(true);

            $mail->Subject = $subject;

            $mail->Body    =  $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            // pre_r($mail);
            if(!$mail->Send()) {
                return $mail->ErrorInfo;
            }else{
                return true;
            }
    }
}