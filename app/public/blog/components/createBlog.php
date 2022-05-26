<?php
require_once('../../../../private/initialize.php');
$args = $_POST;

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
$blog = new Blog($args);
$result = $blog->save();

if ($result == true) {
   exit(json_encode([
      'msg' => 'Created Successful',
      'success' => true,
      'title' => $_POST['title'],
      'slug' => $_POST['slug'],
      'image' => $final_image,
      'created_by' => $_POST['created_by'],
      'summary' => $_POST['summary']
   ]));
} else {
   exit(json_encode(['success' => false, 'msg' => display_errors($blog->errors)]));
}
