<?php 
    require_once('../../private/initialize.php'); 
    if($_POST){
        $firstname = $_POST['firstname'] ?? "";
        $email = $_POST['email'] ?? "";
        
        $subject = "Welcome to our community 🎉";
        $body = "
            <p>Dear ". $firstname .",</p>
            <div>Welcome to our e-notary community.</div>
            <p>
                <p>
                    Our mission is to create a world where every document shared can be trusted.<br />
                </p>
                
                <p>
                Now that you’ve met the requirements and your listing in our e-notary
                community is approved, here’s how it works.
                </p>

                <p>
                1. You will be contacted from time to time to confirm your availability to
                notarise   documents   by   hosting   virtual   notary   sessions   where
                necessary.
                </p>

                <p>
                2. Clients’ documents along with their relevant ID will be shared with you
                for review prior to every session.
                </p>

                <p>
                3. You will be able to host successful notary sessions via zoom calls.
                </p>

                <p>
                4. Full payment would be made following every successful notary session
                with a client. As a partner with us, you will be able to earn: 
                <p>
                <ul>
                    <li>A flat rate of N5000 per Notary Session </li>
                    <li>A sum of N2500 for an additional seal/document copy </li>
                    <li>A sum of N1000 for affidavits; for the various affidavit use cases. </li>
                    <li>A Custom and pre-agreed fee for high transaction documents   </li>
                </ul>

                <p>
                We encourage our notaries to treat every request diligently and turn them
                into successful transactions. 
                </p>
                
                <p>
                For any other enquiry or further assistance, please feel free to respond to this
                email or call the number below
                </p>

            </p>

            <p>
                <div>Regards,<br></div>
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