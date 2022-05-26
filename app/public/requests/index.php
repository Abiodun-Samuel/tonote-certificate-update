<?php 
	require_once('../../../private/initialize.php');

$page = 'Request';
$page_title = 'All';
include(SHARED_PATH . '/admin_header.php'); 
$status = $_GET['status'] ?? 1;
?>
<!-- Datatables css -->
<link href="<?php echo url_for('assets/css/vendor/dataTables.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url_for('assets/css/vendor/responsive.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<style type="text/css">
	.form-check:hover{
		background-color: #f1f1f1;
	}
</style>

	<div class="row">
		<?php foreach (Request::STATUS as $key => $value) { 
    		if ($key == 1) :
    			$badge_color = "btn-danger";
    		elseif ($key == 2):
    			 $badge_color = "btn-warning";
    		elseif ($key == 3):
    			 $badge_color = "btn-primary";
    		elseif ($key == 4):
    			 $badge_color = "btn-success";
    		elseif ($key == 5):
    			 $badge_color = "btn-secondary";
    		endif
		?>
		<a href="<?php echo url_for('public/requests/index.php?status='. $key); ?>" class="col-lg-2 col-md-4 col-sm-6 analytic">
			<div class="card">
				<div class="card-body <?php echo $status == $key ? 'active' : '' ?> d-flex justify-content-between ">
					<div><span class="text-dark h5"><?php echo $value ?></span> </div>

					<div><span class="btn rounded-pill <?php echo $badge_color ?>"><?php echo count(Request::find_by_status(['status' => $key])); ?></span></div>
				</div>
			</div>
		</a>
		<?php } ?>
	</div>
	<div class="row">
		<!-- <div class="col-12"></div> -->
		<div class="col-12">
			<?php if (in_array($loggedInAdmin->admin_level , [1,2])) { ?>
				<?php if ($status == 1 || $status == '') { ?>
				<div class="d-flex justify-content-between my-3">
					<!-- <div class="btn-group"> -->
						<button  type="button" class="btn btn-primary mr-3" id="createTask" data-bs-toggle="modal" data-bs-target="#createTaskModal">Create New task</button>

						<button type="button" class="btn btn-primary" id="assignTask" data-bs-toggle="modal" data-bs-target="#assignTaskModal">Assign Task</button>
					<!-- </div> -->
				</div>
				<?php  } ?>
			<?php } ?>
			<?php if ($status == 4) { ?>
			<div class="mb-4">
				<a href="exportData.php" class="btn btn-success">Export to CSV</a>
			</div>
			<?php } ?>
			<div class="card">
				<div class="card-body">
					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
					    <thead>
					        <tr>
					            <th>s/n.</th>
					            <?php if ($status == 1 || $status == '') { ?>
					            <th>select</th>
					            <?php  } ?>
					            <th>Req No.</th>
					            <th>Date</th>
					            
					            <th>Status</th>
					            <th>Request Type</th>
					            <?php if (in_array($status, [2,3,5,6])) { ?>
					            <th>Assigned To</th>
					            <th>Assigned Date</th>
					            <?php  } ?>
					            <?php if ($status == 3) { ?>
					            <th class="bg-primary text-white">Notary In Charge</th>
					            <th>Updated at</th>
					            <?php  } ?>
					            
					            <th>C.Name</th>
					            <th>Email</th>
					            <?php if ($status == 1 || $status == '') { ?>
					            <th></th>
					        	<?php }  ?>
					            <th>Phone</th>
					            <th>Others</th>

					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (Request::find_by_status(['status' => $status]) as $key => $value) { 
					    		// pre_r($value);
					    		$task = Task::find_by_request_id($value->id);
					    		$status = $value->status;
					    		if ($status == 1) :
					    			$badge_color = "badge-danger-lighten";
					    		elseif ($status == 2):
					    			 $badge_color = "badge-warning-lighten";
					    		elseif ($status == 3):
					    			 $badge_color = "badge-primary-lighten";
					    		elseif ($status == 4):
					    			 $badge_color = "badge-success-lighten";
					    		elseif ($status == 5):
					    			 $badge_color = "badge-secondary-lighten";
					    		endif;

					    		
					    		
					    	?>
					        <tr>
					        	
					        	<td><?php echo $sn++ ?></td>
					        	<?php if ($status == 1 || $status == '') { ?>
					        	<td><input type="checkbox" class="checkbox" value="<?php echo $value->id ?>" style="width: 25px; height: 25px;" name=""></td>
					        	<?php } ?>
					        	<td><?php echo $value->req_no ?? '' ?></td>
					            <td><?php echo date('M j, Y, g:i a', strtotime($value->created_at)) ?></td>
					            
					            <td>
					            	<span class="badge <?php echo $badge_color ?>">
					            	<?php echo Request::STATUS[$value->status] ?? '' ?></span>
					            </td>
					            <td><?php echo $value->trans_type ?></td>
					            <?php if (in_array($status, [2,3,5,6])) { ?>
					            	<td><?php  
					            	$r_id = Task::find_by_request_id($value->id); 
					            	foreach ($r_id as $key => $val) {
					            		if ($val->admin_id == "") {
					            			echo "Not Set";
					            		}else{
					            		 echo Admin::find_by_id($val->admin_id)->full_name();
					            		}
					            	} ?></td>

					            	<td><?php  
					            	$r_id = Task::find_by_request_id($value->id); 
					            	foreach ($r_id as $key => $val) {
					            		if ($val->created_at == '') {
					            			echo "Not Set";
					            		}else{
					            		 echo date('M j, Y, g:i a', strtotime($val->created_at));
					            		}
					            	}?></td>
					        	<?php } ?>
					        	<?php if ($status == 3) { ?>
						            <td class="bg-primary text-white"><?php  
						            	$r_id = Task::find_by_request_id($value->id); 
						            	foreach ($r_id as $key => $val) {
						            		if ($val->notary_no == "") {
						            			echo "Not Set";
						            		}else{
						            		 echo Notary::find_by_id($val->notary_no)->full_name();
						            		}
						            	} ?>
						            </td>
						            <td class=""><?php  
						            	$r_id = Task::find_by_request_id($value->id); 
						            	foreach ($r_id as $key => $val) {
						            		if ($val->updated_at == "") {
						            			echo "Not Set";
						            		}else{
						            		 echo date('M j, Y, g:i a', strtotime($val->updated_at));
						            		}
						            	} ?>
						            </td>
					        	<?php } ?>
					            <td><?php echo $value->firstname ." ". $value->lastname; ?></td>
					            <td><?php echo $value->email ?></td>
					            <?php if ($status == 1 || $status == '') { ?>
					            <td>
					            	<a href="<?php echo url_for('public/requests/delete.php?id='. $value->id) ?>" class="btn btn-outline-danger btn-sm">Delete</a>
					            </td>
					            <?php } ?>
					            <td><?php echo $value->phone ?></td>
					            
					            <td>
					            	<table>
					            		
					            		<tr>
					            			<td>Delivery Option:</td>
					            			<td><?php echo $value->delivery_option ?></td>
					            		</tr>
					            		<?php if ($value->delivery_option == 'hardcopy') { ?>
					            			<tr>
						            			<td>Delivery Address:</td>
						            			<td><?php echo $value->delivery_address ?></td>
						            		</tr>
					            		<?php } ?>
					            		<tr>
					            			<td>Id Type:</td>
					            			<td ><?php echo $value->id_type ?></td>
					            		</tr>
					            		<tr>
					            			<td>Id Number:</td>
					            			<td ><?php echo $value->id_number ?></td>
					            		</tr>

					            		<tr>
					            			<td>Photo:</td>
					            			<td><div>
						            				<!-- <img src="../../../inc/signup/<?php //echo $value->photo ?>" alt="<?php //echo $value->photo ?>" height="20"> -->
						            				<a href="<?php echo '../../../inc/uploads/request/'.$value->photo; ?>" target="_blank" class="btn btn-link btn-lg text-muted mylink">
							                            <i class="dripicons-download"></i> <?php echo $value->photo ?>
							                        </a>
						            			</div>
					            			</td>
					            		</tr>
					            		<tr>
					            			<td>ID Card:</td>
					            			<td>
					            				<div>
					            					<a href="<?php echo '../../../inc/uploads/request/'.$value->id_card_image; ?>" target="_blank" class="btn btn-link btn-lg text-muted mylink">
							                            <i class="dripicons-download"></i> <?php echo $value->id_card_image ?>
							                        </a>
					            				
					            				</div>
					            			</td>
					            			
					            		</tr>
					            		<tr>
					            			<td>Document:</td>
					            			<td>
					            				<div>
					            					<a href="<?php echo '../../../inc/uploads/request/'.$value->documents; ?>" target="_blank" class="btn btn-link btn-lg text-muted mylink">
							                            <i class="dripicons-download"></i> <?php echo $value->documents ?>
							                        </a>
						            			</div>
					            			</td>
					            		</tr>
					            		<?php if ($status == 5) { ?>
					            		<tr>
					            			<td>Reason:</td>
					            			<td>
					            				<?php  
								            	$r_id = Task::find_by_request_id($value->id); 
								            	foreach ($r_id as $key => $val) {
								            		if ($val->reason == "") {
								            			echo "Not Set";
								            		}else{
								            		 echo $val->reason;
								            		}
								            	} ?>
					            			</td>
					            		</tr>
					            		<?php } ?>
					            		
					            	</table>
					            </td>
					        </tr>
					        <?php } ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- Right modal -->

<div id="assignTaskModal" class="modal  fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right">
    <!-- <div class="modal-dialog  "> -->
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4 class="mt-0">Administrator</h4>
                    <form id="form" class="mt-3">
                    	<?php foreach (Admin::find_by_undeleted() as $key => $value) { ?>
                    		<?php if ($value->process_request == 1) { ?> 
                    		<?php //if ($support == 1) { ?>
						    <div class="form-check border-bottom">
						        <input type="radio" id="customRadio<?php echo $key ?>" style="width: 25px; height:25px" name="admin_id" class="form-check-input" value="<?php echo $value->id ?>">
						        <label class="form-check-label p-2" for="customRadio<?php echo $key ?>"><?php echo Admin::find_by_id($value->id)->full_name(); ?></label>
						    </div>
						    <?php } ?>
					    <?php } ?>
					    
					</form> 
                    
                </div>
                <div class="display_error"></div>
                <div class="text-center my-3">
                	<button type="button" id="genTask" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="createTaskModal" class="modal  fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: ;">
    <div class="modal-dialog modal-lg ">
    <!-- <div class="modal-dialog  "> -->
        <div class="modal-content">
        	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Create New Task</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>

            <!-- <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <div class="">
                    <!-- <h4 class="mt-0">Create New Task</h4> -->
                    <form id="createForm">
			            <div class="row">
			                

			                <div class="col-md-12 my-2  wrap">
			                    <label for="trans_type">Document Type </label>
			                    <input type="text" id="trans_type" class="form-control border-secondary" required name="trans_type">
			                    
			                </div>
			                <div class="col-md-6 my-2">
			                    <label for="email">Email </label>
			                    <input type="text" required id="email" name="email" class="form-control border-secondary">
			                </div>

			                <div class="col-md-6 my-2">
			                    <label for="firstname">Firstname </label>
			                    <input type="text" required id="firstname" name="firstname" class="form-control border-secondary">
			                </div>
			                <div class="col-md-6 my-2">
			                    <label for="lastname">Lastname </label>
			                    <input type="text" required id="lastname" name="lastname" class="form-control border-secondary">
			                </div>
			                
			                <div class="col-md-6 my-2">
			                    <label for="phone">Phone Number </label>
			                    <input type="text"  id="phone" name="phone" class="form-control border-secondary">
			                </div>

			                <div class="col-md-12">
			                    <label>Method of delivery ?</label>
			                    <select class="form-control y-3 border-secondary" name="delivery_option" id="delivery_option" required="">
			                        <option value="">Select Delivery Option</option>
			                        <option value="softcopy">Electronic Document only(Via Email)</option>
			                        <option value="both">Electronic and Physical document(To your address)</option>
			                        <option value="collection">Collection</option>
			                    </select>
			                </div>
			                <div class="col-md-12 mt-3 d-none delivery_address">
			                    <label>Delivery Address (This is where notarised documents will be dispatched to) </label>
			                    <input type="text" name="delivery_address" id="delivery_address" class="form-control border-secondary my-3">
			                </div>
			            </div>
			            

			            <div class="col-12 my-2 p-0">
			                <button type="submit" id="Submit" class="btn btn-primary w-100 py-1">Submit</button>
			            </div>
			        </form>
                    
                </div>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include(SHARED_PATH . '/admin_footer.php');?>
<!-- Datatables js -->

<script type="text/javascript">
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

	$('.checkbox').mousedown(function() {
		var numberOfChecked = $('input:checkbox:checked').length;
	    if (!$(this).is(':checked')) {
	        $(this).closest("tr").addClass('rowBg');
	    }else{
	    	$(this).closest("tr").removeClass('rowBg');	
	    }
	});
	// $(document).on("click", "#assignTask", function(e) {
	// 	$("#assignTaskModal").modal("show")
	// }); 

	$(document).on("click", "#genTask", function(e) {

		var checkbox = $('.checkbox:checked');
		var checkbox_value = [];
		var admin_id = $(".form-check-input:checked").val()
		if (checkbox.length > 0) {
			$(checkbox).each(function() {
				checkbox_value.push($(this).val());
			})
			// var 
			if (admin_id == "") {
				errorAlert("select at least one admin")
			}else{
				$.ajax({
		            url: 'components/assign_task.php',
		            method:"POST",
		            data: {
		                assignTask: 1,
		                admin_id: admin_id,
		                status: 2,
		                request: checkbox_value,
		            },
		            dataType: "json",
		            success: function (data) {
		                if (data.success == true) {
		                	 successTime(data.msg);
		                	 $('input:checkbox:checked').closest('tr').css('display', 'none')
		                	 TaskAssignedMail(data.email)
		                }else{
		                    errorAlert(data.msg);
		                     $(".display_error").html(data.msg);
		                }
		            }
		        })
			}
			

		}else{
			$("#assignTaskModal").modal("hide");
			errorAlert("select at least one record")
		}
	});

	function TaskAssignedMail(email){
        $.ajax({
            url: '../../processor/TaskAssignedMail.php',
            method:"POST",
            data: {
                TaskAssignedMail: 1,
                email: email,
            },
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                	 // successTime(data.msg);
                	 location.reload();
                }else{
                    errorAlert("Success email not sent")
                }
            }
        })
    }







    $(document).on("submit", "#createForm", function(e){
        e.preventDefault();
        
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var trans_type = $('#trans_type').val()
        // var req_form = 1;
        $.ajax({
            url: '../../../inc/process_form.php',
            method:"POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (r) {
                if (r.success == true) {
                    $("#createTaskModal").modal('hide');
                    // confirmAlert('Awesome', 'Your request is received. A member of our team will reach out to you shortly');
                    $("#createForm").trigger("reset");
                    var req_no = r.req_no;
                    successAlert(r.msg)
                    location.reload();
                    // RequestSuccessMail(firstname, lastname, email, phone, trans_type, req_no)
                }else{
                    errorAlert(r.msg)
                } 
            }
        })
    })

</script>
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>
<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>