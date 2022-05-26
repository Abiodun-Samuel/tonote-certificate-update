<?php require_once('../../../../private/initialize.php');
$id =  $_POST['id'];
// $id =  $_POST['id'] ?? 1;
$blog = Blog::find_by_id($id);
?>
<input type="hidden" name="id" id="blog_id" value="<?php echo $blog->id; ?>">
<div class="row">

   <div class="error d-none"></div>

   <form class="ps-3 pe-3 row" id="form" enctype="multipart/form-data">
      <div class="mb-3 col-12">
         <label for="title" class="form-label">Blog Title</label>
         <input class="form-control" name="title" type="text" id="title" required="" value="<?php echo $blog->title ?>" placeholder="Blog Title">
      </div>

      <div class="mb-3 col-12">
         <label for="slug" class="form-label">Blog URL</label>
         <input class="form-control" name="slug" type="text" required="" value="<?php echo $blog->slug ?>" id="slug" placeholder="Enter your blog url">
      </div>

      <div class="mb-3 col-lg-6 col-md-6">
         <label for="image" class="form-label">Blog Image</label>
         <input class="form-control" type="file" name="imageupload" accept="image/*" required="" id="img_input">
         <div class="image mt-2 position-relative"></div>
      </div>

      <div class="mb-3 col-lg-6 col-md-6">
         <label for="created_by" class="form-label">Created By</label>
         <input class="form-control" name="created_by" type="text" required="" value="<?php echo $blog->created_by ?>" id="created_by" placeholder="Enter your blog author">
      </div>

      <div class="mb-3 col-12">
         <label for="summary" class="form-label">Blog Summary</label>
         <textarea name="summary" id="" cols="30" rows="5" class="form-control" require=""><?php echo $blog->summary ?></textarea>
      </div>
   </form>
</div>

<?php ?>