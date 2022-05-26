
<?php require_once('../../../private/initialize.php');
 
// Fetch records from database 
$allmember = Admin::find_by_undeleted(['order' => 'ASC']);
if(count($allmember) > 0){
    // $delimiter = ",";
    // $fileName = 'search_terms.csv';
    $delimiter = ","; 
    $filename = "toNoteAdmin_" . date('Y-m-d') . ".csv"; 



    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers 
    $fields = array('ID', 'firstname', 'lastname', 'email','Role'); 

    fputcsv($f, $fields, $delimiter);

    $sn = 1;
    foreach ($allmember as $item){
        $lineData = array(
            $sn++, 
            $item->first_name, 
            $item->last_name, 
            $item->email, 
            Admin::ADMIN_LEVEL[$item->admin_level], 
        ); 
        fputcsv($f, $lineData, $delimiter); 
    }
     // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>