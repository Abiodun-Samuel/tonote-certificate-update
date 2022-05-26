<?php 
    if($_POST['notify']) {
    $email = $_POST['email'] ?? "";
    $firstname = $_POST['firstname'] ?? "";
    $lastname = $_POST['lastname'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $trans_type = $_POST['trans_type'] ?? "";
    $subject = "Request a Notary Session";
    

    $output = "
        <div >
            <style type='text/css'>
                .bg--primary{
                    background: #003BB3;
                }
                .text--primary{
                    color: #003BB3;
                }
            </style>
            <div class='container-fluid'>
                <div class='row justify-content-center align-items-center'>
                    <div class='col-xxl-6 col-lg-6'>
                        <div class='card border-0'>
                            <div class='card-header pt-4 pb-4' style='background: #003BB3;'>
                                <a href='index.html'>
                                   <span><img src='https://gettonote.com/img/tlogo.png' alt='' height='40'></span>
                                </a>
                            </div>

                            <div class='card-body p-4' style='margin: 50px 0px'>
                                
                                <div class='m-auto'>
                                    <h5 class='text--primary text-center h2  pb-0 fw-bold mb-4'>Welcome Note-mate! 🎉</h5>
                                    
                                    <p class='mt-2'>Dear ". $firstname .",</p>
                                    <p class='text-muted mb-4 my-4'>
                                        Thank you for signing up to join the ToNote community!
                                        You will be receiving product and press updates from us from time to time. Feel free
                                        to contact us when you want to notarise a document or get an affidavit virtually.
                                    </p>
                                    <p class='mt-2 w-50'>
                                        ToNote Technologies Limited
                                        1625B, Saka Jojo Street
                                        Victoria Island
                                        Lagos 100001
                                        Nigeria
                                    </p>
                                </div> 
                            </div> 

                            <div class='card-footer pt-4 pb-4 text-center ' style='background: #003BB3;'>
                                <a href='index.html'>
                                    <span><img src='assets/images/tlogo.png' alt=' height='20'></span>
                                </a>
                            </div>
                        </div>
                        <div class='row mt-3 d-none'>
                            <div class='col-12 text-center'>
                                <p class='text-muted'>Don't have an account? <a href='pages-register.html' class='text-muted ms-1'><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div> 
                </div>
             
            </div>
        </div>";


    
        $body = $output;
        $result = Mailer::SendMail($subject, $body);
        // return true;
        if($result == true){
            exit(json_encode(['success' => true, 'msg' => "Email sent successfully..."]));
        }else{
        // return false;
            exit(json_encode(['success' => false, 'msg' =>  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]));
        }
     
       
    }

 
    
 ?>