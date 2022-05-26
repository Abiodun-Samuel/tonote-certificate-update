<?php 
require_once('../private/initialize.php'); 
    $targetDir = "uploads/request/";  
    $allowTypes = array('jpg','png','jpeg','pdf'); 
    $rand = date('ymd');
    $fileNames = array_filter($_FILES['file']['name']); 
    
    $arr2 = Request::uploadRequestFile($targetDir, $fileNames, $allowTypes);
    if (!empty($arr2)) {
    	$args = $_POST;     
		$request = new Request($args);
	    $saveFormData = $request->save();
	    // $saveFormData = true;
	    if ($saveFormData == true) {
	    	$new_id = $request->id;
	    	$req_no = "REQ" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $rand;
	    	
	    	$lastrec = Request::find_by_id($new_id);
	    	$data = [
				'id_card_image' => $arr2[0],
				'photo' => $arr2[1],
				'documents' => $arr2[2],
				'req_no' => $req_no,
			];
			$lastrec->merge_attributes($data);
			$storeFileName = $lastrec->save();
			// $lastrec = true;
			if ($saveFormData == true) {
				exit(json_encode(['msg' => 'Request Send Successful', 'success' => true, 'req_no' => $req_no, ]));
			}else{
				exit(json_encode(['msg' => 'Error Saving data', 'success' => false ]));
			}
	    }
    }else{
    	exit(json_encode(['msg' => 'Please Select a file to Upload', 'success' => false ]));
    }



    	
    

 ?>