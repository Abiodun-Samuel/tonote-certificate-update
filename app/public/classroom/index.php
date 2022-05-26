<?php 
	require_once('../../../private/initialize.php');

$page = 'Classroom';
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
	
	<!-- <a href="<?php //echo url_for('public/notaries/exportData.php') ?>" class="btn btn-success my-2"> <i class="fa fa-file-excel-o"></i> Export CSV</a> -->
	<div class="row">
		<!-- <div class="col-12"></div> -->

		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
					    <thead>
					        <tr>
					            
					            <th>s/n.</th>
					            <th>Fullname.</th>
					            <th>Email</th>
					            <th>Commission No.</th>
					            <th>Certificate ID</th>
					            <th>Assessment status</th>
					            <th>Action</th>
					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (Certificate::find_by_undeleted() as $key => $value) { ?>
					        <tr>
					        	<td><?php echo $sn++ ?></td>
					        	<td><?php echo $value->fullname ?? '' ?></td>
					            <td><?php echo $value->email ?></td>
					            <td><?php echo $value->commission_no ?></td>
					            <td><?php echo $value->certificate_no ?></td>
					            <td><?php echo empty($value->certificate_no) ? "<span class='badge-warning-lighten'>Incomplete</span>" : "<span class='badge-success-lighten'>Assessment Incomplete</span>";  ?></td>

					            <td>
					            	<?php if (empty($value->certificate_no)) { ?>
					            		
					            	<?php }else{ ?>
					            		<a href='<?php echo url_for('public/classroom/certificate.php?cert='. $value->certificate_no) ?>' class='btn btn-primary btn-sm'>View Certificate</a>
					            	<?php } ?>
					            </td>
					        </tr>
					        <?php } ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>




<?php include(SHARED_PATH . '/admin_footer.php');?>
<script type="text/javascript">
	


</script>
<!-- Datatables js -->
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>

<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>