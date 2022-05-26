<?php 
require_once('private/initialize.php'); 
include ('header.php');
$request = new Request;
?>
<style type="text/css">
	.nav li {
		padding: 10px;

	}
	.nav li .active{
		border-bottom:  1px solid darkblue;
		color: #000;
	}
	.nav li a{
		color: #aaa;
		padding: 10px;
	}
</style>
<div><?php //echo display_session_message(); ?></div>
<div class=" modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
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
				<h3>Get Sworn Affidavits and Notarise Documents Virtually!</h3>
		        <div>
		        	<div>Welcome to ToNote. Please fill in the information below to proceed.</div>
		        	<p>I declare that the information and details provided in this form and in any documents provided are, to the best of my knowledge and belief, factually correct and true.</p>

					<p>I understand that in the event any information or statement is found untrue/false/incorrect, my request might be cancelled, without assigning any reasons thereof.</p>

					<p>I hereby agree that in no event shall ToNote be liable for any special, direct, indirect, exemplary or consequential damages arising from the notarisation of documents/use of our services.</p>
		        </div>
		    </div>
		    <div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" >
			    	<a href="#business"  class="active" aria-controls="business" role="tab" data-toggle="tab">Business User</a></li>
			    <li role="presentation"><a href="#individual" aria-controls="individual" role="tab" data-toggle="tab">Individual User</a></li>
			    
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="business">
			    	<form  id="form" class="validation" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			           <div class="row">
			                <div class="col-md-6 my-2">
			                    <label for="company_name">Company Name</label>
			                    <input type="text" required id="company_name" name="company_name"  class="form-control border-secondary">
			                </div>
			                <div class="col-md-6 my-2">
			                    <label for="rc_number">RC. number if available</label>
			                    <input type="text" id="rc_number" name="rc_number"  class="form-control border-secondary">
			                </div>
			                
			                <div class="col-md-12 my-2">
			                    <label for="email">Company Address</label>
			                    <input type="text" required id="company_address" name="company_address" class="form-control border-secondary">
			                </div>

			                <div class="col-md-6 my-2">
			                    <label for="email">Email</label>
			                    <input type="text" required id="email" name="email"  class="form-control border-secondary">
			                </div>

			                <div class="col-md-6 my-2">
			                    <label for="phone">Phone Number</label>
			                    <input type="text" required id="phone" name="phone"  class="form-control border-secondary">
			                </div>

			                <div class="col-12 my-2">
				                <button type="submit" id="submit" class="btn btn-primary py-3 form-control">Submit</button>
				            </div>
			           </div>
			        </form>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="individual">
			    	<form  id="individualForm" class="validation" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				
			           <div class="row">
			           		
				           	
			                <div class="col-md-6 my-2">
			                    <label for="firstname">Firstname</label>
			                    <input type="text" required id="firstname" name="individual[firstname]"  class="form-control border-secondary">
			                </div>
			                <div class="col-md-6 my-2">
			                    <label for="lastname">lastname</label>
			                    <input type="text" id="lastname" name="individual[lastname]"  class="form-control border-secondary">
			                </div>

			                <div class="col-md-6 my-2">
			                    <label for="email">Email</label>
			                    <input type="text" required id="iemail" name="individual[email]"  class="form-control border-secondary">
			                </div>

			                <div class="col-md-6 my-2">
			                    <label for="phone">Phone Number</label>
			                    <input type="text" required id="iphone" name="individual[phone]"  class="form-control border-secondary">
			                </div>

			                <div class="col-12 my-2">
				                <button type="submit" id="submit" class="btn btn-primary py-3 form-control">Submit</button>
				            </div>
			           </div>
			        </form>
			    </div>
			  </div>

			</div>
			
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
    			<p>Thank you for providing your information. A member of our team will reach out to you shortly</p>
			  <!--<a href="index.php#solutions" class="btn outline-btn"><< Return to Home </a>  -->
			 <button id="back" class="btn outline-btn"><< Return to form </button> 
			</div>
		</div>
	</div>
</section>	

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<?php include('footer.php') ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	

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
	    $("#submit").attr("disabled", true);
	    var company_name = $("#company_name").val();
        var rc_number = $("#rc_number").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var trans_type = $('#trans_type').val();

	    $.ajax({
	        url: 'inc/process_business_user.php',
	        type: 'POST',
	        data: $('#form').serialize(),
	        dataType: "json",
	        success: function (r) {
	            if (r.success == true) {
                    // successTime(r.msg);
                    $("#main").addClass('d-none');
                    $("#message").removeClass('d-none');
                    var req_no = r.req_no;
                    BusinessSuccessMail(company_name, rc_number, email, phone)
					$("#form").trigger("reset");
					$("#submit").attr("disabled", false);
                }else{
                    errorAlert(r.msg);
                    $("#submit").attr("disabled", false);
                }
	        }
	    });
	});

	function BusinessSuccessMail(company_name, rc_number, email, phone){
        $.ajax({
            url: 'app/processor/BusinessSuccessMail.php',
            method:"POST",
            data: {
                BusinessSuccessMail: 1,
                company_name: company_name,
                rc_number: rc_number,
                email: email,
                phone: phone,
            },
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                	BusinessNoticeMail(company_name, rc_number, email, phone)
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
    function BusinessNoticeMail(company_name, rc_number, email, phone){
        $.ajax({
            url: 'app/processor/BusinessNoticeMail.php',
            method:"POST",
            data: {
                BusinessNoticeMail: 1,
                company_name: company_name,
                rc_number: rc_number,
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