<?php require_once('../../../../private/initialize.php'); 
	$args = $_POST;
	$id =  $args['id'];

	$agent = Agent::find_by_id($id);
	
	$agent->merge_attributes($args);
	$result = $agent->save();
	if ($result == true) {
		exit(json_encode(['success' => true, 'msg' => 'Update successful']));
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($agent->errors)]));
	}
	// pre_r($_POST);

?>