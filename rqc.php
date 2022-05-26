<?php 
require_once('private/initialize.php'); 

	$request = $_GET['r'] ?? "";

	if ($request == 1) {
		$request_type = "Affidavit of SIM Card Loss";
	}
	else if($request == 2){
		$request_type = "Affidavit of Name Change";
	}else if($request == 3){
		$request_type = "Affidavit of Proof of Ownership";
	}else if($request == 4){
		$request_type = "Sworn Declaration of Age";
	}else if($request == 5){
		$request_type = "Certified True Copy of Title Deed";
	}else if($request == 6){
		$request_type = "Certified True Copy of Utility Bill";
	}else if($request == 7){
		$request_type = "Real Estate Transaction Closing";
	}else if($request == 8){
		$request_type = "Loan and Mortgage documents";
	}
?>
<?php 
if (is_post_request()) {
	$args = $_POST;     
	$request = new Request($args);
    // Insert into database
    $result = $request->save();

    if($result === true) {
    	    $new_id = $request->id;
    	    $request = Request::find_by_id($new_id);
    	    
    	    // File upload configuration 
		    $targetDir = "inc/uploads/request/"; 
		    // $targetDir = url_for('images/uploaded/'); 
		    $allowTypes = array('jpg','png','jpeg','pdf'); 
		     
		    // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
		    $rand = rand(10, 100);
		    $fileNames = array_filter($_FILES['file']['name']); 
		    
		    $arr2 = Notary::uploadFile($targetDir, $fileNames, $allowTypes);
		    if (!empty($arr2)) {
				$data = [
					'documents' => $arr2,
				];
				$request->merge_attributes($data);
				$saveFilename = $request->save();
				
				if ($saveFilename == true) {
					
					

				}
			}

    } 
}else{
    $request = new Request;
    // $request = Request::find_by_id(1);
}

include ('header.php');

 ?>
<style type="text/css">
	.loader {
	    display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}
</style>
<div><?php //echo display_session_message(); ?></div>
<div class="loader modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div class="modal-body text-center">
            	<div><img src="img/fav.png" height="100" alt="loader" /></div>
                <p class="m-0">Processing...</p>
            </div>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div>

	
<div class="container" id="main">
	<div class="row d-flex justify-content-center px-4">
		<div class="ptb-100 col-md-12 col-lg-9 col-12">
			<div class="mt-4">
				<?php if (!empty($request_type)) {?>
		        <h3>Request for <span id="myTrans"><?php echo $request_type ?? "Title goes here" ?></span></h3>
		        <?php }else{ ?>
		        	<h3>Request a Notary Session</h3>
		        <?php } ?>
		        <p>Fill the form below to complete your request. <br />Alternatively you can contact or whatsapp us at <a href="#">+2348146507035</a></p>
		    </div>
			<form  id="form" class="validation" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				
	            <div class="row">

	                <div class="col-md-12  my-2">
	                	<?php if (!empty($request_type)) {?>
	                		<input type="hidden" id="trans_type" class="form-control" value="<?php echo $request_type ?>" name="trans_type">
	                	<?php }else{ ?>
	                		 <label for="trans_type">Service Type</label>
	                		<input type="text" id="trans_type" class="form-control border-secondary" value="<?php echo h($request->trans_type) ?>" name="trans_type">
	                	<?php } ?>
	                </div>
	                <div class="col-md-6 my-2">
	                    <label for="email">Email</label>
	                    <input type="text" required id="email" name="email" value="<?php echo h($request->email) ?>" class="form-control border-secondary">
	                </div>
	                <div class="col-md-6 my-2">
	                    <label for="firstname">Firstname</label>
	                    <input type="text" required id="firstname" name="firstname" value="<?php echo h($request->firstname) ?>" class="form-control border-secondary">
	                </div>
	                <div class="col-md-6 my-2">
	                    <label for="lastname">Lastname</label>
	                    <input type="text" required id="lastname" name="lastname" value="<?php echo h($request->lastname) ?>" class="form-control border-secondary">
	                </div>
	                
	                <div class="col-md-6 my-2">
	                    <label for="phone">Phone Number</label>
	                    <input type="text" required id="phone" name="phone" value="<?php echo h($request->phone) ?>" class="form-control border-secondary">
	                </div>
	            </div>
	            <div class=" row"> 
	                <div class="col-md-6">
	                    <label for="name">Identification Type </label> 
	                    <p style="font-size: 10px;">Government Issued ID card</p>
	                    <select name="id_type" class="form-control my-3 border-secondary"> 
	                        <option value="">Select ID type</option>
		                        <?php foreach (Notary::ID_TYPE as $key => $value) { ?>
		                        	<option value="<?php echo $value ?>" <?php echo $value == $request->id_type ? "selected" : ""  ?>  ><?php echo $value ?></option>
		                        <?php } ?>
	                    </select>
	                </div>
	                <div class="col-md-6">
	                    <label for="name">Identification Number </label> 
	                    <p style="font-size: 10px;">for preferred mode of identification</p>
	                    <input type="text" name="id_number" value="<?php echo h($request->id_number) ?>" class="form-control my-3 border-secondary" placeholder="123456789">
	                </div>
	                <div class="col-md-12 my-5">
					  	<label for="id_card_image">Upload Selected Means of Identification </label>
					  	<div class="fileUpload">
	                    	<input type="file" required 
				            class="upload" 

				            name="file[id_card_image]" id="id_card_image"
				            accept="image/x-png,image/jpeg, image/jpg" /

				             />
				            <div class="textWrap">
				                <span><AddPhotoAlternateIcon color="primary"/> </span>
				                <div class="px-1"> 
				                    <div class="textHeader d-flex justify-content-between">
				                    	<span>Upload Photo</span>
				                    	<span id="card_dis"></span>
				                    </div>
				                    <div class="textInfo">Please use: PNG, JPG OR JPEG</div>
				                </div>
				            </div>
				         </div>
					</div>

	                <div class="col-md-6">
	                    <label for="name">Date of Birth</label> 
	                    <input type="date" name="dob" value="<?php echo h($request->dob) ?>" class="form-control my-3 border-secondary"> 
	                </div>
	                <div class="col-md-6">
	                    <label for="name">Nationality</label> 

	                    <input type="text" name="nationality" value="<?php echo h($request->nationality) ?>" class="form-control my-3 border-secondary"> 
	                </div>

	                <div class="col-md-12">
	                	<label>How do you want your document delivered ?</label>
	                	<select class="form-control y-3 border-secondary" name="delivery_option" id="delivery_option" required="">
	                		<option value="">Select Delivery Option</option>
	                		<option value="softcopy">Softcopy(Via Email)</option>
	                		<option value="hardcopy">Hardcopy(To you address)</option>
	                		<option value="pickup">Pickup</option>
	                	</select>
	                </div>
	                <div class="col-md-12 mt-3 d-none delivery_address">
	                	<label>Delivery Address (This is where your notarised documents will be dispatched to) </label>
	                	<input type="text" name="delivery_address" id="delivery_address" class="form-control border-secondary my-3">
	                </div>
	                <div class="col-md-12 my-5">
	                    <label for="photo">Upload a clear passport-style picture of your face (No glasses or face caps) </label> 
	                    <div class="fileUpload">
				            <input type="file" 
				            class="upload" 
				            accept="image/x-png,image/jpeg, image/jpg" 
				            required="" 
				            id="photo" name="file[photo]" />
				            <div class="textWrap">
				                <span><AddPhotoAlternateIcon color="primary"/> </span>
				                <div class="px-1"> 
				                    <div class="textHeader d-flex justify-content-between">
				                    	<span>Upload Photo</span>
				                    	<span class="" id="photo_dis"></span>
				                    </div>
				                    <div class="textInfo">Please use: PNG, JPG OR JPEG</div>
				                </div>
				            </div>
				        </div>
	                </div>
	                <div class="col-md-12 my-3">
	                    <label for="document">DOCUMENT(S) TO BE NOTARISED </label> 
	                    <div class="fileUpload">
	                    	<input type="file" 
				            class="upload" 
				            required="" 
				            name="file[document]" 
				            multiple="" 
				            accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"
				            id="document" />
				            <div class="textWrap">
					                <!-- <span><AddPhotoAlternateIcon color="primary"/> </span> -->
				                <div class="px-1"> 
				                    <div class="textHeader d-flex justify-content-between">
				                    	<span>Upload Document</span> <span id="cert_dis"></span>
				                    </div>
				                    <div class="textInfo">Please use: PDF, DOC, DOCX, PNG, JPG OR JPEG</div>
				                </div>
				            </div>
				         </div>
	                </div>

	            </div>

	            <div class="col-12 p-0">
	                <button type="submit" id="Submit" class="btn btn-primary py-3 form-control">Submit</button>
	            </div>
	        </form>
		</div>
	</div>
</div>

<section class="container d-none" id="message" >

	<div class="ptb-100 py-4">
		<div style="height: 80vh;" class="d-flex align-items-center  justify-content-center row">
			<div class="text-center col-6 p-4" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
				<h2>Sent!</h2>
    			<div class="text-center"><img height="100" class="fa fa-check text-success" id="checkmark" 
    				src="app/assets/images/logo_sm.png" /></div>
    			<p>Your request is received. A member of our team will reach out to you shortly</p>
			  <!-- <a href="index.php#solutions" class="btn outline-btn"><< Return to Home </a>   -->
			<button id="back" class="btn outline-btn"><< Go back </button>
			</div>
		</div>
	</div>
</section>	

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<?php include('footer.php') ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	
	$(document).on('change', '.upload', function (event) {
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg', 'pdf', 'doc', 'docx']) == -1) {
		    errorAlert('invalid file type!');
		}else{
			  var id = '';
			// var loadFile = function(event) {
			   if (event.target.id == "photo") {
			   	 id = 'photo_dis'
			   }else if(event.target.id == "id_card_image") {
			   	 id = 'card_dis';
			   }else{
			   	 id = 'cert_dis'
			   }
			    var output = document.getElementById(id);
			    var filename = event.target.files[0]['name'];
			    output.innerHTML = filename;
			   
		  }
	});
	// $(document).on('mousedown', '.email', function (event) {
	// 	console.log('')
	// });
	

	$(document).on('change', '#delivery_option', function () {
		var selected = $(this).find(":selected").val();
		console.log(selected);
		if (selected == 'hardcopy') {
			$(".delivery_address").removeClass("d-none");
			$("#delivery_address").prop('required',true);
		}else{
			$(".delivery_address").addClass("d-none");
			$("#delivery_address").prop('required',false)
		}
	} )
	// $('form[id="form"]').validate({
	// 	submitHandler: function (form) {
	// 		// $(".loader").css("display", 'block');
	// 		// form.submit();

	// 		var formData = new FormData(this);    

	// 	    $.post($(this).attr("action"), formData, function(data) {
	// 	        alert(data);
	// 	    });
			
	// 	}
	// });

	$(document).on('click', '#back', function (event) {
		$("#message").addClass('d-none');
    	$("#main").removeClass('d-none');
    });
	$("#form").submit(function(e) {
	    e.preventDefault();
	    $(".loader").show();
	    var formData = new FormData(this);
	    var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var trans_type = $('#myTrans').html();

	    $.ajax({
	        url: 'inc/process_request.php',
	        type: 'POST',
	        data: formData,
	        dataType: "json",
	        cache: false,
	        contentType: false,
	        processData: false,
	     //       beforeSend: function(){
			   //   $(".loader").show();
			   // },
			   // complete: function(){
			   //   $(".loader").hide();
			   // },
	        success: function (r) {
	            if (r.success == true) {
                    // successTime(r.msg);
                    $("#main").addClass('d-none');
                    $("#message").removeClass('d-none');
                    $(".loader").hide();
                    // var req_no = r.req_no;
                    // RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no)
     //                $( '#form' ).each(function(){
					    // this.reset();
					// });
					// $("form").trigger("reset");
                }else{
                    errorAlert(r.msg)
                }
	        }
	    });
	});

	function RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no){
        $.ajax({
            url: 'app/processor/RequestSuccessMail.php',
            method:"POST",
            data: {
                RequestSuccessMail: 1,
                firstname: firstname,
                lastname: lastname, 
                email: email,
                phone: phone,
            },
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                	RequestNoticeMail(firstname, lastname, email, phone, trans_type, req_no)
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
    function RequestNoticeMail(firstname, lastname, email, phone, trans_type, req_no){
        $.ajax({
            url: 'app/processor/RequestNoticeMail.php',
            method:"POST",
            data: {
                RequestNoticeMail: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
                trans_type: trans_type,
                req_no: req_no,
            },
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                	 successTime(data.msg);
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }

	
	
</script>