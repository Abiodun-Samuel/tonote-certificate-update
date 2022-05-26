<?php
require_once('../../../private/initialize.php');

$page = 'Blog';
$page_title = 'All Blogs';
include(SHARED_PATH . '/admin_header.php');
?>
<?php


?>

<!-- Datatables css -->
<link href="<?php echo url_for('assets/css/vendor/dataTables.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo url_for('assets/css/vendor/responsive.bootstrap5.css') ?>" rel="stylesheet" type="text/css" />

<div class="row">
   <div class="d-flex justify-content-between py-2">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blog-modal">Add New Blog</button>
   </div>
   <div class="col-12">

      <div class="card">
         <div class="card-body">

            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
               <thead>
                  <tr>
                     <th>S/N.</th>
                     <th>Title</th>
                     <th>Slug</th>
                     <th>Created At</th>
                     <th>Action</th>
                  </tr>
               </thead>

               <tbody>
                  <?php
                  foreach (Blog::find_by_undeleted() as $key => $value) {
                  ?>
                     <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $value->title ?></td>
                        <td><?php echo $value->slug ?></td>
                        <td><?php echo date('M j, Y, g:i a', strtotime($value->created_at)) ?></td>
                        <td>
                           <button data-id="<?php echo $value->id ?>" class="btn btn-outline-info btn-sm update">Update</button>
                           <a href="<?php echo url_for('public/blog/delete.php?id=' . $value->id) ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>


<div id="blog-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">

         <div class="modal-body">
            <div class="text-center mt-2 mb-4">
               <a href="index.html" class="text-success">
                  <span><img src="<?php echo url_for('assets/images/logo-dark.png') ?>" alt="" height="18"></span>
               </a>
            </div>
            <div class="error d-none"></div>

            <form class="ps-3 pe-3 row" id="form" enctype="multipart/form-data">

               <div class=" mb-3 col-12">
                  <label for="title" class="form-label">Blog Title</label>
                  <input class="form-control" name="title" type="text" id="title" required="" placeholder="Blog Title">
               </div>

               <div class="mb-3 col-12">
                  <label for="slug" class="form-label">Blog URL</label>
                  <input class="form-control" name="slug" type="text" required="" id="slug" placeholder="Enter your blog url">
               </div>

               <div class="mb-3 col-lg-6 col-md-6">
                  <label for="image" class="form-label">Blog Image</label>
                  <input class="form-control" type="file" name="imageupload" accept="image/*" required="" id="image">
                  <div class="image mt-2 position-relative"></div>
               </div>

               <div class="mb-3 col-lg-6 col-md-6">
                  <label for="created_by" class="form-label">Created By</label>
                  <input class="form-control" name="created_by" type="text" required="" id="created_by" placeholder="Enter your blog author">
               </div>

               <div class="mb-3 col-12">
                  <label for="summary" class="form-label">Blog Summary</label>
                  <textarea name="summary" id="" cols="30" rows="5" class="form-control" require=""></textarea>
               </div>

               <div class="mb-3 text-center">
                  <button class="btn btn-primary" type="submit" name="submit">Create New Blog</button>
               </div>
            </form>
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
                  <h3 class="text-center">Edit Blog</h3>
               </a>
            </div>

            <form id="updateform" class="ps-3 pe-3" action="#">
               <div id="showData"></div>
               <div class="mb-3 text-center">
                  <button class="btn btn-primary" type="submit">Update Blog</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>

<!-- Datatables js -->
<script src="<?php echo url_for('assets/js/vendor/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.bootstrap5.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/vendor/responsive.bootstrap5.min.js') ?>"></script>

<!-- Datatable Init js -->
<script src="<?php echo url_for('assets/js/pages/demo.datatable-init.js') ?>"></script>

<script type="text/javascript">
   $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      var image = document.getElementById('output');
      var source = URL.createObjectURL(e.target.files[0]);
      $('.image').html(`<span class="text-white delete py-0 px-1 btn btn-danger position-absolute" style="top:0px; right:0px">X</span><img id="output" src="${source}" width="100%" height="auto" />`)
   });

   $(document).on("click", ".delete", function(e) {
      var image_input = document.getElementById('image');
      $(".image").empty();
      image_input.value = null;
   })

   $(document).on("submit", "#form", function(e) {
      e.preventDefault();
      $.ajax({
         url: 'components/createBlog.php',
         method: "POST",
         // data: $(this).serialize(),
         dataType: "json",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function(data) {
            console.log(data)
            if (data.success == true) {
               successAlert(data.msg);
               $("#blog-modal").modal('hide');
               // window.location.reload()
            } else {
               errorAlert(data.msg);
               $(".error").removeClass('d-none');
               $(".error").html(data.msg);
            }
         }
      })
   })

   $(document).on("click", ".update", function(e) {
      $("#updateModal").modal('show');
      var blog_id = $(this).data('id');
      $.ajax({
         url: 'components/edit_form.php',
         method: "POST",
         data: {
            update: 1,
            id: blog_id,
         },
         success: function(data) {
            $("#showData").html(data)

            $('input[type="file"]').change(function(e) {
               var fileName = e.target.files[0].name;
               var image = document.getElementById('output');
               var source = URL.createObjectURL(e.target.files[0]);
               $('.image').html(`<span class="text-white delete py-0 px-1 btn btn-danger position-absolute" style="top:0px; right:0px">X</span><img id="output" src="${source}" width="100%" height="auto" />`)
            });

            $(document).on("click", ".delete", function(e) {
               var img_input = document.getElementById('img_input');
               $(".image").empty();
               img_input.value = null;
            })
         }
      })
   })

   $(document).on("submit", "#updateform", function(e) {
      e.preventDefault();
      $.ajax({
         url: 'components/process_update.php',
         method: "POST",
         // data: $(this).serialize(),
         dataType: 'json',
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function(data) {
            if (data.success == true) {
               successAlert(data.msg);
               $("#updateModal").modal('hide');
               window.location.reload();
            } else {
               errorAlert(data.msg);
            }
         }
      })
   })
</script>