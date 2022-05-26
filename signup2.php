<?php 
require_once('private/initialize.php'); 
$list = ['Personal Information','Next of Kin Details', 'Membership', 'upload document'];
$errors = "";
$form = "";
$success = "d-none";
if (is_post_request()) {
    $args = $_POST;   
    $notary = Notary::find_by_email($args['email']) ?? "";

	if (!empty($notary->email)) {
			// echo "Update";
			$notary->merge_attributes($args);
  			$processor = $notary->save();
  			// $processor = true;
  			if ($processor == true) {
  				$result = true;
  				$session->message('Saved successfully without Image.');
  			}else{
  				// exit(json_encode(['msg' => display_errors($processor->errors), 'success' => false]));
  				$errors = display_errors($processor->errors);
  			}
  			
	}else{ 
			$notary = new Notary($args);
		    $processor = $notary->save();
		    // $processor = true;
  			if ($processor == true) {
  				$result = true;
  				$session->message('Updated successfully without Image.');
  			}else{
  				$errors = display_errors($processor->errors);
  			}
	}
    function store_files($storeFilesBasename, $new_id){
      if(!empty($storeFilesBasename))
      {
      $value = trim($storeFilesBasename, ',');
       	$check = Notary::find_by_id($new_id);
                     	
		$data = [
	    	'documents' => $storeFilesBasename ,                       
	    ];
	    $check->merge_attributes($data);
	    $query = $check->save();
	    // redirect_to('success.php')
	    $success = "d-block";
	    $form = "d-none";
	    // pre_r($check);
      }
    }
    if($result === true) {
    	// pre_r($notary);
    	    $new_id = $notary->id;
    	    
    	    // File upload configuration 
		    $targetDir = "inc/uploads/"; 
		    $allowTypes = array('jpg','png','jpeg','gif','pdf'); 
		     
		    $rand = rand(10, 100);
		    $fileNames = $_FILES['file']['name']; 
		    $error=$storeFilesBasename='';
		    if(!empty($fileNames)){ 
		    	
		        foreach($fileNames as $key => $val){ 
		            // File upload path 
		            $fileName = basename($fileNames[$key]); 

		            $newfilename = date('dmYHis').$new_id.str_replace(" ", "", basename($fileName));
		            $targetFilePath = $targetDir . $newfilename; 
		            // Check whether file type is valid 
		            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
		          
		            if(in_array($fileType, $allowTypes)){ 
		                // Upload file to server  and  Move file to destination folder
		                $movedFile = move_uploaded_file($_FILES["file"]["tmp_name"][$key], $targetFilePath);
		                // $movedFile = true;
		                if($movedFile){ 
		                	$storeFilesBasename .= "".$newfilename.","; 
		                	// $string = "123,46,78,000";
							
		                }else{ 
		                    // $errors[] = json_encode('Sorry, there was a problem uploading ' . $_FILES['file']['name']);
		                    $errors = "Sorry, there was a problem uploading ";
		                } 
		            }else{ 
		                // $errors = json_encode($_FILES['file']['type']. " is not a permitted type of file.");
		                $errors = "Error: One of the selected file is not a permitted type of file.";
		                // $errorUploadType .= $_FILES['file']['name'][$key].' | '; 
		            } 
		        }  
		        store_files($storeFilesBasename, $new_id);
		        
		    }else{ 
		        
		        $errors = 'Please select a file to upload.'; 
		    }

		    // File upload configuration 
		    

    } 
}else{
    $notary = new Notary;
}
?>
<?php include('header.php') ?>
<section class="container <?php echo $form;?>">
    <div class="ptb-100">
    	<div style="height: 50px" class=""></div>
        <div class="row ">
            <div class="col-md-12 col-lg-12">
                <!-- <img src="img/about-image.png" alt="about us" class="img-fluid mx-auto w-50"> -->
                <div class="about-content-left section-heading">
                	
                    <h1 style="font-family: 'Poppins'; font-weight: 700; font-size: 32px; line-height: 41.6px; ">Become An Online Notary Public</h1>

                    <div class="single-feature mb-4">
                        <div class="icon-box-wrap d-flex align-items-center mb-2">
                            <p class="mb-0">
                                I declare that the information and details furnished in this form and in any documents provided are, to the best of my knowledge and belief, factually correct and true.
		                        <br>
		                        <br>
								I understand that in the event any information or statement is found untrue/false/incorrect or I do not satisfy the eligibility criteria, my application will be cancelled/terminated, without assigning any reasons thereof.
								<br>
		                        <br>
								I understand that by filling and submitting this form, it means that I am willing to undergo online training to be an Online Notary Public. 

								I hereby agree that in no event shall ToNote be liable for any special, direct, indirect, exemplary or consequential damages arising from the notarisation of documents/use of our services.
                            </p>
                        </div>
                    </div>
                    
                    <div class="single-feature mb-4">
                        <div class="icon-box-wrap mb-2">
                        </div>
                        <p></p>
                    </div>

                </div>
            </div>

            <div class="col-md-12 col-lg-12">
            	<?php if(!empty($errors)){ ?>
            		<h3 class="text-danger text-center"><?php echo $errors; ?></h3>
            	<?php } ?>
		        <form id="form" class="demo-form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
		        	<div class="statusMsg"></div>
				  	<div class="d-none justify-content-between steps border-bottom ">
					  	<?php $sn = 1; for ($i=0; $i < count($list); $i++) { ?>
					  		<li class=" step <?php echo $i == 0 ? "active" : "" ?>">
					        	<div class="text-center">
					        		<span class="circle"><?php echo $sn++ ?></span>
					        	</div>
					        	<div class="step-title"><?php echo $list[$i] ?></div>
					        </li>
					  	<?php } ?>
				  	</div>

					  <div class="row">
						  	<div class="col-md-12 my-2">
						  		<h5 class=""><?php echo $list[0] ?></h5>
								<!-- <p>Can we meet you ?</p> -->
						  	</div>
						    <div class="col-md-12">
			                    <label for="email">Email</label>
			                    <input type="email" id="email" value="<?php echo h($notary->email) ?? "" ; ?>" name="email" required class="form-control border-secondary">
			                </div>
			                <div class="col-6 my-2">
			                    <label for="firstname">Firstname</label>
			                    <input type="text" id="firstname" value="<?php echo h($notary->firstname) ?? "" ; ?>" name="firstname" required class="form-control border-secondary">
			                </div>
			                <div class="col-6 my-2">
			                    <label for="lastname">Lastname</label>
			                    <input type="text" id="lastname" name="lastname" value="<?php echo h($notary->lastname) ?? "" ; ?>" required class="form-control border-secondary">
			                </div>
			                 <div class="col-md-12 my-2">
			                    <label for="phone">Phone Number</label>
			                    <input type="text" id="phone" name="phone" value="<?php echo h($notary->phone) ?? "" ; ?>" required class="form-control border-secondary">
			                </div>
			                
					  <!-- </div>

					  <div class="row">
					  	<div class="col-md-12">
					  		<h5 class="">Personal Information</h5>
							<p>Tell us more ?</p>
					  	</div>
					  	 -->
						<div class="col-6 my-2">
							<label>Date of Birth</label>
							<input type="date" name="dob" value="<?php echo h($notary->dob) ?? "" ; ?>" required class="form-control  border-secondary">
						</div>

						<div class="col-6 my-2">
							<label>Gender</label>
							<select required class="form-control  border-secondary" name="gender">
								<option value="">Select Gender</option>
		                        <?php foreach (Notary::GENDER as $key => $value) { ?>
		                        	<option value="<?php echo $key ?>" <?php $value == $notary->gender ? "selected": ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
							</select>
						</div>

						<div class="col-md-12 my-2">
							<label for="business_address">Business Address</label>
							<input type="text" name="business_address" value="<?php echo h($notary->business_address) ?? "" ; ?>" required class="form-control  border-secondary">
						</div>

						<div class="col-md-12 my-2">
		                    <label for="language">Languages Spoken</label>
		                    <select required class="form-control  border-secondary" name="language" id="language">
		                    	<?php foreach (Notary::LANGUAGE as $key => $value) { ?>
		                        	<option value="<?php echo $value ?>" <?php $value == $notary->language ? "selected": ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
		                    </select>
		                </div>
					  </div>

					  <div class="row">
					  		

					  	<div class="col-md-12 my-2">
					  		<h5 class="">Your Identification</h5>

					  	</div>
					  	<div class="col-md-6">
		                    <label for="name">Identification Type </label> 
		                    <p style="font-size: 10px;">Government Issued ID card</p>
		                    <select name="id_type" required class="form-control  my-3 border-secondary"> 
		                        <option value="" selected>Select ID type</option>
		                        <?php foreach (Notary::ID_TYPE as $key => $value) { ?>
		                        	<option value="<?php echo $value ?>" <?php $value == $notary->id_type ? "selected": ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
		                       
		                    </select>
		                </div>
		                <div class="col-md-6">
		                    <label for="name">Identification Number </label> 
		                    <p style="font-size: 10px;">for preferred mode of identification</p>
		                    <input type="text" name="id_number" value="<?php echo h($notary->id_number) ?? "" ; ?>" required class="form-control my-3 border-secondary" placeholder="123456789">
		                </div>

		                <div class="col-md-12 my-2">
						  	<label for="id_card_image">Upload Selected Means of Identification <sup class="text-danger">*</sup></label>
						  	<div class="fileUpload">
		                    	<input type="file"  
					            class="upload" 
						  		required 
					            name="file[id_card_image]" 
					            id="id_card_image"
					            accept="image/x-png,image/gif,image/jpeg"
					            onchange="loadFile(event)"
					             />
					            <div class="textWrap d-flex justify-content-between">
					            	<div>
						                <span><AddPhotoAlternateIcon color="primary"/> </span>
						                <span class="px-1"> 
						                    <div class="textHeader">Upload Photo</div>
						                    <div class="textInfo">Please use: PNG, JPG OR JPEG</div>
						                </span>
						            </div>
						            <div>
						            	<img id="card_dis" src="#" alt="" height="50" />
						            </div>
					            </div>
					         </div>
						</div>

					  </div>
					  <div class="row">
					  	<div class="col-md-12 my-2">
					  		<h5 class="">Your Next of Kin</h5>
					  	</div>
					  	<div class="col-md-6 my-2">
					  		<label>Next of Kin Name</label>
					  		<input type="text" name="kin_fullname" value="<?php echo h($notary->kin_fullname) ?? "" ; ?>" required class="form-control border-secondary">
					  	</div>
					  	<div class="col-md-6 my-2">
					  		<label>Next of Kin Phone Number</label>
					  		<input type="text" name="kin_phone" value="<?php echo h($notary->kin_phone) ?? "" ; ?>" required class="form-control border-secondary">
					  	</div>

					  	<div class="col-md-6 my-2">
					  		<label>Next of Kin Email Address</label>
					  		<input type="text" name="kin_email" value="<?php echo h($notary->kin_email) ?? "" ; ?>" required class="form-control border-secondary">
					  	</div>
					  	<div class="col-md-6 my-2">
					  		<label>Next of Kin Relationship to you</label>
					  		<input type="text" name="relationship_to_kin" value="<?php echo h($notary->relationship_to_kin) ?? "" ; ?>" required class="form-control border-secondary">
					  	</div>

					  </div>

					  <div class="row">
					  	<div class="col-md-12 my-2">
					  		<h5 class="">Your membership Status </h5>
					  	</div>

					  	<div class="col-md-12 my-2">
		                	<label for="">Are you a member of the Nigerian Association of Notaries ?</label>
		                	<select required class="form-control  border-secondary"  name="member">
		                		<option value="">Select</option>
		                		<?php foreach (Notary::MEMEBER as $key => $value) { ?>
		                        	<option value="<?php echo $value ?>" <?php $value == $notary->member ? "selected": ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
		                	</select>
		                </div>
		                <div class="col-md-12 my-2">
		                	<label for="">If 'No', Would you like to become a member ?</label>
		                	<select required class="form-control  border-secondary"  name="like_to_be">
		                		<option value="">Select</option>
		                		 <?php foreach (Notary::LIKE_TO_BE as $key => $value) { ?>
		                        	<option value="<?php echo $value ?>" <?php $value == $notary->like_to_be ? "selected": ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
		                	</select>
		                </div>

					  </div>
					  <div class="row">
					  	
		                <div class="col-md-12 my-2">
					  		<h5 class="">Your Credentials</h5>
					  		<p>Kindly upload your Credentials</p>

					  	</div>
		                
			            
			            <div class="col-md-12 my-2">
						  	<label for="photo">Upload a clear passport-style picture of your face (No glasses or face caps) <sup class="text-danger">*</sup></label>
						  	<div class="fileUpload">
						  		<input 
						  			type="file" 
						  			class="upload" 
						  			required 
						  			onchange="loadFile(event)"
						  			id="photo" 
						  			name="file[photo]" 
						  			multiple accept="image/x-png,image/gif,image/jpeg" />
					            <div class="textWrap d-flex justify-content-between">
					            	<div>
						                <span><AddPhotoAlternateIcon color="primary"/> </span>
						                <span class="px-1"> 
						                    <div class="textHeader">Upload Photo</div>
						                    <div class="textInfo">Please use: PNG, JPG OR JPEG</div>
						                </span>
						            </div>
						            <div class="he">
						            	<img id="photo_dis" src="#" alt="" height="50" />
						            </div>
					            </div>
					         </div>
						</div>
				  	   <div class="col-md-12 my-2">
				  		 <label for="notary_certificate">Notary Certificate OR Sworn Oath of Office Document </label>
					  		<div class="fileUpload">
		                    	<input type="file" 
					            class="upload" 
						  			required 
					            onchange="loadFile(event)"
					            name="file[notary_certificate]"
					            id="notary_certificate"
					             />
					            <div class="textWrap d-flex justify-content-between">
					            	<div>
						                <span><AddPhotoAlternateIcon color="primary"/> </span>
						                <span class="px-1"> 
						                    <div class="textHeader">Upload Document</div>
						                    <div class="textInfo">Please use: PDF, PNG, JPG OR JPEG</div>
						                </span>
						            </div>
						            <div>
						            	<img id="cert_dis" src="#" alt="" height="50" />
						            </div>
					            </div>
					         </div>
					   </div>

							<div class="col-md-12 my-2">
								Terms & Conditions
								By submitting this form, I hereby agree to all the terms therein. I willingly and freely share my data on the understanding that it will not be shared with any third party without my consent. I acknowledge my right to waive answers to questions that are not highlighted as mandatory within the form.
							</div>
					  </div>
					  <div class="mb-4"></div>
					  <div class="form-navigation pt-3 border-top">
					  	<div class="d-flex justify-content-between">
					  		<div class="">
					  			<!-- <button type="button" class="previous btn outline-btn">&lt; Previous</button> -->
					  		</div>
					  		<div class="">
					  			<button type="submit" id="sub" class="btn submitBtn solid-btn">submit</button>
					  			<!-- <button type="button" class="next btn solid-btn">Save & Continue &gt;</button> -->
					    		
					  		</div>
					  	</div>
					  </div>

					</form>
            </div>
        </div>
    </div>
</section>

<section class="container <?php echo $success; ?>">
	<div class="ptb-100">
		<div style="height: 50vh;" class="d-flex align-items-center  justify-content-center row">
			<div class="text-center col-6 p-4" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
				<h1>THANK YOU!</h1>
    			<div class="text-center"><img height="70" class="fa fa-check text-success" id="checkmark" src="img/check-mark.png" /></div>
    			<p>Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.</p>
			</div>
		</div>
	</div>
</section>	


<?php include('footer.php') ?>
<script src='https://code.jquery.com/jquery-2.1.3.js'></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script> 
<script type="text/javascript">
	// var id = '';
	// var loadFile = function(event) {
	//    if (event.target.id == "photo") {
	//    	 id = 'photo_dis'
	//    }else if(event.target.id == "id_card_image") {
	//    	 id = 'card_dis';
	//    }else{
	//    	 id = 'cert_dis'
	//    }
	//     var output = document.getElementById(id);
	//     output.src = URL.createObjectURL(event.target.files[0]);
	//     output.onload = function() {
	//       URL.revokeObjectURL(output.src) // free memory
	//     }
	//   };
$("#form").on('submit', function(e){
	e.preventDefault();
	// successAlert("success")
	$.ajax({
        type: 'POST',
        url: 'submit.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            // $('.submitBtn').attr("disabled","disabled");
            // $('#form').css("opacity",".5");
        },
        success: function(response){ //console.log(response);
            $('.statusMsg').html('');
            if(response.status == 1){
                $('#form')[0].reset();
                $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
            }else{
                $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
            }
            $('#form').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
        }
    });
	
});
</script>
<!-- <script type="text/javascript" src="js/request.js"></script> -->

