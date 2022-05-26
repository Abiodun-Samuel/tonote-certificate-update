
<?php require_once('../../../private/initialize.php');
 
// Fetch records from database 
$allmember = Request::find_by_status(['status' => 4]);
// pre_r($allmember);
if(count($allmember) > 0){
    // $delimiter = ",";
    // $fileName = 'search_terms.csv';
    $delimiter = ","; 
    $filename = "toNoteCompletedTask_" . date('Y-m-d') . ".csv"; 



    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers 
    $fields = array('ID', 'Request No.', 'Date', 'Status','Request Type', 'Custmer Name', 'Email', 'Phone', 'Notary In Charge', "Processed By"); 

    fputcsv($f, $fields, $delimiter);

    $sn = 1;
    foreach ($allmember as $value){
        $requestNo = $value->req_no;
        $date = date('M j, Y, g:i a', strtotime($value->created_at));
        $status = Request::STATUS[$value->status];
        $request_type = $value->trans_type;
        $customerName = $value->firstname ." ". $value->lastname;
        $email = $value->email;
        $phone = $value->phone;
        

        $task = Task::find_by_request_id($value->id); 
        foreach ($task as $key => $val) {
            $notary = Notary::find_by_id($val->notary_no);
            $firstname = $notary->firstname ?? "";
            $lastname = $notary->lastname ?? "";
            $full_name = $firstname. " ". $lastname;
            $notaryAssigned = $full_name ?? "Not Set";
            $processedBy =  Admin::find_by_id($val->admin_id)->full_name() ?? "";
        }

        $lineData = array(
            $sn++, 
            $requestNo, 
            $date,
            $status,
            $request_type,
            $customerName,
            $email,
            $phone,
            $notaryAssigned,
            $processedBy,
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