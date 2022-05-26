<?php require_once('../../../private/initialize.php'); 
	$args = $_POST;
	$id =  $args['id'];
	$notary = Notary::find_by_id($id);
	$notary->merge_attributes($args);
	$result = $notary->save();
	if ($result == true) {
		exit(json_encode(['success' => true, 'msg' => 'Update successful']));
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($notary->errors)]));
	}
	// pre_r($notary);

?>