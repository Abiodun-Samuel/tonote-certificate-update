<?php 
require_once('../private/initialize.php'); 
$args = $_POST;
$bizUser = new FreeTrailSubscription($args);
$saveFormData = $bizUser->save();
// $saveFormData = true;
if ($saveFormData == true) {
	exit(json_encode(['msg' => 'Subscribed Successfully', 'success' => true, 'email' => $_POST['email'] ]));
}else{
	exit(json_encode(['msg' => display_errors($bizUser->errors), 'success' => false, ]));
}

?>