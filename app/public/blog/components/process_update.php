<?php require_once('../../../../private/initialize.php');
$args = $_POST;
$id =  $args['id'];
$blog = Blog::find_by_id($id);
$blog->merge_attributes($args);
$result = $blog->save();
if ($result == true) {
   exit(json_encode(['success' => true, 'msg' => 'Update successful']));
} else {
   exit(json_encode(['success' => false, 'msg' => display_errors($blog->errors)]));
}
	// pre_r($notary);
