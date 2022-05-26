<?php 
	require_once('../../../private/initialize.php');

$page = 'Business User';
$page_title = 'All Members';
include(SHARED_PATH . '/admin_header.php'); 

?>
	<div class="row">
		<div class="col-12">
			<a href="<?php echo url_for('public/business-user/exportData.php') ?>" class="btn btn-success my-2"> <i class="fa fa-file-excel-o"></i> Export CSV</a>
			<div class="card">
				<div class="card-body">

					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
					    <thead>
					        <tr>
					            <th>s/n</th>
					            <th>Email</th>
					            <th>Company Name</th>
					            <th>Company Address</th>
					            <th>Phone</th>
					            <th>Rc. No.</th>
					            <th>Member Since </th>
					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (BusinessUser::find_by_undeleted() as $key => $value) { ?>
					        <tr>
					            <td><?php echo $sn++ ?>.</td>
					            <td><?php echo $value->email ?></td>
					            <td><?php echo $value->company_name ?></td>
					            <td><?php echo $value->company_address ?></td>
					            <td><?php echo $value->phone ?></td>
					            <td><?php echo $value->rc_number ?></td>
					            <td><?php echo date('M j, Y, g:i a', strtotime($value->created_at)) ?></td>
					        </tr>
					       <?php } ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


<?php include(SHARED_PATH . '/admin_footer.php');?>
<!-- Datatables js -->
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>

<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>