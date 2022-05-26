<?php 
	require_once('../../../private/initialize.php');

$page = 'Trial Signup';
$page_title = 'Trial Signup';
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
					            <!-- <th>Fullname.</th> -->
					            <th>Email</th>
					            <th>Occupation</th>
					            <th>Company</th>
					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (FreeTrailSubscription::find_by_undeleted() as $key => $value) { ?>
					        <tr>
					        	<td><?php echo $sn++ ?></td>
					        	<!-- <td><?php //echo $value->fullname ?? '' ?></td> -->
					            <td><?php echo $value->email ?></td>
					            <td><?php echo $value->occupation ?></td>
					            <td><?php echo $value->company ?></td>
					            
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