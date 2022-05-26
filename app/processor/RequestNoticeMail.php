<?php
    require_once('../../private/initialize.php'); 
    if($_POST){
        $email = strip_tags($_POST['email']) ?? "";
        $firstname = strip_tags($_POST['firstname']) ?? "";
        $lastname = strip_tags($_POST['lastname']) ?? "";
        $phone = strip_tags($_POST['phone']) ?? "";
        $trans_type = strip_tags($_POST['trans_type']) ?? "";
        $req_no = strip_tags($_POST['req_no']) ?? "";
        $referral_no = strip_tags($_POST['referral_no']) ?? "";


        if (empty($referral_no)) {
            $subject = "We have a new request";
            $body = "
            <p>Hi Team,</p>
            <div>
                A request has just been made. See details below <br/><br/>
                <table>
                    <tr>
                        <td>Ref No:</td> <td> ". $req_no ." </td> 
                    </tr>
                    <tr>
                        <td>Request Type:</td> <td> ". $trans_type ." </td> 
                    </tr>
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
        }else{
            $agent = Agent::find_by_agent_id($referral_no);
            $task_update = Request::find_by_req_no($req_no);
            if (!empty($agent)) {
                $data = [
                    'accum_point' => $agent->accum_point + 1,
                ];
                $agent->merge_attributes($data);
                $update_point = $agent->save();
            }

            if (!empty($task_update)) {
                $args = [
                    'agent_id' => $agent->agent_id,
                ];
                $task_update->merge_attributes($args);
                $update_request = $task_update->save();
            }

            $agent_name = $agent->first_name. " ". $agent->last_name ?? 'No Name found';
            $subject = "We have a new request from a referral";
            $body = "
            <p>Hi Team,</p>
            <div>
                A request has just been made. See details below <br/><br/>
                <table>
                    <tr>
                        <td>Ref No:</td> <td> ". $req_no ." </td> 
                    </tr>
                    <tr>
                        <td>Request Type:</td> <td> ". $trans_type ." </td> 
                    </tr>
                    <tr>
                        <td>Customer Name:</td> <td> ".$firstname. " ". $lastname ." </td> 
                    </tr>
                    <tr>
                        <td>Customer Email:</td> <td> ".$email." </td> 
                    </tr>
                    <tr>
                        <td>Phone Number:</td> <td> ".$phone." </td> 
                    </tr>
                    <tr>
                        <td>Referral Info:</td> <td> ".$agent_name ." (".$referral_no .")" ." </td> 
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
        }


        
        
        $sendMail = MailScript::pushMail(['mailTo' => 'ask@gettonote.com', 'recieverName' => 'ToNote Email Assistant', 'subject' => $subject, 'body' => $body, 'copy' => true]);
        if($sendMail == true) {
            exit(json_encode(['success' => true, 'msg' => "Email sent successful..."]));
            
        }else{
            exit(json_encode(['success' => false, 'msg' =>  $sendMail]));
        }
    }
 ?>