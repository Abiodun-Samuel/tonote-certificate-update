<?php 
require_once('../private/initialize.php');

if (isset($_POST)) {
	$args = $_POST;
	$findEmail = Agent::find_by_email($_POST['email']);
	if (!empty($findEmail)) {
		exit(json_encode([
			'success' => false, 
			'agent_id' => $findEmail->agent_id, 
			'msg' => 'Email Already exist'
		]));
	}else{
		$agent = New Agent($args);
		// $prefix = substr($_POST['location'], 0, 2);

		$result_set = $agent->save();
		if ($result_set == true) {
			$new_id = $agent->id;
	    	$agent_id = "REF" . str_pad($new_id, 3, "0", STR_PAD_LEFT);
	    	$lastrec = Agent::find_by_id($new_id);
	    	$data = [
				'agent_id' => $agent_id,
				'agent_type' => 1,
			];
			$lastrec->merge_attributes($data);
			$storeFileName = $lastrec->save();
			if ($storeFileName == true) {
				exit(json_encode([
					'msg' => 'Created Successful', 
					'success' => true, 
					'agent_id' => $agent_id
				]));
			}else{
				exit(json_encode([
					'msg' => 'Error unable to genetare  agent id at this time', 
					'success' => false, 
				]));
			}
			
		}else{
			exit(json_encode([ 'success' => false,  'agent_id' => '', 'msg' => display_errors($agent->errors), ]));
		}
	}
}

?>