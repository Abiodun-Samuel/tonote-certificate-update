<?php 
require_once('../private/initialize.php'); 
$args = $_POST;
$bizUser = new BusinessUser($args);
$saveFormData = $bizUser->save();
// $saveFormData = true;
if ($saveFormData == true) {
	exit(json_encode(['msg' => 'Sent Successful', 'success' => true ]));
}else{
	exit(json_encode(['msg' => display_errors($bizUser->errors), 'success' => false ]));
}

?>