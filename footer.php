<footer class="footer-section">

    <!--footer top start-->
    <div class="footer-top pt-4 background-img-2" style="background: #003bb3;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-4 col-lg-4 mb-4 mb-md-4 mb-sm-5 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <div class="social-list-wrap">
                            <ul class="social-list list-inline list-unstyled">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/GetToNote" target="_blank" title="Facebook">
                                        <span class="ti-facebook"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/company/gettonote" target="_blank" title="Linkedin">
                                        <span class="ti-linkedin"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/mytonote/" target="_blank" title="Instagram">
                                        <span class="ti-instagram"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/gettonote?s=11" target="_blank" title="twitter">
                                        <span class="ti-twitter"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 mb-4 mb-sm-5 mb-md-0 mb-lg-0">
                    <div class="footer-nav-wrap text-white text-lg-right text-md-right text-left">
                        <ul class="list-inline list-unstyled">
                            <li class="mb-2 list-inline-item">
                                <a href="index.php" class="page-scroll">Home</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="#faq" class="page-scroll">FAQs</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="#contact" class="page-scroll">Contact Us</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="#about" class="page-scroll">About Us</a>
                            </li>
                             <li class="mb-2 list-inline-item">
                                <a href="#" class="page-scroll refer">Refer & Earn</a>
                            </li>
                             <li class="mb-2 list-inline-item">
                                <a href="blog.php">Blog</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="privacy.php">Privacy Policy</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="terms.php">Terms of Use</a>
                            </li>
                            <li class="mb-2 list-inline-item">
                                <a href="app/login.php">login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--footer bottom copyright start-->
        <div class="footer-bottom border-gray-light mt-1 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-7">
                        <div class="copyright-wrap small-text">
                            <p class="mb-0 text-white">© 2021 ToNote Technologies Limited, All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="terms-policy-wrap text-lg-right text-md-right text-left">
<!--                            <ul class="list-inline">-->
<!--                                <li class="list-inline-item"><a class="small-text" href="#">Terms</a></li>-->
<!--                                <li class="list-inline-item"><a class="small-text" href="#">Security</a></li>-->
<!--                                <li class="list-inline-item"><a class="small-text" href="#">Privacy Policy</a></li>-->
<!--                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer bottom copyright end-->
    </div>
    <!--footer top end-->
</footer>
<!--footer section end-->


<div class="modal fade show" id="confirmModal">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <div class="">
                        <!-- <i class="material-icons"></i> -->
                        <img src="img/fav.png" height="80">
                    </div>
                </div>              
                <h4 class="modal-title w-100 msgTitle" >Awesome!</h4>
            </div> 
      </div>

      <div class="modal-body container">
            <p class="text-center" id="displayMsg">Message goes here</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-block" data-dismiss="modal">OK</button>
    </div>
      
    </div>
  </div>
</div>

<div class="modal fade right show" id="modalDiscount">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">Refer & Earn</h4>
        <button type="button" id="cls_modal_discount" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center">
              <i class="fas fa-gift fa-4x"></i>
            </p>
          </div>

          <div class="col-12">
            <p>

                    Refer friends, colleagues and family to use our platform. Earn points in your ToNote Wallet when Referred Persons make their first Completed Transaction on the ToNote Platform.  Redeem your points to pay for your personal transactions on ToNote.
              
            </p>
            <div id="ref_erro"></div>
           <div class="action-btn mt-4">
                <p><strong>Fill in  the form to proceed.</strong></p>
                    <form id="referral_form">
                         <div class="row">
                               <div class="col-sm-6 col-12">
                                   <div class="form-group">
                                        <label>First Name<sup>*</sup></label>
                                       <input type="text" class="form-control" name="first_name" id="first_name" placeholder="John" required>
                                   </div>
                               </div>
                               <div class="col-sm-6 col-12">
                                   <div class="form-group">
                                        <label>Last Name<sup>*</sup></label>
                                       <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Doe" required>
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                            <label>Email<sup>*</sup></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="john@yourdomain.com" required>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                            <label>Phone Number<sup>*</sup></label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="+234 801 234 5678" required>
                                    </div>
                                </div>
                            </div>

                        <div class=" my-2 p-0">
                            <button type="submit" class="btn btn-primary w-100 py-3 " id="getStarted">Proceed to referral</button>
                        </div>
                    </form>
            </div>

          </div>
        </div>
      </div>

      <!--Footer-->
      
    </div>
    <!--/.Content-->
  </div>
</div>


<div class="modal fade right show" id="freeTrial">
  <div class="modal-dialog modal-dialog-centered modal-notify modal-danger" style="max-width: 600px !important;" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <!-- <h4 class="modal-title" id="exampleModalCenterTitle">Refer & Earn</h4> -->
        <button type="button" id="cls_modal_discount" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center"><img src="img/free_trial.png" width="320"></div>
        <ul class="px-4">
            <li>🎉 Free secure e-sign tool</li>
            <li>🎉 Free document management system</li>
            <li>🎉 Access to virtual notary</li>
        </ul>
        <form class=" validate trial-form freeTrial-form-footer d-md-block d-lg-block px-4" id="trail-form">
            
            <div class=" p-2" style="font-size: 12px; color: blue; font-style: italic; font-weight:bold;">You’ll sign,share and notarise unlimited number of documents online for 30 days</div>
            
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email address">
            </div>

            <div class="form-group">
                <label>Occupation <span class="text-danger">*</span></label>
                <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation">
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control" placeholder="Enter Company">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn-primary btn" id="trail-subscribe" value="Get Free 30 Days Trail">
            </div>
            <!-- <div class="d-flex align-items-center ">
                <input type="email" value="" name="email" id="mce-EMAIL" class="required email form-control input" placeholder="Enter your email address">
                <input type="submit" name="subscribe" class="button btn solid-btn" id="trail-subscribe" value="Get Free 30 Days Trail">
            </div> -->
            
        </form>
      </div>

      <!--Footer-->
      
    </div>
    <!--/.Content-->
  </div>
</div>

<input type="hidden" id="ref_url" value="affiliate.php">
<!--jQuery-->
<script src="js/jquery-3.5.0.min.js"></script>
<!--Popper js-->
<script src="js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="js/bootstrap.min.js"></script>
<!--Magnific popup js-->
<script src="js/jquery.magnific-popup.min.js"></script>
<!--jquery easing js-->
<script src="js/jquery.easing.min.js"></script>

<!--wow js-->
<script src="js/wow.min.js"></script>
<!--owl carousel js-->
<script src="js/owl.carousel.min.js"></script>
<!--countdown js-->
<script src="js/jquery.countdown.min.js"></script>
<!--validator js-->
<script src="js/validator.min.js"></script>
<!--custom js-->
<!-- <script src="js/scripts.js"></script> -->
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/sweet.js"></script>
<script src="js/select2.full.min.js"></script>
<script type="text/javascript">

    
   // Alert
   function confirmAlert(title, msg){
    $(".msgTitle").html(title);
    $("#displayMsg").html(msg);
    $("#confirmModal").modal("show");
   }
   function successAlert(msg){
       Swal.fire({
         title: msg,
         type: "success",
         showCloseButton: !1,
         focusConfirm: !1,
         confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
         confirmButtonAriaLabel: "Thumbs up, great!",
         confirmButtonClass: "btn btn-primary",
         buttonsStyling: !1,
       });
   }
   function successTime(msg){
     Swal.fire({
       position: 'bottom-end',
       type:"success",
       title:msg,
       showConfirmButton:!1,
       timer:1000,
     })
   }
   function errorAlert(msg){
       Swal.fire({
         title: msg,
         type: "error",
         showCloseButton: !1,
         timer:1500,
         showCancelButton: !1,
         confirmButtonClass: "btn btn-primary",
         buttonsStyling: !1,
       });
   }
   function errorTime(msg){
     Swal.fire({
       position:"center",
       type:"error",
       title:msg,
       showConfirmButton:!1,
       timer:1500,
       confirmButtonClass:"btn btn-primary",
       buttonsStyling:!1
     })
   }
   function Option(title, text, eid, store_id){
    console.log("option")
   }
   function errorOption(title, text, eid, store_id){
    var stock_url = $("#stock_url").val()
    var c_url = stock_url+'?id'+'='+ eid+'&store_id'+'='+ store_id;
      swal({
         title: title,
         text: text,
         icon: "warning",
         buttons: true,
         dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           window.location.href = c_url;
         } 
       });
   }
   $(document).on('click', '.refer', function (e) {
        e.preventDefault();
        show_ref();
    });

   function show_ref() {
       $("#modalDiscount").modal("show");
   }

   
   // setTimeout(function() {
   //      freeTrial()
   // }, 5000);

   freeTrial()
   $(document).on('click', '.freeTrial', function (e) {
        e.preventDefault();
        freeTrial()
    });

   function freeTrial() {
       $("#freeTrial").modal("show");
   }
   $(document).on('click', '#trail-subscribe', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'inc/process-freetrail.php',
            method:"POST",
            data: $('#trail-form').serialize(),
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    $("#freeTrial").modal("hide");
                    successAlert(r.msg)
                    TrailSuccessMail(r.email)
                }else{
                    errorAlert(r.msg)
                }
            }
        })
   });

   function TrailSuccessMail(email){
        $.ajax({
            url: 'app/processor/TrailSuccessMail.php',
            method:"POST",
            data: {
                TrailSuccessMail: 1,
                email: email,
            },
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    TrailNoticeMail(email)
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }
    function TrailNoticeMail(email){
        $.ajax({
            url: 'app/processor/TrailNoticeMail.php',
            method:"POST",
            data: {
                TrailNoticeMail: 1,
                email: email,
                
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

   var ref_url = $("#ref_url").val();
    $(document).on('click', '#getStarted', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'inc/process_referral.php',
            method:"POST",
            data: $('#referral_form').serialize(),
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    $("#modalDiscount").modal('hide');
                    confirmAlert('Signup Successful', 'Your will be redirected shortly');
                    window.location.href = ref_url + '?id=' + r.agent_id+ '&new=1';
                }else{
                    if (r.agent_id != '') {
                        $("#ref_erro").html(
                            "<div class='alert alert-danger'>" + r.msg + " <a id='location' href='affiliate.php?id=" + r.agent_id + '&new=0' +" '>Click here to Refer instead</a></div>");

                    }else{
                        $("#ref_erro").html(r.msg)
                        errorAlert("Error not sent")
                    }
                }
               // 
            }
        })
    });

   
</script>



<script>
    

    $('body').append('<a id="scroll-to-top" class="scroll-to-top-btn" href="#"><i class="ti-arrow-up"></i></a>');
    if ($('#scroll-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#scroll-to-top').addClass('active');
                } else {
                    $('#scroll-to-top').removeClass('active');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#scroll-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 1250);
        });
    }

   
</script>

</body>

</html>