<?php

require_once('private/initialize.php');
require_once('database.php');



$db = $conn; // Enter your Connection variable;
$tableName = 'notary'; // Enter your table Name;
// fetching files from database
$fetchFiles = fetch_files($tableName);
// uploading files on submit
if (isset($_POST)) {
  //  uploading files
  $args = $_POST;
  // pre_r($args);
  $notary = Notary::find_by_email($args['email']);
  // pre_r($notary);
  if ($notary->email != "") {
    $notary->merge_attributes($args);
    // $processor = $notary->save();
    $processor = true;
    if ($processor == true) {
      $result = true;
      $session->message('Saved successfully without Image.');
    } else {
      // exit(json_encode(['msg' => display_errors($processor->errors), 'success' => false]));
      $errors = display_errors($processor->errors);
    }
  } else {
    $notary = new Notary($args);
    // $processor = $notary->save();
    $processor = true;
    if ($processor == true) {
      $result = true;
      $session->message('Updated successfully without Image.');
    } else {
      $errors = display_errors($processor->errors);
    }
  }

  if ($result == true) {
    upload_files($tableName);
  }
}
function upload_files($tableName)
{

  $uploadTo = "inc/uploads/";
  $allowFileExt = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'csv', 'zip');
  $fileName = array_filter($_FILES['file']['name']);
  $fileTempName = $_FILES["file"]["tmp_name"];
  $tableName = trim($tableName);
  if (empty($fileName)) {
    $error = "Please Select files..";
    return $error;
  } else if (empty($tableName)) {
    $error = "You must declare table name";
    return $error;
  } else {

    $error = $storeFilesBasename = '';
    foreach ($fileName as $index => $file) {

      $fileBasename = basename($fileName[$index]);
      $filePath = $uploadTo . $fileBasename;
      $fileExt = pathinfo($filePath, PATHINFO_EXTENSION);
      if (in_array($fileExt, $allowFileExt)) {
        // Upload file to server 
        if (move_uploaded_file($fileTempName[$index], $filePath)) {

          // Store Files into database table
          $newfilename = date('dmYHis') . str_replace(" ", "", basename($fileBasename));
          // echo $newfilename;
          $storeFilesBasename .= "('" . $newfilename . "'),";
        } else {
          $error = 'File Not uploaded ! try again';
        }
      } else {
        $error .= $_FILES['file']['name'][$index] . ' - file extensions not allowed<br> ';
      }
    }
    store_files($storeFilesBasename, $tableName);
  }
  return $error;
}
// File upload configuration 
function store_files($storeFilesBasename, $tableName)
{
  global $db;
  if (!empty($storeFilesBasename)) {
    $value = trim($storeFilesBasename, ',');
    $store = "INSERT INTO " . $tableName . " (photo) VALUES" . $value;

    $exec = $db->query($store);
    if ($exec) {

      echo "files are uploaded successfully";
    } else {
      echo  "Error: " .  $store . "<br>" . $db->error;
    }
  }
}

// fetching padination data
function fetch_files($tableName)
{
  global $db;
  $tableName = trim($tableName);
  if (!empty($tableName)) {
    $query = "SELECT * FROM " . $tableName . " ORDER BY id DESC";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_all(MYSQLI_ASSOC);
      return $row;
    } else {

      echo "No files are stored in database";
    }
  } else {
    echo "you must declare table name to fetch files";
  }
}
