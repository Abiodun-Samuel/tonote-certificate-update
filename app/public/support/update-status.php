<?php 
	require_once('../../../private/initialize.php');
	$args = $_POST;
	$request = Request::find_by_id($_POST['request_id']);
	$task = Task::find_by_request_id($_POST['request_id'])[0];
	
	
	// pre_r($task);
	$data = [
		'status' => $_POST['status'],
	];
	$request->merge_attributes($data);
	$result = $request->save();
	// $result = true;
	if ($result == true) {
		$processor = true;
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($request->errors)]));
	}
	
	if ($processor == true) {
		if ($_POST['notary_no'] != "") {
			$data2 = [
				'status' => $_POST['status'],
				'notary_no' => $_POST['notary_no'],
				'updated_at' => date('Y-m-d h:i:s'),
				'updated_by' => $loggedInAdmin->id,
			];
		}elseif($_POST['reason'] != "") {
			$data2 = [
				'status' => $_POST['status'],
				'reason' => $_POST['reason'],
				'updated_at' => date('Y-m-d h:i:s'),
				'updated_by' => $loggedInAdmin->id,
			];
		}else{
			if ($_POST['status'] == 4) {
				$data2 = [
					'status' => $_POST['status'],
					'date_completed' => date('Y-m-d h:i:s'),
					'updated_by' => $loggedInAdmin->id,
				];
				
				$data1 = [
            		'trans_cost' => $_POST['trans_cost'],
            	];
            	$request->merge_attributes($data1);
            	$result1 = $request->save();
            	$agent_id = $request->agent_id ?? "";
            	if (!empty($agent_id)) {
            		$agent = Agent::find_by_agent_id($agent_id);
            		// $new_bonus_amt = $_POST['trans_cost'] / 100 * 10;
            		if ($agent->agent_type == 1) {
            			// court Agent
            			$args_discount = [
	                        // 'discount' => $agent->discount + $new_bonus_amt,
	                        'discount' => intval($agent->discount) + 500,
	                    ];
	                    $agent->merge_attributes($args_discount);
	                    $update_request = $agent->save();
            		}else{
            			// Online Affiliate
            			$args_discount = [
	                        // 'discount' => $agent->discount + $new_bonus_amt,
	                        'discount' => intval($agent->discount) + 50,
	                    ];
	                    $agent->merge_attributes($args_discount);
	                    $update_request = $agent->save();

            		}
	            	
                    // pre_r($agent);
                    
            	}
            	
            	
            	
			}else{
				$data2 = [
					'status' => $_POST['status'],
					'updated_at' => date('Y-m-d h:i:s'),
					'updated_by' => $loggedInAdmin->id,
				];
			}
		}
		
		$task->merge_attributes($data2);

		$result2 = $task->save();
		// $result2 = true;
		if ($result2 == true) {
			exit(json_encode([
				'success' => true, 'msg' => 'Update successful', 'firstname' => $request->firstname, 'lastname' => $request->lastname,  
				'email' => $request->email, 'status' => $_POST['status']
			]));
		}else{
			exit(json_encode(['success' => false, 'msg' => display_errors($task->errors)]));
		}
	}
?>