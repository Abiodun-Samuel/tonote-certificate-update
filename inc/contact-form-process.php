<?php 
require_once('../private/initialize.php'); 
if (isset($_POST['message'])) {
	$rand = rand(10, 100);
	$args = $_POST;     
	$SupportTicket = new SupportTicket($args);
	$result = $SupportTicket->save();
	if ($result == true) {
		$new_id = $SupportTicket->id;
		$check = SupportTicket::find_by_id($new_id);
		$trans_no = "1" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $rand;
		$data = [
			'ticket_no' => $trans_no,
		];
		$check->merge_attributes($data);
  		$final_result = $check->save();
  		if ($final_result == true) {
  			exit(json_encode(['success' => true, 'msg' => 'Sent successful']));
  		}else{
  			exit(json_encode(['success' => false, 'msg' => display_errors($check->errors)]));
  		}

  		
	}else{
		exit(json_encode(['success' => false, 'msg' => display_errors($SupportTicket->errors)]));
	}
}

?>