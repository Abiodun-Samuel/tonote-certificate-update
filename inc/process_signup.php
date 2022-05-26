<?php 
require_once('../private/initialize.php'); 
  //   $targetDir = "uploads/signup/";  
  //   $allowTypes = array('jpg','png','jpeg','pdf'); 
  //   // $rand = date('ymd');
  //   $fileNames = array_filter($_FILES['file']['name']); 
    
  //   $arr2 = Request::uploadRequestFile($targetDir, $fileNames, $allowTypes);
  //   if (!empty($arr2)) {
  //   	$args = $_POST['personal'];     
		// $notary = new Notary($args);
	 //    $saveFormData = $notary->save();
	 //    // $saveFormData = true;
	 //    if ($saveFormData == true) {
	 //    	// pre_r($notary);
	 //    	$new_id = $notary->id;
	 //    	// $notary_no = "ENOT" . str_pad($new_id, 3, "0", STR_PAD_LEFT) . $rand;
	    	
	 //    	$lastrec = Notary::find_by_id($new_id);
	 //    	$data = [
		// 		'id_card_image' => $arr2[0],
		// 		'photo' => $arr2[1],
		// 		// 'documents' => $arr2[2],
		// 		// 'notary_no' => $notary_no,
		// 	];
		// 	$lastrec->merge_attributes($data);
		// 	$storeFileName = $lastrec->save();
		// 	// $lastrec = true;
		// 	if ($saveFormData == true) {
		// 		exit(json_encode(['msg' => 'Signup Successful', 'success' => true ]));
		// 	}else{
		// 		exit(json_encode(['msg' => display_errors($lastrec->errors), 'success' => false ]));
		// 	}
	 //    }else{
	 //    	exit(json_encode(['msg' => display_errors($notary->errors), 'success' => false ]));
	 //    }
  //   }else{
  //   	exit(json_encode(['msg' => 'Please Select a file to Upload', 'success' => false ]));
  //   }


		$args = $_POST['personal'];     
		$notary = new Notary($args);
	    $saveFormData = $notary->save();
	    // $saveFormData = true;
	    if ($saveFormData == true) {
	    	exit(json_encode(['msg' => 'Signup Successful', 'success' => true ]));
	    }else{
	    	exit(json_encode(['msg' => display_errors($notary->errors), 'success' => false ]));
	    }
    

 ?>