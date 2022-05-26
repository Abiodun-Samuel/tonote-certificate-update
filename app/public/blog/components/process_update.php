<?php require_once('../../../../private/initialize.php');
$args = $_POST;
$id =  $args['id'];
$blog = Blog::find_by_id($id);

function slugify($string)
{
   $slug = trim($string);
   $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
   $slug = str_replace(' ', '-', $slug);
   $slug = strtolower($slug);
   return $slug;
}

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
$path = '../../../../inc/uploads/blog/';


$img = $_FILES['imageupload']['name'];
$tmp = $_FILES['imageupload']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// rename image 
$final_image = slugify($_POST['title']) . '-' . uniqid() . '.' . $ext;

$path = $path . $final_image;
move_uploaded_file($tmp, $path);

$args['image'] = $final_image;
$blog->merge_attributes($args);
$result = $blog->save();

if ($result == true) {
   exit(json_encode(['success' => true, 'msg' => 'Update successful']));
} else {
   exit(json_encode(['success' => false, 'msg' => display_errors($blog->errors)]));
}
	// pre_r($notary);
