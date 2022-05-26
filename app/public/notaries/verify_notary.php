<?php 
	require_once('../../../private/initialize.php');
if (isset($_POST['verify'])) { 
	$notary = Notary::find_by_id($_POST['id']);
	$rand = date('ymd');
	$new_id = $_POST['id'];
	$notary_no = "ENOT" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $rand;
	$data = [
		'notary_no' => $notary_no,
		'status' => 2,
	];
	$notary->merge_attributes($data);
	$result = $notary->save();
	// $result = true;
	if ($result == true) {
		exit(json_encode(['success' => true, 'msg' => 'Verified Successfully', 
			'firstname' => $notary->firstname, 'email' => $notary->email]));
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($notary->errors) ]));
	}
}
?>

