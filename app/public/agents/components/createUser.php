<?php 
	require_once('../../../../private/initialize.php');
	$args = $_POST;
	$agent = New Agent($args);
	$prefix = substr($_POST['location'], 0, 2);

	$result_set = $agent->save();
	if ($result_set == true) {
		$new_id = $agent->id;
    	$req_no = "TA" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . strtoupper($prefix);
    	$lastrec = Agent::find_by_id($new_id);
    	$data = [
			'agent_id' => $req_no,
		];
		$lastrec->merge_attributes($data);
		$storeFileName = $lastrec->save();
		if ($storeFileName == true) {
			exit(json_encode([
				'msg' => 'Created Successful', 
				'success' => true, 
			]));
		}else{
			exit(json_encode([
				'msg' => 'Error unable to genetare  agent id at this time', 
				'success' => false, 
			]));
		}
		
	}else{
		exit(json_encode(['msg' => display_errors($agent->errors), 'success' => false ]));
	}
?>