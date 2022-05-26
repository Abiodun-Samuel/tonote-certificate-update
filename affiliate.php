<?php require_once('private/initialize.php'); 

$agent_id = $_GET['id'] ?? '';
$new = $_GET['new'] ?? 0;

include('header1.php'); ?>

<style type="text/css">
.header__text, .header__text--black {
	font-size: 3rem;
	line-height: 7.2rem;
	font-weight: 900;
	color: #000;
	/*text-align: center;*/
}


.header {
    /*margin-top: 1rem;*/
    margin-bottom: 5rem;
    width: 100%;
    /*min-height: 64rem;*/
}

.get-quote__button {
    width: 20rem;
}
.button_primary, .button_primary--full-width {
    border: 0;
    background-color: #063bb3;
    color: #fff;
}

.button, .card-body .ml-auto a {
    padding: 1.5rem;
    cursor: pointer;
    font-weight: 800;
    border-radius: 4px;
    font-size: 1.6rem;
    line-height: 2.4rem;
    margin-top: 2rem;
}



</style>
<div class="main">

    <!--hero section start-->
    <section class="hero-section ptb-20"
             style="">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="page-header-content header">

                        <h1 class=" mb-0 header__text">Refer and earn</h1>
                        <?php if ($agent_id != '' && $new == 1) { ?>
                          <div class="alert alert-success animated flash"> Signed Up successfully</div>
                        <?php } ?>
                        	<div class="alert alert-primary animate fade-in" style="display: ;">

							 	<p>
			                		Refer friends, colleagues and family to use our platform to swear affidavits or notarise a document.
			                	</p>

							    <p>
			                    	You can add up to 100 e-mail addresses of the people you want to refer. Separate each email with a comma.
			                    </p>

			                	<p>
			                		<b>Use the format: </b>
									yourname@gmail.com,yourname@yahoo.com,yourname@hotmail.com
			                	</p>

			                	<div class="form-group">
			                    	<label>Enter Emails<sup>*</sup></label>
			                         <input type="text" class="form-control" name="email" id="email" placeholder="yourname@gmail.com,yourname@yahoo.com,yourname@hotmail.com" required="required"> 
			                        <!--<textarea class="form-control" style="min-height: 153px" name="email" id="email" placeholder="john@yourdomain.com, doe@yourdomain.com" required="required"></textarea>-->
			                    </div>


			                    <div class="form-group d-none">
			                    	<div style="font-weight: bold;">Message:</div>
			                    	<div>
<textarea class="form-control" id="textarea" style="min-height: 153px" readonly>
Hey,

I needed to notarise a document and swear an affidavit. I came across a platform that allowed me to connect with a notary and do it all virtually. I didn’t even have to get out of bed. 

It’s called ToNote and I think you should try it out.

Sign up on the platform for free using my link 

www.gettonote.com?id=<?php echo $agent_id ?>

You never know when you will need a notary.

Have a great day.
					                    		
</textarea>
				                    </div>
				                </div>

				               
			                    <div class="">

			                    	<button class="btn btn-primary form-control mr-2" id="sendEmail">Submit referal</button>
				                </div>
			                </div>

			                  <div class="text-center">
			                  	<button class="btn   mx-3 px-3" style="border-radius: 100px;">Or</button>
			                  </div>

							  <div class="d-flex justify-content-end" role="group" aria-label="First group">
							    <button type="button" class="btn btn-primary form-control" id="copy_to">Share a link</button>
							  </div>

                              <div class="text-center mt-3"><a href="terms_of_earning.php">Terms & condition</a></div>

			               


                            

					       <!--  <div style="display:inline-block; vertical-align:top;">
							  <button class="js-copy-bob-btn">Set clipboard to BOB</button><br /><br />
							  <button class="js-copy-jane-btn">Set clipboard to JANE</button>
							</div>
							<div style="display:inline-block;">
							  <textarea class="js-test-textarea" cols="35" rows="4">Try pasting into here to see what you have on your clipboard:

							  </textarea>
							</div> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="getStartedModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Refer & Earn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container p-3">
        <h3 id="display_title"></h3>
        <p>Fill in  the form to proceed.</p>
        <form id="form">
             
                <div class="">
                    <div>
                    	You can add up to 100 e-mail addresses of the people you want to refer. Separate each email with a semi-colon.
                    </div>

                
                    <div class="form-group">
                    	<label>Enter Emails<sup>*</sup></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="john@yourdomain.com, doe@yourdomain.com" required="required">
                    </div>
                
                </div>

            <div class=" my-2 p-0">
                <button type="submit" id="Submit" class="btn btn-primary w-100 py-3">Proceed to referral</button>
            </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>


<?php include('footer.php') ?>
<input type="hidden" id="agent_id" value="<?php echo $agent_id ?>">
<script type="text/javascript">
	var agent_id = $('#agent_id').val();
	$(document).on("click", '#copy_to', function(e) {
		e.preventDefault();
		var textArea = $('#textarea').val();
		// alert(textArea);
		copyTextToClipboard(textArea)
		confirmAlert('Link copied to clipboard', 'You can now share with anyone via any platform.');
	})

	$(document).on("click", '#sendEmail', function(e) {
		var email = $('#email').val();
		$.ajax({
            url: 'inc/sendReferalEmail.php',
            method:"POST",
            data: {
            	email: email,
            	agent_id: agent_id
            },
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    confirmAlert('Awesome', 'Submitted successfully');

                    // notification_mail(firstname, lastname, email, phone, trans_type);
                    var req_no = r.req_no;
                    RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no)
                }else{
                    errorAlert("Error not sent")
                }
               // 
            }
        })

	})

	function fallbackCopyTextToClipboard(text) {
	  var textArea = document.createElement("textarea");
	  textArea.value = text;
	  
	  // Avoid scrolling to bottom
	  textArea.style.top = "0";
	  textArea.style.left = "0";
	  textArea.style.position = "fixed";

	  document.body.appendChild(textArea);
	  textArea.focus();
	  textArea.select();

	  try {
	    var successful = document.execCommand('copy');
	    var msg = successful ? 'successful' : 'unsuccessful';
	    console.log('Fallback: Copying text command was ' + msg);
	  } catch (err) {
	    console.error('Fallback: Oops, unable to copy', err);
	  }

	  document.body.removeChild(textArea);
	}
	function copyTextToClipboard(text) {
	  if (!navigator.clipboard) {
	    fallbackCopyTextToClipboard(text);
	    return;
	  }
	  navigator.clipboard.writeText(text).then(function() {
	    // alert('Async: Copying to clipboard was successful!');
	  }, function(err) {
	    alert('Async: Could not copy text: ', err);
	  });
	}

	var copyBobBtn = document.querySelector('.js-copy-bob-btn'),
	  copyJaneBtn = document.querySelector('.js-copy-jane-btn');

	copyBobBtn.addEventListener('click', function(event) {
	  copyTextToClipboard('Bob');
	});


	copyJaneBtn.addEventListener('click', function(event) {
	  copyTextToClipboard('Jane');
	});

</script>