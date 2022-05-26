<?php require_once('private/initialize.php');
include('header1.php');
// pre_r(Blog::find_by_undeleted());
?>

<!--header section end-->
<!--body content wrap start-->
<style>
    .custom-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        color: #343a40;
    }
</style>

<div class="main">
    <section class="ptb-100">
        <div class="container">
            <div class="row mt-5">
                <!-- blog section  -->
                <div class="col-lg-9 col-md-8 pr-lg-5">
                    <?php foreach (Blog::find_by_undeleted() as $key => $value) { ?>
                        <div class="card mb-5 shadow border-0">
                            <img src="img\blog\<?php echo $value->image ?>" class="card-img-top" alt="blog image">
                            <div class="card-body">
                                <h5 class="card-title text-primary"> <?php echo $value->title ?></h5>
                                <p class="card-text"> <?php echo $value->summary ?> </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="ti-timer mr-2 small"></span>
                                        <span class="small">Created: <?php echo date('M j, g:i a', strtotime($value->created_at)) ?></span>
                                    </div>
                                    <div>
                                        <a href=" <?php echo $value->slug ?>" class="btn btn-primary py-1">Read More &#129062;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- side bar for article titles -->
                <div class="col-lg-3 col-md-4 bg-white">
                    <div class="shadow-sm p-3">
                        <h4 class="text-primary">Relevant Articles</h4>
                        <hr>
                        <ul class="list-unstyled support-list">
                            <?php foreach (Blog::find_by_undeleted() as $key => $value) { ?>
                                <li class="d-flex align-items-start my-2">
                                    <span class="ti-check-box mr-2"></span>
                                    <a href="<?php echo $value->slug ?>" class="text-secondary small"> <?php echo $value->title ?> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>