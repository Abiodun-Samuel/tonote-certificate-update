<?php 
	require_once('../../../../private/initialize.php');
	$arr = $_POST['request'];
	$admin_id = $_POST['admin_id'];

	$staff_email = Admin::find_by_id($admin_id)->email;

	for ($i=0; $i < count($arr); $i++) { 
		$args = [
			'admin_id' => $admin_id,
			'request_id' => $arr[$i],
			'status' => 2,
			'created_by' => $loggedInAdmin->id,
			'created_at' => date('Y-m-d h:i:a')
		];
		$task = New Task($args);
		$result_set = $task->save();
// 		$result_set = true;
	}

	if ($result_set == true) {
		for ($i=0; $i < count($arr); $i++) { 
			$assign_task = Request::find_by_id($arr[$i]);
			$data = [
				'status' => $_POST['status'],
				
			];
			$assign_task->merge_attributes($data);
			$result = $assign_task->save();
// 			$result = true;
					
		}
		if ($result == true) {
				exit(json_encode([
					'msg' => 'Created Successful', 
					'success' => true, 
					'email' => $staff_email,
				]));
		}else{
			exit(json_encode(['msg' => display_errors($assign_task->errors), 'success' => false ]));
		}
	}else{
		exit(json_encode(['msg' => display_errors($task->errors), 'success' => false ]));
	}
	
?>