<?php 
	require_once('../../../private/initialize.php');

$page = 'Request';
$page_title = 'All';
include(SHARED_PATH . '/admin_header.php'); 

?>
<!-- Datatables css -->
<link href="<?php echo url_for('assets/css/vendor/dataTables.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url_for('assets/css/vendor/responsive.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<style type="text/css">
	.mylink:hover{
		color: darkblue !important;
		text-decoration: underline;
	}
</style>
	<div class="row">
		<?php foreach (Notary::STATUS as $key => $value) { 
    		if ($key == 2) :
    			$badge_color = "btn-success";
    		elseif ($key == 1):
    			 $badge_color = "btn-danger";
    		endif
		?>
		<div class="col-lg-2 col-md-3 col-sm-6">
			<div class="card">
				<div class="card-body d-flex justify-content-between ">
					<div><span class="text-dark h5"><?php echo $value ?></span> </div>

					<div><span class="btn rounded-pill <?php echo $badge_color ?>"><?php echo count(Notary::find_by_status($key)); ?></span></div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<a href="<?php echo url_for('public/notaries/exportData.php') ?>" class="btn btn-success my-2"> <i class="fa fa-file-excel-o"></i> Export CSV</a>
	<div class="row">
		<!-- <div class="col-12"></div> -->

		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
					    <thead>
					        <tr>
					            
					            <th>s/n.</th>
					            <th>Notary No.</th>
					            <th>Date</th>
					            <th>Status</th>
					            <th>Name</th>
					            <th>Email</th>
					            <th>Phone</th>
					            <th>Supreme Court No.</th>
					            <th>Business Address</th>
					            <!-- <th>language</th> -->
					            <th>Others</th>
					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (Notary::find_by_undeleted() as $key => $value) { 
					    		// pre_r($value);
					    		$status = $value->status;
					    		if ($status == 2) :
					    			$badge_color = "badge-success-lighten";
					    		elseif ($status == 1):
					    			 $badge_color = "badge-danger-lighten";
					    		endif
					    		
					    	?>
					        <tr>
					        	<td><?php echo $sn++ ?></td>
					        	<td><?php echo $value->notary_no ?? '' ?></td>
					            <td><?php echo date('M j, Y, g:i a', strtotime($value->created_at)) ?></td>
					            <td><span class="badge <?php echo $badge_color ?>"><?php echo Notary::STATUS[$value->status] ?? '' ?></span></td>
					            <td><?php echo $value->firstname ." ". $value->lastname; ?></td>
					            <td><?php echo $value->email ?></td>
					            <td><?php echo $value->phone ?></td>
					            <td><?php echo $value->supreme_court_no ?></td>
					            <td><?php echo $value->business_address ?></td>
					            <!-- <td><?php //echo $value->language ?></td> -->
					            <td>
					            	<table>
					            		
					            		
					            		<tr>
					            			<td>Gender:</td>
					            			<td ><?php echo $value->gender ?></td>
					            		</tr>
					            		
					            		
					            		
					            		<tr>
					            			<td>Action:</td>
					            			<td class="p-2">
					            			    <?php if ($value->notary_no == '') { ?>
					            				<button data-id="<?php echo $value->id; ?>" class="btn btn-outline-primary btn-sm process">Confirm</button>
					            				<?php } ?>
					            				<button data-id="<?php echo $value->id ?>" class="btn btn-outline-info btn-sm update">Update</button>
					            				<button class="btn btn-outline-danger btn-sm">Delete</button>
					            			</td>
					            		</tr>
					            		
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

<div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <a href="index.html" class="text-success">
                        <span><img src="<?php echo url_for('assets/images/logo-dark.png') ?>" alt="" height="18"></span>
                        <h3 class="text-center">Update Notary's Data</h3>
                    </a>
                </div>

                <form id="updateform" class="ps-3 pe-3" action="#">
                	
                    <div id="showData"></div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php include(SHARED_PATH . '/admin_footer.php');?>
<script type="text/javascript">
	$(document).on("click", ".update", function(e) {
		$("#updateModal").modal('show');
		var user_id = $(this).data('id');
		$.ajax({
            url: 'edit_form.php',
            method:"POST",
            data: {
                update: 1,
                id: user_id,
            },
            success: function (data) {
                $("#showData").html(data)
            }
        })
	})
	$(document).on("submit", "#updateform", function(e) {
		e.preventDefault();
		$.ajax({
            url: 'process_update.php',
            method:"POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
            	if (data.success == true) {
                	successAlert(data.msg);
                	$("#updateModal").modal('hide');
                }else{
	            	errorAlert(data.msg);
	            }
            }
        })
	})
	
	$(document).on("click", ".process", function(e) {
		var eid = $(this).data('id');
		$.ajax({
            url: 'verify_notary.php',
            method:"POST",
            data: {
                verify: 1,
                id: eid,
            },
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                	successAlert(data.msg);
                	var firstname = data.firstname;
                	var email = data.email;
                	welcomeNotary(firstname, email);
                	location.reload();
                }else{
                	errorAlert(data.msg);
                }
            }
        })
		
	})

	function welcomeNotary(firstname, email){
		$.ajax({
            url: '../../processor/welcomeNotary.php',
            method:"POST",
            data: {
                welcome: 1,
                firstname: firstname,
                email: email,
            },
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                	 successTime(data.msg);
                }else{
                    errorAlert(data.msg);
                }
            }
        })
	}


</script>
<!-- Datatables js -->
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>

<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>