<?php 
    require_once('../../../private/initialize.php');



if (!isset($_GET['id'])) {
  redirect_to(url_for('public/notaries/index.php'));
}
$id = $_GET['id'];
$notaries = Request::find_by_id($id);
if ($notaries == false) {
  redirect_to(url_for('public/notaries/index.php'));
}

if (is_post_request()) {

  // logfile
  log_action('Delete notaries', "id: {$notaries->id}, Deleted by {$loggedInAdmin->full_name()}", "notaries");

  // Delete notaries
  $result = $notaries->deleted($id);
  $session->message('The notary was deleted successfully.');
  redirect_to(url_for('public/notaries/index.php'));
} else {
  // Display form
}


$page = 'notaries';
$page_title = 'Notary';
include(SHARED_PATH . '/admin_header.php'); 

?>

<!-- Datatables css -->
<link href="<?php echo url_for('assets/css/vendor/dataTables.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url_for('assets/css/vendor/responsive.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
    
    <div class="row">
         <div class="card text-center p-4">
            <!-- <h1>Delete company</h1> -->
            <p>Are you sure you want to delete this Notary ?</p>
            <p class="item"><?php echo h($notaries->trans_type); ?></p>

            <form action="<?php echo url_for('public/notaries/delete.php?id=' . h(u($id))); ?>" method="post">
              <div id="operations" class="btn-group">
                <input type="submit" name="commit" class="btn btn-sm btn-danger border-0" value="Yes" />
                <a href="<?php echo url_for('public/notaries/index.php'); ?>" class="btn btn-sm btn-dark">No</a>
              </div>
            </form>
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