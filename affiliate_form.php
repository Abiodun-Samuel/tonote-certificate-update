<?php require_once('private/initialize.php'); include('header.php'); ?>

<style type="text/css">
.header__text, .header__text--black {
	font-size: 4rem;
	line-height: 7.2rem;
	font-weight: 900;
	color: #063bb3;
}


.header {
    margin-top: 1rem;
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

.common-title-text {
    font-family: 'Poppins';
    font-size: 2.4rem;
    line-height: 3.6rem;
    color: #212121;
}


</style>
<div class="main">

    <!--hero section start-->
    <section class="hero-section ptb-100"
             style="">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    

                    <div>
                    	<form method="POST" id="contactForm" class="contact-us-form" novalidate="novalidate">
                            <div class="text-center">
                                <h5 class="common-title-text">Let's get to know you</h5>
                                <p>NOTE: All fields are required.</p> 
                            </div>
                            <div class="contact-error"></div>
                           <div class="row">
                               <div class="col-sm-6 col-12">
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="name" id="cname" placeholder="Enter name" required="required">
                                   </div>
                               </div>
                               <div class="col-sm-6 col-12">
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="phone" id="cphone" placeholder="Phone Number" required="required">
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="cemail" placeholder="Enter email" required="required">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3 d-flex justify-content-center">
                                    <button type="submit" class="btn outline-btn" id="btnContactUs" style="opacity: 1;">
                                        SignUp
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

</div>
<?php include('footer.php') ?>

<script type="text/javascript">
	$("#getStarted").on("click", '' function(e) {
		// css('display')
	})
</script>s