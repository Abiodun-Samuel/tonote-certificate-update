<?php 
	require_once('../../../private/initialize.php');

$page = 'Support';
$page_title = 'Task';
include(SHARED_PATH . '/admin_header.php'); 
$tasks = Task::find_by_admin_id($loggedInAdmin->id);
// pre_r($tasks);
?>
<style type="text/css">
	.task-detail:hover{
		color: darkblue !important;
		text-decoration: underline;
	}
</style>
	<div class="row">
	    <div class="col-12">
	        <div class="board">
	        	<?php foreach (Request::STATUS as $skey => $status) { 
	        		if ($skey == 1) :
		    			$badge_color = "bg-danger";
		    		elseif ($skey == 2):
		    			 $badge_color = "bg-warning";
		    		elseif ($skey == 3):
		    			 $badge_color = "bg-primary";
		    		elseif ($skey == 4):
		    			 $badge_color = "bg-success";
		    		elseif ($skey == 5):
		    			 $badge_color = "bg-secondary";
		    		endif
		    	?>
	        		<?php if ($skey != 1) { ?>
	        			
			            <div class="tasks" data-plugin="dragula" data-containers="[&quot;task-list-one&quot;, &quot;task-list-two&quot;, &quot;task-list-three&quot;, &quot;task-list-four&quot;]">
			                <h5 class="mt-0 task-header">
			                	<?php echo Request::STATUS[$skey] ?> 
			                	<?php 

			                		//pre_r($tasks->id); 
			                	?>
			                </h5>
			                
			                <div id="task-list-one" class="task-list-items">
			                	<?php if ($tasks != '') {?>
				                    <!-- Task Item -->
				                    <?php foreach ($tasks as $key => $task) { 
				                    	$request = Request::find_by_id($task->request_id);
				                    	// pre_r($task);
				                    ?>

				                    	<?php if ($request->status  == $skey) { 
				                    		$allRequest = Request::find_by_id($task->request_id) ?? 'Not Set';
				                    	?>
						                    <div class="card mb-0">
						                    	<div></div>	
						                        <div class="card-body p-3">
						                            <small class="float-end text-muted"><?php echo date('d/m/Y h:i:a', strtotime($task->created_at)) ?>
								                        <!-- 18 Jul 2018 -->
								                    </small>
						                            <span class="badge <?php echo $badge_color ?>"><?php echo Request::STATUS[$skey] ?></span>

						                            <h5 class="mt-2 mb-2">
						                                <a href="#" data-id="<?php echo $allRequest->id ?>" class="task-detail text-body"><?php echo $allRequest->trans_type ?></a>
						                            </h5>

						                            <p class="mb-0">
						                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
						                                    <!-- <i class="mdi mdi-briefcase-outline text-muted"></i> -->
						                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
						                                    <?php echo $allRequest->full_name(); ?>
						                                </span>
						                                <span class="text-nowrap mb-2 d-inline-block">
						                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
						                                    <b></b> <small><?php echo date('d/m/Y h:i:a', strtotime($allRequest->created_at)) ?></small>
						                                </span>
						                            </p>

						                            <div class="dropdown float-end">
						                                <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
						                                    <i class="mdi mdi-dots-vertical font-18"></i>
						                                </a>
						                                <div class="dropdown-menu dropdown-menu-end">
						                                    <!-- item-->
						                                    <a href="javascript:void(0);" data-id="<?php echo $allRequest->id ?>"  class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Update Status</a>
						                                    <!-- item-->
						                                   
						                                </div>
						                            </div>

						                            <p class="mb-0">
						                                <!-- <img src="assets/images/users/avatar-2.jpg" alt="user-img" class="avatar-xs rounded-circle me-1"> -->
						                                <?php //echo $allRequest->id; ?>
						                                <span class="align-middle"><?php echo $allRequest->req_no; ?></span>
						                            </p>
						                        </div> <!-- end card-body -->
						                    </div>
					                    <?php } ?>
				                	<?php } ?>
				                    <!-- Task Item End -->
				                <?php } ?>

			                    
			                    
			                </div> <!-- end company-list-1-->
			            </div>
			        	
			        <?php } ?>
			    <?php } ?>
	            

	        </div> <!-- end .board-->
	    </div> <!-- end col -->
	</div>
<div class="modal fade task-modal-content show" id="task-detail-modal" tabindex="-1" aria-labelledby="TaskDetailModalLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content display">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Center modal -->

<div class="modal fade" id="update-status-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-right w-25">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Update Status</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body data_status ">
            	<form class="row" id="form">
            		<div class="col-lg-12">
            			<input type="hidden" id="request_id" class="form-control" name="request_id">
            		</div>
	                <div class="col-lg-12 my-2 ">
	                	<label>Status</label>
	                	<select required class="form-control" name="status" id="dstatus">
	                		<option value="">Select Status</option>
	                		<?php foreach (Request::STATUS as $key => $value) { ?>
	                			
	                			<?php if (!in_array($key, [1,2])) { ?>
	                				<option value="<?php echo $key ?>"><?php echo $value ?></option>
	                			<?php } ?>
	                		<?php } ?>
	                	</select>
	                </div>  
	                <div class="col-lg-12 my-2 d-none assign_notary">
	                	<label>Notary</label>
	                	<select class="form-control" name="notary_no" id="assign_notary">
	                		<option value="">Select Status</option>
	                		<?php foreach (Notary::find_by_undeleted() as $key => $value) { ?>
	                			
	                			<?php if ($value->notary_no != "") { ?>
	                				<option value="<?php echo $value->id ?>"><?php echo Notary::find_by_id($value->id)->full_name(); ?></option>
	                			<?php } ?>
	                		<?php } ?>
	                	</select>
	                </div>
	                <div class="col-lg-12 my-2 d-none trans_cost">
	                	<label>Transaction Cost</label>
	                	<input type="number" name="trans_cost" class="form-control" id="trans_cost">
	                	
	                </div>
	                <div class="col-lg-12 my-2 d-none reason">
	                	<label>Reason</label>
	                	<textarea class="form-control" style="height: 150px" name="reason" id="reason"></textarea>
	                		
	                </div>
	                <div class="col-lg-12 my-2">
	                	<div class="text-center">
	                		<button class="btn btn-primary">Update</button>
	                	</div>
	                </div>
	            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<input type='hidden' id='eUrl' value='<?php echo url_for('/') ?>' />
<?php include(SHARED_PATH . '/admin_footer.php');?>

<script type="text/javascript">
	$(document).on("click", ".dropdown-item", function(e) {
		$("#update-status-modal").modal("show");
		var eid = $(this).data('id');
		$("#request_id").val(eid);
	})
	$(document).on('change', '#dstatus', function () {
        var selected = $(this).find(":selected").val();
        console.log(selected);
        if (selected == 3) {
            $(".assign_notary").removeClass("d-none");
            $("#assign_notary").prop('required',true);
        }else{
            $(".assign_notary").addClass("d-none");
            $("#assign_notary").prop('required',false)
            $("#assign_notary").find(":selected").val('')
        }
        
        if (selected == 4) {
            $(".trans_cost").removeClass("d-none");
            $("#trans_cost").prop('required',true);
        }else{
            $(".trans_cost").addClass("d-none");
            $("#trans_cost").prop('required',false)
            $("#trans_cost").find(":selected").val('')
        }
        
        if (selected == 5) {
            $(".reason").removeClass("d-none");
            $("#reason").prop('required',true);
        }else{
            $(".reason").addClass("d-none");
            $("#reason").prop('required',false)
        }
    });
	$(document).on("submit", "#form", function(e) {
		e.preventDefault()
		$.ajax({
            url: 'update-status.php',
            method:"POST",
            data: $("#form").serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                	$("#update-status-modal").modal("hide");
                	successAlert(data.msg); 
                	var firstname = data.firstname;
                	var lastname = data.lastname;
                	var email = data.email;
                	var status = data.status;
                	if (status == 4) {
                		surveyMessage(firstname, lastname, email);
                	}
                	
                	location.reload();
                }else{
                	errorAlert(data.msg)
                }
            }
        })
	})
	$(document).on("click", ".task-detail", function(e) {
		$("#task-detail-modal").modal("show");
		var eid = $(this).data('id');
		$.ajax({
            url: 'task-details.php',
            method:"POST",
            data: {
                task_info: 1,
                id: eid,
            },
            success: function (data) {
                $(".display").html(data)
            }
        })
	})
	var eUrl = $('#eUrl').val();
	function surveyMessage(firstname, lastname, email){
        $.ajax({
            url: eUrl + '/processor/surveyMessage.php',
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