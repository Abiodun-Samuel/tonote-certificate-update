<?php 
	require_once('../../../private/initialize.php');

?>

<?php if (isset($_POST['task_info'])) { 
	$allRequest = Request::find_by_id($_POST['id']);
	$task = Task::find_by_request_id($_POST['id'])[0];
	// pre_r($allRequest->status);
	if ($task->status == 1) :
		$badge_color = "bg-danger";
	elseif ($task->status == 2):
		 $badge_color = "bg-warning";
	elseif ($task->status == 3):
		 $badge_color = "bg-primary";
	elseif ($task->status == 4):
		 $badge_color = "bg-success";
	elseif ($task->status == 5):
		 $badge_color = "bg-secondary";
	endif
?>
	<div class="modal-header">
		<?php //echo $allRequest->status ?>
        <h4 class="modal-title" id="TaskDetailModalLabel"><?php echo $allRequest->trans_type ?> <span class="badge <?php echo $badge_color ?> ms-2"><?php echo Request::STATUS[$allRequest->status] ?></span></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    
        <div class="p-2 " >
			<h5 class="mt-0">
				<?php echo Request::find_by_id($allRequest->id)->full_name() ?> | 
				<?php echo Request::find_by_id($allRequest->id)->email ?> |
				<?php echo Request::find_by_id($allRequest->id)->phone ?>
			</h5>

		    <!-- <p class="text-muted mb-4">
		        Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
		        libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
		        as a natural lead-in to additional contenposuere erat a ante.
		    </p> -->

		    <div class="row">
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Request No.</h5>
		                <!-- 17 March 2018 1:00 PM -->
		                <p>
		                	<?php echo $allRequest->req_no; ?></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Assigned to me on</h5>
		                <p><?php echo date('d M Y', strtotime($task->created_at)) ?> 
		                <small class="text-muted"><?php echo date('h:i:a', strtotime($task->created_at)) ?></small></p>
		            </div>
		        </div>

		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Create Date</h5>
		                <!-- 17 March 2018 1:00 PM -->
		                <p>
		                	<?php echo date('d M Y', strtotime($allRequest->created_at)) ?>
		                	<small class="text-muted"><?php echo date('h:i:a', strtotime($allRequest->created_at)) ?></small></p>
		            </div>
		        </div>
		        
		    </div>
		    <div class="row">
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Date of Birth.</h5>
		                <p><?php echo $allRequest->dob ?? ''; ?></p>
		            </div>
		        </div>

		        <div class="col-md-4">
			        <div class="mb-4">
		                <h5>Nationality.</h5>
		                <p>
		                	<?php echo $allRequest->nationality ?? ''; ?></p>
		            </div>
		        </div>
		    
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>ID Type.</h5>
		                <p>
		                	<?php echo $allRequest->id_type ?? ''; ?></p>
		            </div>
		        </div>
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>ID Number</h5>
		                <p><?php echo $allRequest->id_number ?? '';?> </p>
		            </div>
		        </div>

		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Delivery Option</h5>
		                <p>
		                	<?php echo $allRequest->delivery_option ?></p>
		            </div>
		        </div>
		        <?php if($task->notary_no != ""){ ?>
		        <div class="col-md-4">
		            <div class="mb-4">
		                <h5>Notary</h5>
		                <p>
		                	<?php echo Notary::find_by_id($task->notary_no)->full_name() ?? ""; ?></p>
		            </div>
		        </div>
		    	<?php } ?>
		        
		    </div>
		    <!-- end row-->

		    <ul class="nav nav-tabs nav-bordered mb-3">
		       <!--  <li class="nav-item">
		            <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
		                Comments
		            </a>
		        </li> -->
		        <li class="nav-item">
		            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
		                Files
		            </a>
		        </li>
		    </ul>

		    <div class="tab-content">
				<div class="tab-pane active" id="profile-b1">
			        <div class="card mb-1 shadow-none border">
			            <div class="p-2">
			                <div class="row align-items-center">
			                    <div class="col-auto">
			                        <div class="avatar-sm">
			                            <span class="avatar-title rounded">
			                                 <?php 
				                                $data = $allRequest->documents;   
												$whatIWant = substr($data, strpos($data, ".") + 1);    
												echo ".". $whatIWant;
											?>
			                            </span>
			                        </div>
			                    </div>
			                    <div class="col ps-0">
			                        <a href="javascript:void(0);" class="text-muted fw-bold"><?php echo $allRequest->id_card_image ?></a>
			                        <!-- <p class="mb-0">2.3 MB</p> -->
			                    </div>
			                    <div class="col-auto">
			                        <!-- Button -->
			                        <a href="<?php echo '../../../inc/uploads/request/'.$allRequest->id_card_image; ?>" target="_blank" class="btn btn-link btn-lg text-muted">
			                            <i class="dripicons-download"></i>
			                        </a>
			                    </div>
			                </div>
			            </div>
			        </div>

			        <div class="card mb-1 shadow-none border">
			            <div class="p-2">
			                <div class="row align-items-center">
			                    <div class="col-auto">
			                        <div class="avatar-sm">
			                            <span class="avatar-title rounded">
			                                 <?php 
				                                $data = $allRequest->documents;   
												$whatIWant = substr($data, strpos($data, ".") + 1);    
												echo ".". $whatIWant;
											?>
			                            </span>
			                        </div>
			                    </div>
			                    <div class="col ps-0">

			                        <a href="javascript:void(0);" class="text-muted fw-bold"><?php echo $allRequest->photo ?></a>
			                        <!-- <p class="mb-0">3.25 MB</p> -->
			                    </div>
			                    <div class="col-auto">
			                        <!-- Button -->
			                        <a href="<?php echo '../../../inc/uploads/request/'.$allRequest->photo; ?>" target="_blank" class="btn btn-link btn-lg text-muted">
			                            <i class="dripicons-download"></i>
			                        </a>
			                    </div>
			                </div>
			            </div>
			        </div>

			        <div class="card mb-0 shadow-none border">
			            <div class="p-2">
			                <div class="row align-items-center">
			                    <div class="col-auto">
			                        <div class="avatar-sm">
			                            <span class="avatar-title bg-secondary rounded">
			                                <!-- .MP4 -->
			                                <?php 
				                                $data = $allRequest->documents;   
												$whatIWant = substr($data, strpos($data, ".") + 1);    
												echo ".". $whatIWant;
											?>
			                            </span>
			                        </div>
			                    </div>
			                    <div class="col ps-0">
			                        <a href="javascript:void(0);" class="text-muted fw-bold"><?php echo $allRequest->documents ?></a>
			                        <!-- <p class="mb-0">7.05 MB</p> -->
			                    </div>
			                    <div class="col-auto">
			                        <!-- Button -->
			                        <a href="<?php echo '../../../inc/uploads/request/'.$allRequest->documents; ?>" target="_blank" class="btn btn-link btn-lg text-muted">
			                            <i class="dripicons-download"></i>
			                        </a>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div> <!-- .p-2 -->
    </div>
<?php } ?>