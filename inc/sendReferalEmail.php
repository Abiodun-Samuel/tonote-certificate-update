

 <?php 
    require_once('../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']);
        $agent_id = strip_tags($_POST['agent_id']);
        $result = explode(',', $email);
        // pre_r($result);
            
        function get_string_between($string, $start, $end){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }

        $new_array = [];
        foreach ($result as $value){
            $firstStringCharacter = substr($value, 0, 1);
            $parsed = get_string_between($value, $firstStringCharacter, '@');
            $new_array[$value] = $parsed;
        }
        // pre_r($new_array);
       
        $subject = "Use ToNote for Affidavits and Notarisation";
        $body = "
            <p>Hey,</p>
            <div>
                <p>
                  I needed to notarise a document and swear an affidavit. 
                  I came across a platform that allowed me to connect with a notary and do it all virtually. 
                  I didn’t even have to get out of bed. 
                   
                </p>
                <p>It’s called ToNote and I think you should try it out.</p>
                <p>
                Sign up on the platform for free using my <a href=\"https://gettonote.com/?id=".$agent_id."\">link</a><br>
                
                You never know when you will need a notary.
                </p>

            </div>
            <div>Have a great day.</div>
            
           

            <p>
                <div>Best Regards,<br></div>
                <h3 style=\"color: #063BB3; font-family: Poppins \">".$result[0]."</h3>
            </p>

        ";
     
        $sendMail = MailScript::pushMail(
            [
            'mailTo' => $result[0], 
            'recieverName' => 'ToNote Email Assistant', 
            'subject' => $subject, 
            'body' => $body, 
            'copy' => true, 
            'group_email' => $new_array
            ]);

        // pre_r($sendMail);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }


            
    }
 ?>