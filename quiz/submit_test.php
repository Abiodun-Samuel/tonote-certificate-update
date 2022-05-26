<?php require_once('../private/initialize.php'); 

if (is_post_request()) { 
	$id = $_POST['id'];
	$notary = Certificate::find_by_id($id);
    $args = $_POST;
    $uniqid = uniqid();
    $certificate_no = "ToNote-" . str_pad($id, 3, "0", STR_PAD_LEFT) . $uniqid;
    $args = [
    	'certificate_no' => $certificate_no,
    	'score' => $_POST['score'],
    ];
    $notary->merge_attributes($args);
    $result = $notary->save();
    if ($result == true) {
         //for logging actions in the log file
        // log_action('Notary Assessment', "{$notary->fullname} Submitted for assessment.", "Notart assessment");s
        
        exit(json_encode(['success' => true, 'msg' => 'saved successfully', 'id' => $id]));
    }else{
    	exit(json_encode(['success' => false, 'msg' => display_errors($notary->errors)]));
    }
   // pre_r($notary);
}

?>