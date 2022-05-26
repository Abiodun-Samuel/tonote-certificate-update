                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © ToNote Technologies Limited
                            </div>
                            <div class="col-md-6">
                               <!--  <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- bundle -->
        <script src="<?php echo url_for('assets/js/vendor.min.js') ?> "></script>
        <script src="<?php echo url_for('assets/js/app.min.js') ?>"></script>
        <!-- Apex js -->
        <script src="<?php echo url_for('assets/js/vendor/apexcharts.min.js') ?>"></script>

        <!-- Todo js -->
        <script src="<?php echo url_for('assets/js/ui/component.todo.js') ?>"></script>

        <!-- demo app -->
        <script src="<?php echo url_for('assets/js/pages/demo.dashboard-crm.js') ?>"></script>
        <!-- end demo js-->
       
        <script src="../../../js/sweetalert2.all.min.js"></script>
        <script src="../../../js/sweet.js"></script>
        <script src="../../../js/select2.full.min.js"></script>

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
                 // html: 'Would you like to send an <b>sms or email</b> to the Customer ?',
                 showCloseButton: !1,
                 // showCancelButton: !0,
                 focusConfirm: !1,
                 confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
                 confirmButtonAriaLabel: "Thumbs up, great!",
                 // cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
                 // cancelButtonAriaLabel: "Thumbs down",
                 confirmButtonClass: "btn btn-primary",
                 buttonsStyling: !1,
                 // cancelButtonClass: "btn btn-danger ml-1"
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
        </script>
    </body>
</html>