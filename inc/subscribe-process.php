<?php 
	require_once('../private/initialize.php'); 

	$args = $_POST;     
	$Newsletter = new Newsletter($args);
	// $result = $Newsletter->save();
	$result = true;
	if ($result == true) {
		exit(json_encode(['success' => true, 'msg' => "Subscription Successful"]));
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($Newsletter->errors)]));
	}
?>