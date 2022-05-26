<?php require_once('private/initialize.php'); include('header.php'); 

$ref = $_GET['ref'] ?? '';
?>
<link rel="stylesheet" type="text/css" href="css/popup.css">

    <!--hero section start-->
    <section class="hero-section hero-section-3 pt-8">
        <!--animated circle shape start-->
        <div class="circles">
            <div class="point animated-point-1"></div>
            <div class="point animated-point-2"></div>
            <div class="point animated-point-3"></div>
            <div class="point animated-point-4"></div>
            <div class="point animated-point-5"></div>
            <div class="point animated-point-6"></div>
        </div>
        <!--animated circle shape end-->
        <div class="container" id="animation-area-1">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="hero-content section-title text-center text-lg-left my-5 mt-lg-0">

                        <h2 class="font-weight-bold pt-100">
                            
                            <div class="my-3"></div>
                            Notarise a document or get an affidavit now!
                        </h2>
                        
                        <p class="lead">
                            Do you need a certified true copy of a document, a sworn affidavit or a credible witness for an agreement? 
                        </p>
                       
                        <div class="action-btn mt-4">
                            <a href="#solutions" class="btn solid-btn page-scroll">Notarise now</a>
                        </div>
                    </div>
                </div>
                <div class="col-9 col-md-7 col-lg-5 offset-xl-1 align-self-sm-end">
                    <div class="hero-img position-relative" style="width: 96%;">
                        <div class="image-bg-positioning" style="overflow: hidden;">
                           <img src="img/banners/banner-1.png" alt="" class="img-fluid"  
                           style=" width: 102% !important; margin-top: 20%" >
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

  
    <div id="about" class="feature-section primary-light-bg ptb-60">
        <div class="container">
            <div class="row justify-content-center mb-5">
                  <div class="col-md-3">
                      <h1 style="font-family: 'Poppins'; font-weight: 700; font-size: 32px; line-height: 41.6px; ">Introducing ToNote</h1>
                  </div>  
                  <div class="col-md-2  d-sm-none d-none d-lg-block">
                      <img class="arrow-img" src="img/thumb-nails/arrow-1.png">
                  </div>  
                  <div class="col-md-7">
                      <div class="text-justify">
                        Our mission is to create a world where every document shared can be trusted.<br>
                        We are building a platform that helps you notarise documents and swear affidavits virtually. This means that you can connect with a notary public and get the document that you need stamped from anywhere and at any time. The ToNote platform is a work in progress, however, we’re already connecting people from all over Nigeria with experienced notaries public and helping them notarise documents and swear affidavits remotely.
                      </div>
                  </div>  
            </div>
            <div class="row justify-content-center">
                
                <div class="col-md-4">
                    <div class="section-heading text-center mb-5 card">
                        <div class="thumbnail-a my-card text-center">
                            <img src="img/thumb-nails/thumbnail-a-1.png">
                        
                            <div class="my-card-text">
                                Every transaction, <a class="">seamless</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="section-heading text-center mb-5 card">
                        <div class="thumbnail-a my-card text-center">
                            <img src="img/thumb-nails/thumbnail-a-2.png">
                        
                            <div class="my-card-text">
                                Every document, <a class="">secure</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="section-heading text-center mb-5 card">
                        <div class="thumbnail-a my-card text-center">
                            <img src="img/thumb-nails/thumbnail-a-3.png">
                        
                            <div class="my-card-text">
                                Every signature, <a class="">credible</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  
    <!--features section end-->
    <section id="why" class="why ptb-60 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 mx-auto">
                    <div class="section-heading mb-5 text-center">
                        <h2>Why do you need ToNote ?</h2>
                        <p>Here are some benefits...</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class=" benefit-box text-center">
                        <img src="img/thumb-nails/benefit-1.png">
                        <div class="font-weight-bold">Convenience </div>
                        <!-- <div>(Sign, Notarise & Share, Anytime & Anywhere)</div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class=" benefit-box text-center">
                        <img src="img/thumb-nails/benefit-2.png">
                        <div class="font-weight-bold">Save Time & Money</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class=" benefit-box text-center">
                        <img src="img/thumb-nails/benefit-3.png">
                        <div class="font-weight-bold">Bank Grade Security</div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class="benefit-box text-center">
                        <img src="img/thumb-nails/benefit-4.png">
                        <div class="font-weight-bold">Digitise signatures/ seals</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class="benefit-box text-center">
                        <img src="img/thumb-nails/benefit-5.png">
                        <div class="font-weight-bold">Connect and Notarise Virtually </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9 mx-auto">
                    <div class="benefit-box text-center">
                        <img src="img/thumb-nails/benefit-6.png">
                        <div class="font-weight-bold">Encrypted storage</div>
                    </div>
                </div>
            </div>

          
            <div class=" text-center mt-4 pt-5 pb-3">
                Our online platform will be going live soon and will securely connect you, your team and your clients to trusted notaries that can validate documents or witness sworn affidavits in real-time.
                We’re already helping loads of users with their notary needs offline and would love for you to join our community. 
            </div>
           
        </div>
    </section>
    <!--our video promo section start-->

    <section id="join-list" class="ptb-100" style="/*background: url('img/footer-bg.png')no-repeat center top / cover;*/background: #003bb3;">

        <div class="container mb-5">
            <div class="row justify-content-center">
                <p style="width: 100% !important; text-align: center;" class="h4 text-capitalize text-white text-center">
                    Join Our Community
                </p>
                <!-- <p style="width: 100%; !important; text-align: center;" class="text-white text-center">
                    Join our list and be the first to know when we launch.
                </p> -->

                <div class="col-md-6">
                    <form method="post" id="subscribe-form" novalidate
                          class="validate subscribe-form subscribe-form-footer d-md-block d-lg-block">
                        <div id="mce-responses" class="clear" style="color: #e8e4e4;position: absolute; top: 70px; width: 100%;">
                            <div class="d-none mce-error w-100">
                            <div class="response text-center " id="mce-error-response"
                                 >Error</div>
                            </div>

                            <div class="response align-content-center" id="mce-success-response"
                                 style="display:none"></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="email" value="" name="EMAIL" id="mce-EMAIL"
                                   class="required email form-control input"
                                   placeholder="yourname@emaildomain.com">

                            

                            <input type="submit" name="subscribe" class="button btn solid-btn"
                                   id="mc-embedded-subscribe" value="Sign up Early">
                        </div>
                    </form>
                </div>
               
                <!--End mc_embed_signup-->
            </div>
        </div>


    </section>

    <!-- Benefit of ToNote -->
   
    <section id="solutions" class="why ptb-60 " style="background: #e6d8f1;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 mx-auto">
                    <div class="section-heading text-center">
                        <h2>Connect with a notary for...</h2>
                         <p>Our Notaries are available between 9am and 6pm (Mon-Fri)</p> 
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                  <div href="rqc.php?r=1" data-content="Affidavit of SIM Card Loss" class="modalRequest col-md-3">
                      <div class="card box p-3 dirty-yellow">
                          <div class="icon-wrapper"> <img src="img/icons/icon-7.png"></div>
                          <div class="benefit-text">Affidavit of SIM Card Loss </div>
                      </div>
                  </div>
                  <div href="rqc.php?r=3" data-content="Affidavit of Name Change" class="modalRequest col-md-3">
                      <div class="card box p-3 blue-light">
                          <div class="icon-wrapper"> <img src="img/icons/icon-1.png"> </div>
                          <div class="benefit-text">Affidavit of Name Change</div>
                      </div>
                  </div>
                  <div href="rqc.php?r=3" data-content="Affidavit of Proof of Ownership" class="modalRequest col-md-3">
                      <div class="card box p-3 pale-yellow">
                          <div class="icon-wrapper"> <img src="img/icons/icon-10.png"> </div>
                          <div class="benefit-text">Affidavit of Proof of Ownership</div>
                      </div>
                  </div>
                  <div href="rqc.php?r=4" data-content="Sworn Declaration of Age" class="modalRequest col-md-3">
                      <div class="card box p-3 blue-light">
                          <div class="icon-wrapper"> <img src="img/icons/icon-2.png"> </div>
                          <div class="benefit-text">Sworn Declaration of Age</div>
                      </div>
                  </div>
                  
            </div>
            <div class="row justify-content-center mb-5 mt-3">
                  <div href="rqc.php?r=5" data-content="Confirmation of name" class="modalRequest col-md-3">
                      <div class="card box p-3 pink">
                          <div class="icon-wrapper"> <img src="img/icons/icon-8.png"> </div>
                          <div class="benefit-text">Confirmation of name </div>
                      </div>
                  </div>
                  <div href="rqc.php?r=6" data-content="Certified True Copy of documents" class="modalRequest col-md-3">
                      <div class="card box p-3 lemon">
                          <div class="icon-wrapper"> <img src="img/icons/icon-9.png"> </div>
                          <div class="benefit-text">Certified True Copy of documents</div>
                      </div>
                  </div>
                  <div href="rqc.php?r=7" data-content="Real Estate Transaction Closing" class="modalRequest col-md-3">
                      <div class="card box p-3 purple-light">
                          <div class="icon-wrapper"> <img src="img/icons/icon-3.png"> </div>
                          <div class="benefit-text">Real Estate Transaction Closing</div>
                      </div>
                  </div>
                  <div href="rqc.php?r=8" data-content="Loan and Mortgage documents" class="modalRequest col-md-3">
                      <div class="card box p-3 lemon">
                          <div class="icon-wrapper"> <img src="img/icons/icon-4.png"> </div>
                          <div class="benefit-text">Loan and Mortgage documents</div>
                      </div>
                  </div>
            </div>
            <div class="d-flex justify-content-center">
                <p>...for more document types</p>
            </div>
            <div class="d-flex justify-content-center">
                <button data-content="" class="btn outline-btn modalRequest">Click here</button>
                <!-- <a target="_blank" href="rqc.php" class="btn outline-btn modalRequest">Click here to Connect with a notary</a> -->
            </div>
        </div>
    </section>
    <!-- End of benefit of ToNote -->

    <!--about us section start-->
    <section id="earning" class="earning ptb-60 d-none">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!--                                <div class="col-md-4">-->
                <!--                                    <div class="about-content-right">-->
                <!--                                        <img src="img/image-15.png" alt="about us" class="img-fluid">-->
                <!--                                    </div>-->
                <!--                                </div>-->

                <div class="col-md-5">
                    <img src="img/about-image.png" alt="about us" class="img-fluid mx-auto w-50">
                    <div class="about-content-left section-heading">

                        <!--                        <span class="text-uppercase color-secondary sub-title">Android or ios Apps</span>-->
                        <h3>
                            Start Earning Remotely with ToNote
                        </h3>
                        <div class="single-feature mb-4">
                            <div class="icon-box-wrap d-flex align-items-center mb-2">
                                <!--                                <div class="mr-3 icon-box">-->
                                <!--                                    <img src="img/image-icon-1.png" alt="icon image" class="img-fluid">-->
                                <!--                                </div>-->
                                <p class="mb-0">
                                    Are you a certified notary public in search of a marketplace full of potential customers? We securely connect our users to trusted notaries public to help with affidavits and notarisation of documents.
                                </p>
                            </div>
                        </div>
                        

                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mt-4 mb-4 sub-title">
                        Sign Up To Become an E-Notary Public
                    </h5>
                    <!-- <iframe loading="lazy" src="signup.html"
                            onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+50+"px";}(this));'
                            style="width: 100%; height: 100vh; overflow: hidden;" scrolling="no"></iframe> -->

                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <section id="pricing" class="promo-section ptb-50 border-bottom" style="background: #dadadb;">
        <div class="container">
            
            <div class="row mt-sm-3 mb-3 d-flex justify-content-center">
                <div class=" col-md-12">
                    <div class="section-heading text-center">
                        <h2>What will it cost ?</h2>
                        <!-- <p>Some of the benefits you can expect to enjoy</p> -->
                    </div>
                </div>
                
                <div class=" col-md-4">
                    <div class="card card-pricing price-list">
                        <div class="card-body">
                            
                            <div class="text-center">
                                <p class="under-design mt-1 h2 text-dark card-pricing .card-pricing-plan-name fw-bold" style="">
                                     ₦ 3,500
                                </p>
                                <div>Per Affidavit</div>
                            </div>
                            
                        </div>
                    </div> <!-- end Pricing_card -->
                </div>

                <div class=" col-md-4">
                    <div class="card card-pricing price-list ">
                        <div class="card-body">
                            
                            <div class="text-center">
                                <p class="under-design mt-1 h2 text-dark card-pricing .card-pricing-plan-name fw-bold" style="">
                                     ₦ 8,000
                                </p>
                                <div>Per Notary Session</div>
                            </div>
                            
                        </div>
                    </div> <!-- end Pricing_card -->
                </div>
                
                <div class=" col-md-4">
                    <div class="card card-pricing price-list">
                        <div class="card-body">
                            
                            <div class="text-center">
                                <p class="under-design mt-1 h2 text-dark card-pricing .card-pricing-plan-name fw-bold" style="">
                                     ₦ 4,000
                                </p>
                                <div>For Additional Notary Seal </div>
                            </div>
                            
                        </div>
                    </div> <!-- end Pricing_card -->
                </div>
                
                <div class=" col-md-6 mt-4">
                    <div class="card card-pricing price-list">
                        <div class="card-body">
                            <div class="text-center">For Students</div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="text-center">
                                        <p class="under-design mt-1 h2 text-dark card-pricing .card-pricing-plan-name fw-bold" style="">
                                             ₦ 3,500
                                        </p>
                                        <div>For Notarisation</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <p class="under-design mt-1 h2 text-dark card-pricing .card-pricing-plan-name fw-bold" style="">
                                             ₦ 1,750
                                        </p>
                                        <div>For Additional Notary Seal </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div> <!-- end Pricing_card -->
                </div>

                <div class="col-md-12 text-center pt-3" style="font-style: normal;">
                    We can deliver physical copies of your documents to your doorstep. This comes at an extra cost.
                </div>
            </div>
        </div>
    </section>

    <section id="tonote-for-notaries" class="ptb-100" >
        <div class="container">
            <div class="row justify-content-center">
                  <div class="col-md-5">
                      <div style="font-size: 20px">Dear Notaries,</div>
                      <h1 style="font-family: 'Poppins'; font-weight: 700; font-size: 32px; line-height: 41.6px; ">Start Earning Remotely with ToNote</h1>
                  </div> 
                <div class="col-md-7 row">
                    <div class="col-md-12 text-justify">
                        Are you a certified notary public in search of a marketplace full of potential customers? We securely connect our users to trusted notaries public to help with affidavits and notarisation of documents.
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <!-- <a href="https://gettonote.us6.list-manage.com/subscribe/post?u=1fcb3478dbbbc99c55e271755&id=598491e9e5" target="_blank" class="btn outline-btn mt-4">Click here to Start Earning</a> -->
                        <a href="signup.php" class="btn outline-btn mt-4">Click here to Start Earning</a>
                        <!-- <a href="#" target="_blank" style="text-decoration: underline;">Start Earning</a>. -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="faq" class="promo-section ptb-100 border-bottom" style="background: #E8EFFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-heading">
                        <h2>Frequently Asked Questions</h2>
                        <div class="mt-4 pt-5">
                            <img src="img/thumb-nails/faq.png" style="width: 200px">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-7">
                    <div class="mb-3">
                        Below you’ll find answers to the most common questions you may have about ToNote and Notary services. <span class="d-none">If you still can’t find the answer you’re looking for, leave us a message and we will respond shortly.</span>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div id="accordion-1" class="accordion accordion-faq row">
                                <div class="col-lg-12">

                                    <!-- Accordion card 1 -->
                                    <div class="w-100">
                                        <div class="card-header" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                            <h6 class="mb-0 py-lg-2 py-md-0 py-sm-2 py-2">
                                                <span class="ti-help-alt mr-3"></span> What is ToNote?
                                            </h6>
                                        </div>
                                        <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1"
                                             data-parent="#accordion-1">
                                            <div class="card-body">
                                                <p>
                                                    ToNote is a legally binding and fully remote way to sign, notarise, and share documents with ease.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion card 2 -->
                                    <div class="w-100">
                                        <div class="card-header" id="heading-1-2" data-toggle="collapse" role="button"
                                             data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                            <h6 class="mb-0 py-lg-2 py-md-0 py-sm-2 py-2">
                                                <span class="ti-help-alt mr-3"></span> How does ToNote work?
                                            </h6>
                                        </div>
                                        <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2"
                                             data-parent="#accordion-1">
                                            <div class="card-body">
                                                <p class="h6">Follow these simple steps to get an affidavit or notarise a document:</p>
                                                <p>
                                                    1. Complete the notary request form. 
                                                    Ensure you complete all essential information. 
                                                </p>
                                                <p>
                                                    2. Make payment.
                                                </p>

                                                <p>
                                                    3. Once payment is received, we will connect you with a notary and let you know if your virtual presence is required.
                                                </p>
                                                    <!--4. Join the notary session if necessary and get your document notarised. -->
                                                    4. Join a conference call if neccessary. 
                                                <p>
                                                <p>
                                                    5. The process is complete. Your documents will be delivered to your door-step.
                                                </p>
                                                    <p class="font-weight-bold">
                                                        <i>Delivery fees apply.</i>
                                                    </p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100">
                                        <div class="card-header" id="heading-1-4" data-toggle="collapse" role="button"
                                             data-target="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4">
                                            <h6 class="mb-0 py-lg-2 py-md-0 py-sm-2 py-2">
                                                <span class="ti-help-alt mr-3"></span> Is notarising on ToNote legal in the country?
                                            </h6>
                                        </div>
                                        <div id="collapse-1-4" class="collapse" aria-labelledby="heading-1-4"
                                             data-parent="#accordion-1">
                                            <div class="card-body">
                                                <p>
                                                    A combination of the Notary Act, Evidence Act and Electronic 
                                                    Evidence Act affirm that ToNote meets all regulatory standards required to operate and enable the remote notarisation of documents. For more regulatory information, send an email to 
                                                    <a href="mailto:ask@gettonote.com" target="_blank">ask@gettonote.com</a>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion card 3 -->
                                    <div class=" py-4 justify-content-center d-flex">
                                        <div class="btn-group">
                                            <a href="#contact" class="btn solid-btn">Contact us if you have more questions.</a>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <!--our video promo section end-->
   

    <!--contact us section start-->
    <section id="contact" class="contact-us ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-5">
                    <div class="section-heading">
                        <h2>Contact Us</h2>
                        <p>
                            To swear an affidavit or notarise a document, call or send us an email.
                        </p>
                    </div>
                    <div class="footer-address">
                        <h6>
                            <strong>Office Address</strong>
                        </h6>
                        <p>1625b Saka Jojo Street, Victoria Island, Lagos.</p>
                        <ul>
                            <li>
                                <span>Phone: 
                                    <a href="tel:+2348146507035" target="_blank">+2348146507035</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    Email : <a href="mailto:ask@gettonote.com" target="_blank">ask@gettonote.com</a>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <form  method="POST" id="contactForm" class="contact-us-form" novalidate="novalidate">
                        <h5>Get In Touch</h5>
                        <div class="contact-error"></div>
                       <div class="row">
                           <div class="col-sm-6 col-12">
                               <div class="form-group">
                                   <input type="text" class="form-control" name="name" id="cname"
                                          placeholder="Enter name"
                                          required="required">
                               </div>
                           </div>
                           <div class="col-sm-6 col-12">
                               <div class="form-group">
                                   <input type="text" class="form-control" name="phone" id="cphone" 
                                          placeholder="Phone Number"
                                          required="required">
                               </div>
                           </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="cemail" 
                                           placeholder="Enter email"
                                           required="required">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" id="cmessage" class="form-control" rows="7" cols="25"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn outline-btn" id="btnContactUs" style="opacity: 1;">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section end-->

</div><!--shape image end-->


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ToNote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container p-3">
        <h3 id="display_title"></h3>
        <p>Fill and submit the form below and a member of the team will be in touch shortly.</p>
        <form id="form">
            <div class="row">
                <?php 
                    $agent = $_GET['id'] ?? "";
                    // $agent = Agent::find_by_agent_id($id) ?? "" ;
                 ?>

                <div class="col-md-12 my-2 d-none wrap">
                    <label for="trans_type">Document Type <sup class="text-secondary">*</sup></label>
                    <input type="text" id="trans_type" class="form-control border-secondary" required name="trans_type">
                    
                </div>
                <div class="col-md-6 my-2">
                    <label for="email">Email <sup class="text-secondary">*</sup></label>
                    <input type="text" required id="email" name="email" class="form-control border-secondary">
                </div>

                <div class="col-md-6 my-2">
                    <label for="firstname">Firstname <sup class="text-secondary">*</sup></label>
                    <input type="text" required id="firstname" name="firstname" class="form-control border-secondary">
                </div>
                <div class="col-md-6 my-2">
                    <label for="lastname">Lastname <sup class="text-secondary">*</sup></label>
                    <input type="text" required id="lastname" name="lastname" class="form-control border-secondary">
                </div>
                
                <div class="col-md-6 my-2">
                    <label for="phone">Phone Number <sup class="text-secondary">*</sup></label>
                    <input type="text" required id="phone" name="phone" class="form-control border-secondary">
                </div>

                <div class="col-md-12">
                    <label>How do you want your document delivered ?</label>
                    <select class="form-control y-3 border-secondary" name="delivery_option" id="delivery_option" required="">
                        <option value="">Select Delivery Option</option>
                        <option value="softcopy">Electronic Document Only(Via Email)</option>
                        <option value="both">Electronic and Physical Document(To your address)</option>
                        <option value="collection">Collection</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3 d-none delivery_address">
                    <label>Delivery Address (This is where your notarised documents will be dispatched to) </label>
                    <input type="text" name="delivery_address" id="delivery_address" class="form-control border-secondary my-3">
                </div>
                
                <div class="col-md-12 my-2  ">
                    <label for="trans_type">Referral No (If you have a referral code from someone)</label>
                    <input type="text" <?php echo $agent != '' ? 'readonly' : '' ?> id="referral" 
                    value="<?php echo $agent != '' ? $agent : '' ?>" class="form-control border-secondary"  name="referral_no" placeholder="e.g TA000IK">
                </div>
            </div>
            

            <div class="col-12 my-2 p-0">
                <button type="submit" id="Submit" class="btn btn-primary w-100 py-3">Submit</button>
            </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>









<!--footer section start-->
<?php include('footer.php') ?>


<?php if ($ref == 'show') { ?>
    <script type="text/javascript">
        show_ref();
    </script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        // $("#modalDiscount").modal("show");
        // var setInt = setInterval(function(){ 
        //     $("#modalDiscount").modal("show");
        // }, 15000);
        
        // setInterval(function(){ 
        //     $("#modalDiscount").modal("hide");
        //     clearInterval(setInt);
        //      console.log('clear')
        // }, 30000);
        
        $(document).on("click", "#cls_modal_discount", function(e){
             clearInterval(setInt);
             console.log('clear')
        }); 
    });


    $(document).on('change', '#delivery_option', function () {
        var selected = $(this).find(":selected").val();
        console.log(selected);
        if (selected == 'both') {
            $(".delivery_address").removeClass("d-none");
            $("#delivery_address").prop('required',true);
        }else{
            $(".delivery_address").addClass("d-none");
            $("#delivery_address").prop('required',false)
        }
    } )
    
    $(document).on("click", ".modalRequest", function(e){
        $("#exampleModalCenter").modal('show');
        var mdata = $(this).data('content');
        $('#trans_type').val(mdata)
        console.log(mdata);
        if(mdata != ''){
            $("#display_title").html("Request for " + mdata)
            $(".wrap").addClass("d-none")
        }else{
            $("#display_title").html("Request for Notary Session");
            $(".wrap").removeClass("d-none")
        }
        

    } )
    
    // $(document).on('change', '#select_trans_type', function () {
    //     var selected = $(this).find(":selected").val();
    //     $('#trans_type').val(selected)
    // })
    $(document).on("submit", "#form", function(e){
        e.preventDefault();
        
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var trans_type = $('#trans_type').val()
        // var req_form = 1;
        $.ajax({
            url: 'inc/process_form.php',
            method:"POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    $("#exampleModalCenter").modal('hide');
                    confirmAlert('Awesome', 'Your request is received. A member of our team will reach out to you shortly');
                    $("form").trigger("reset");

                    // notification_mail(firstname, lastname, email, phone, trans_type);
                    var req_no = r.req_no;
                    var referral_no = r.referral_no;
                    var weekend = r.weekend;
                    RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no, referral_no, weekend);
                    setTimeout(
                      function() 
                      {
                          show_ref();
                      }, 5000);
                    if (weekend == 1) {
                        setTimeout(
                          function() 
                          {
                            weekendMessage(firstname, lastname, email);
                            
                          }, 5000);
                        
                    }
                }else{
                    errorAlert("Error not sent")
                }
               // 
            }
        })
    })

    function RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no, referral_no, weekend){
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
                    RequestNoticeMail(firstname, lastname, email, phone, trans_type, req_no, referral_no)
                    if (r.weekend == true) {
                        weekendMessage(firstname, lastname, email);
                    }
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
    function RequestNoticeMail(firstname, lastname, email, phone, trans_type, req_no, referral_no){
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
                referral_no: referral_no,
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
    
    function weekendMessage(firstname, lastname, email){
        $.ajax({
            url: 'app/processor/weekendMessage.php',
            method:"POST",
            data: {
                weekendMessage: 1,
                firstname: firstname,
                lastname: lastname,
                email: email,
            },
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                     console.log(data.msg);
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
   

    
</script>
