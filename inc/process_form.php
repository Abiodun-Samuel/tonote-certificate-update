<?php 
require_once('../private/initialize.php'); 
$args = $_POST;
$request = new Request($args);
$referral_no = $_POST['referral_no'] ?? "";
$saveFormData = $request->save();
$saveFormData = true;

$today = date('D');
$array = ['Sat', 'Sun', 'Mon'];

// if (in_array($today, $array)) {
// 	exit(json_encode(['weekend' => true]));
// }else{
// 	exit(json_encode(['weekend' => false]));
// }

if ($saveFormData == true) {
		$rand = date('ymd');
    	$new_id = $request->id;
    	$req_no = "REQ" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $rand;
    	$lastrec = Request::find_by_id($new_id);
    	$data = [
			'req_no' => $req_no,
		];
		$lastrec->merge_attributes($data);
		$storeFileName = $lastrec->save();
		if ($storeFileName == true) {
			if (in_array($today, $array)) {
				exit(json_encode(['msg' => 'Request Send Successful', 'success' => true, 'req_no' => $req_no, 'referral_no' => $referral_no, 'weekend' => true]));
			}else{
				exit(json_encode(['msg' => 'Request Send Successful', 'success' => true, 'req_no' => $req_no, 'referral_no' => $referral_no, 'weekend' => false]));
			}
			
		}else{
			exit(json_encode(['msg' => 'Error Saving data', 'success' => false ]));
		}
}else{
	exit(json_encode(['msg' => 'Error Saving data', 'success' => false ]));
}

?>