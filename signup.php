<?php 
require_once('private/initialize.php'); 
$list = ['Personal Information','Next of Kin Details', 'Membership Status', 'Credentials'];
?>
<?php include('header.php') ?>
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
<section class="container " id="main">
    <div class="ptb-100">
    	<div style="height: 50px" class=""></div>
        <div class="row ">
            <div class="col-md-5 col-lg-5  d-none d-lg-block">
                <img src="img/about-image.png" alt="about us" class="img-fluid mx-auto w-50">
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

            <div class="col-md-12 col-lg-7 border-left border-primary d-flex align-items-center">
		        <form  id="signupForm"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
		        	
				  

					  <div class=" row">
						  	<div class="col-md-12 my-4 ">
						  		<h5 class=" border-bottom"><?php echo $list[0] ?></h5>
								<h6>Let's start with your personal details ?</h6>
								<div id="display_error"></div>
						  	</div>
						    <div class="col-md-6">
			                    <label for="email">Email</label>
			                    <input type="email" required id="email" name="personal[email]" class="form-control border-secondary">
			                </div>
			                <div class="col-md-6">
			                    <label for="email">Supreme Court No.</label>
			                    <input type="text" required id="supreme_court_no" name="personal[supreme_court_no]" class="form-control border-secondary">
			                </div>
			                <div class="col-6 my-2">
			                    <label for="firstname">Firstname</label>
			                    <input type="text" required id="firstname" name="personal[firstname]" class="form-control border-secondary">
			                </div>
			                <div class="col-6 my-2">
			                    <label for="lastname">Lastname</label>
			                    <input type="text" required id="lastname" name="personal[lastname]" class="form-control border-secondary">
			                </div>
			                 <div class="col-md-6 my-2">
			                    <label for="phone">Phone Number</label>
			                    <input type="text" required id="phone" name="personal[phone]" class="form-control border-secondary">
			                </div>
			                <div class="col-6 my-2">
							<label>Gender</label>
							<select class="form-control  border-secondary" required name="personal[gender]">
								<option value="">Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="col-md-12 my-2">
							<label for="business_address">Business Address</label>
							<input type="text" required name="personal[business_address]" class="form-control  border-secondary">
						</div>

						

		                

					  </div>

					  
					  <div class=" row">
					  	
		                
				  	   

						<div class="col-md-12 my-2">
							<hr>
							Terms & Conditions
							By submitting this form, I hereby agree to all the terms therein. I willingly and freely share my data on the understanding that it will not be shared with any third party without my consent. I acknowledge my right to waive answers to questions that are not highlighted as mandatory within the form.
						</div>

					  </div>
					  <div class="mb-4"></div>
					  
					  <div class="d-flex justify-content-end">
					  	<button type="submit" id="submit" class="btn  solid-btn">submit</button>
					  </div>
					  <!-- <div class="form-navigation pt-3 border-top">
					  	<div class="d-flex justify-content-between">
					  		<div class="">
					  			<button type="button" class="previous btn outline-btn">&lt; Previous</button>
					  		</div>
					  		<div class=""> 
					  			<button type="submit" class="btn  solid-btn">submit</button>
					  			<button type="button" class="next btn solid-btn">Save & Continue &gt;</button>
					    		
					  		</div>
					  	</div>
					  </div> -->

					</form>
            </div>
        </div>
    </div>
</section>

<section class="container d-none" id="message" >
	<div class="ptb-100 py-4">
		<div style="height: 80vh;" class="d-flex align-items-center  justify-content-center row">
			<div class="text-center col-6 p-4" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
				<h2>SignUp Successful!</h2>
    			<div class="text-center"><img height="100" class="fa fa-check text-success" id="checkmark" 
    				src="app/assets/images/logo_sm.png" /></div>
    			<p>Thank you for completing this form. A member of our team will reach out to you 
shortly.</p>
			 <!-- <a href="index.php#solutions" class="btn outline-btn"><< Return </a>  -->
			<button id="back" class="btn outline-btn"><< Back to form </button>
			</div>
		</div>
	</div>
</section>		

<?php include('footer.php') ?>
<script src='https://code.jquery.com/jquery-2.1.3.js'></script>
<!-- <script src='https://rawgit.com/guillaumepotier/Parsley.js/2.2.0-rc4/dist/parsley.js'></script> -->
<!-- <script src="https://malsup.github.io/jquery.form.js"></script>  -->
<!-- <script type="text/javascript" src="js/request.js"></script> -->
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

	$(document).on('change', '#member', function () {
		var selected = $(this).find(":selected").val();
		console.log(selected);
		if (selected == 'no') {
			$(".like_to_be").removeClass("d-none");
			$("#like_to_be").prop('required',true);
		}else{
			$(".like_to_be").addClass("d-none");
			$("#like_to_be").prop('required',false)
		}
	} )

	$(document).on('click', '#back', function (event) {
		$("#message").addClass('d-none');
    	$("#main").removeClass('d-none');
    	location.reload();
    });
    
	$("#signupForm").submit(function(e) {
	    e.preventDefault();   
	    $("#submit").attr("disabled", true); 
	    var formData = new FormData(this);
	    var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();

	    $.ajax({
	        url: 'inc/process_signup.php',
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
                    $("#submit").attr("disabled", false);
                    SignupSuccessMail(firstname, lastname, email, phone)
					$("form").trigger("reset");

                }else{
                    errorAlert('error')
                    $("#display_error").html(r.msg);
                    $("#submit").attr("disabled", false);
                }
	        }
	    });
	});

	function SignupSuccessMail(firstname, lastname, email, phone ){
        $.ajax({
            url: 'app/processor/SignupSuccessMail.php',
            method:"POST",
            data: {
                SignupSuccessMail: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
            },
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                	SignupNoticeMail(firstname, lastname, email, phone )
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
    function SignupNoticeMail(firstname, lastname, email, phone ){
        $.ajax({
            url: 'app/processor/SignupNoticeMail.php',
            method:"POST",
            data: {
                SignupNoticeMail: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
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

