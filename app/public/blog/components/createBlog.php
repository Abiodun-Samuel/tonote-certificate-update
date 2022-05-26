<?php
require_once('../../../../private/initialize.php');
$args = $_POST;
$args['image'] = $_FILES['image'];
$blog = new Blog($args);
$result = $blog->save();
if ($result == true) {
   exit(json_encode([
      'msg' => 'Created Successful',
      'success' => true,
      'title' => $_POST['title'],
      'slug' => $_POST['slug'],
      'image' => $_POST['image'],
      'created_by' => $_POST['created_by'],
      'summary' => $_POST['summary']
   ]));
} else {
   exit(json_encode(['success' => false, 'msg' => display_errors($blog->errors)]));
}
