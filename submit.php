<?php 
require_once('private/initialize.php'); 
if (is_post_request()) {
	$targetDir = "inc/uploads/"; 
	$allowTypes = array('jpg','png','jpeg','gif','pdf'); 
	$args = $_POST;   
    $notary = Notary::find_by_email($args['email']) ?? "";
    $fileNames = $_FILES['file']['name'];


	// function saveFile($targetDir, $fileNames, $allowTypes, $location)
	// {

	// 	if(!empty($fileNames)){ 
	// 		$notary = Notary::find_by_email($_POST['email']) ?? "";
	// 		$arr2 = Notary::uploadFile($targetDir, $fileNames, $allowTypes);
	// 		if (!empty($arr2)) {
	// 			$data = [
	// 				'documents' => $arr2 ??  "",
	// 			];
	// 			$notary->merge_attributes($data);
	// 			// $saveFilename = $notary->save();
	// 			$saveFilename = true;
	// 			if ($saveFilename == true) {

	// 				exit(json_encode(['success' => true,  'msg' => $location .' successfully' ]));
	// 			}
	// 		}
	// 	}
	// }

	$notary = Notary::find_by_email($_POST['email']) ?? "";
	if (!empty($notary->email)) {
			$location = "Updated";
			$notary->merge_attributes($args);
  			$processor = $notary->save();
  			
  			if ($processor == true) {
				if(!empty($fileNames)){ 
					
					$arr2 = Notary::uploadFile($targetDir, $fileNames, $allowTypes);
					if (!empty($arr2)) {
						$data = [
							'documents' => $arr2 ??  "",
						];
						$notary->merge_attributes($data);
						$saveFilename = $notary->save();
						
						if ($saveFilename == true) {

							exit(json_encode(['success' => true,  'msg' => 'Updated successfully' ]));
						}
					}
				}
			}else{
				exit(json_encode(['success' => false,  'msg' => display_errors($processor->errors) ]));
			}
	}else{ 
			// $location = "Created";
			$notary = new Notary($args);
		    $processor = $notary->save();
		    
  			if ($processor == true) {
  				if(!empty($fileNames)){ 
  					$new_id = $notary->id;
  					
  					$check = Notary::find_by_id($new_id) ?? "";
					$arr2 = Notary::uploadFile($targetDir, $fileNames, $allowTypes);
					if (!empty($arr2)) {
						$data = [
							'documents' => $arr2 ??  "",
						];
						$check->merge_attributes($data);
						$saveFilename = $notary->save();
						
						if ($saveFilename == true) {

							exit(json_encode(['success' => true,  'msg' => 'Created successfully' ]));
						}
					}
				}
  			}else{
  				exit(json_encode(['success' => false,  'msg' => display_errors($processor->errors) ]));
  			}
	}

		


















		
	}
 ?>