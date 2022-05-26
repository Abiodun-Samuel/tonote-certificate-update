<?php 
	require_once('../../../private/initialize.php');

$page = 'Admin';
$page_title = 'All';
include(SHARED_PATH . '/admin_header.php'); 

?>
<!-- Datatables css -->
<link href="<?php echo url_for('assets/css/vendor/dataTables.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url_for('assets/css/vendor/responsive.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
	
	<div class="row">
	    <div class="d-flex justify-content-between py-2">
			<a href="<?php echo url_for('public/users/exportData.php') ?>" class="btn btn-success"> <i class="fa fa-file-excel-o"></i> Export CSV</a>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">Create User</button>
		</div>
		<div class="col-12">
			
			<div class="card">
				<div class="card-body">
					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
					    <thead>
					        <tr>
					            <th>s/n.</th>
					            <th>Date</th>
					            <th>Name</th>
					            <th>Email</th>
					            <th>Role</th>
					            <th>Action</th>
					        </tr>
					    </thead>


					    <tbody>
					    	<?php $sn = 1; foreach (Admin::find_by_undeleted() as $key => $value) { 
					    		
					    	?>
					        <tr>
					        	<td><?php echo $sn++ ?></td>
					            <td><?php echo date('M j, Y, g:i a', strtotime($value->created_at)) ?></td>
					            <td><?php echo $value->first_name ." ". $value->last_name; ?></td>
					            <td><?php echo $value->email; ?></td>
					            <td><?php echo Admin::ADMIN_LEVEL[$value->admin_level]; ?></td>
		            			<td>
		            				<button data-id="<?php echo $value->id ?>" class="btn btn-outline-info btn-sm update">Update</button>
		            				<button class="btn btn-outline-danger btn-sm">Delete</button>
		            			</td>
					           
					        </tr>
					        <?php } ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">

	            <div class="modal-body">
	                <div class="text-center mt-2 mb-4">
	                    <a href="index.html" class="text-success">
	                        <span><img src="<?php echo url_for('assets/images/logo-dark.png') ?>" alt="" height="18"></span>
	                    </a>
	                </div>
	                <div class="error d-none"></div>

	                <form class="ps-3 pe-3 row" id="form">
	                	<div class="mb-3 col-lg-6 col-md-6">
	                        <label for="firstname" class="form-label">Role</label>
	                        <select class="form-control" name="admin_level"  type="text" id="admin_level" required="">
	                        	<option value="">Select Role</option>
	                        	<?php foreach (Admin::ADMIN_LEVEL as $key => $value) { ?>
	                        		<option value="<?php echo $key ?>"><?php echo $value ?></option>
	                        	<?php } ?>
	                        	
	                        </select>
	                    </div>
	                    <div class="mb-3 col-lg-6 col-md-6">
				            <label for="firstname" class="form-label">Process Request</label>
				            <select class="form-control" name="process_request"  type="text" id="process_request" required="">
				                <option value="">Select </option>
				                <?php foreach (Admin::PROCESS_REQUEST as $key => $value) { ?>
				                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
				                <?php } ?>
				                
				            </select>
				        </div>
	                    <div class="mb-3 col-lg-6 col-md-6">
	                        <label for="firstname" class="form-label">Firstname</label>
	                        <input class="form-control" name="first_name"  type="text" id="firstname" required="" placeholder="Michael">
	                    </div>
	                    <div class="mb-3 col-lg-6 col-md-6">
	                        <label for="lastname" class="form-label">Lastname</label>
	                        <input class="form-control"  name="last_name" type="text" id="lastname" required="" placeholder=" Zenaty">
	                    </div>

	                    <div class="mb-3 col-12">
	                        <label for="emailaddress" class="form-label">Email address</label>
	                        <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="john@deo.com">
	                    </div>

	                    <div class="mb-3 col-lg-6 col-md-6">
	                        <label for="password" class="form-label">Password</label>
	                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
	                    </div>
	                    <div class="mb-3 col-lg-6 col-md-6">
	                        <label for="password" class="form-label">Confirm Password</label>
	                        <input class="form-control" name="confirm_password" type="password" required="" id="password" placeholder="Enter your password">
	                    </div>

	                    

	                    <div class="mb-3 text-center">
	                        <button class="btn btn-primary" type="submit">Create Account</button>
	                    </div>

	                </form>

	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">

	            <div class="modal-body">
	                <div class="text-center mt-2 mb-4">
	                    <a href="index.html" class="text-success">
	                        <span><img src="<?php echo url_for('assets/images/logo-dark.png') ?>" alt="" height="18"></span>
	                        <h3 class="text-center">Edit User</h3>
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
            url: 'components/edit_form.php',
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
            url: 'components/process_update.php',
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

	$(document).on("submit", "#form", function(e) {
		e.preventDefault();
		$.ajax({
            url: 'components/createUser.php',
            method:"POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                if (data.success == true) {
                	 successTime(data.msg);
                	 // $(".signup-modal").modal('hide');
                	 CreateUserMail(data.email, data.firstname, data.lastname, data.password)
                }else{
                    // errorAlert(data.msg);
                    $(".error").removeClass('d-none');
                    $(".error").html(data.msg);
                }
            }
        })
	})

	function CreateUserMail(email, firstname, lastname, password){
        $.ajax({
            url: '../../processor/CreateUserMail.php',
            method:"POST",
            data: {
                CreateUserMail: 1,
                email: email,
                firstname: firstname,
                lastname: lastname,
                password: password,
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
</script>

<!-- Datatables js -->
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>

<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>