<?php 
	require_once('../../../private/initialize.php');

$page = 'Dashboard';
$page_title = 'CRM';
include(SHARED_PATH . '/admin_header.php'); 

?>

<style type="text/css">
    #analytic a > .card:hover{
        background-color: #063bb3;
        color: red;
    }
    #analytic a > .card:hover h5{
        color: #FFF !important;
    }
</style> 
                

                    <div class="row" id="analytic">
                        <a href="<?php echo url_for('public/requests/') ?>" class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="All Request">All Request</h5>
                                            <h3 class="my-2 py-1"><?php echo count(Request::find_by_status()); ?></h3>
                                            <p class="mb-0 text-muted">
                                                <!-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span> -->
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <div id="campaign-sent-chart" data-colors="#3688fc"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </a> <!-- end col -->
    
                        <a href="<?php echo url_for('public/requests/index.php?id=4') ?>" class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Completed Transaction">Completed Transaction</h5>
                                            <h3 class="my-2 py-1"><?php echo count(Request::find_by_status(['status' => 4])); ?></h3>
                                            <p class="mb-0 text-muted">
                                                <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span> -->
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <div id="new-leads-chart" data-colors="#42d29d"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </a> <!-- end col -->

                        <a href="<?php echo url_for('public/notaries/') ?>" class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Notarties">Notarties</h5>
                                            <h3 class="my-2 py-1"><?php echo count(Notary::find_by_undeleted()); ?></h3>
                                            <p class="mb-0 text-muted">
                                                <!-- <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span> -->
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <div id="deals-chart" data-colors="#3688fc"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </a> <!-- end col -->

                        <a href="<?php echo url_for('public/community/') ?>" class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Community member">Community member</h5>
                                            <h3 class="my-2 py-1"><?php echo count(Newsletter::find_by_undeleted()); ?></h3>
                                            <!-- <p class="mb-0 text-muted">
                                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                            </p> -->
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <div id="booked-revenue-chart" data-colors="#42d29d"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </a> <!-- end col -->
                        <a href="<?php echo url_for('public/business-user/') ?>" class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="business member">Business member</h5>
                                            <h3 class="my-2 py-1"><?php echo count(BusinessUser::find_by_undeleted()); ?></h3>
                                            <!-- <p class="mb-0 text-muted">
                                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                            </p> -->
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <div id="booked-revenue-chart" data-colors="#42d29d"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </a> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row d-none">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mb-1">Campaigns</h4>

                                    <div id="dash-campaigns-chart" class="apex-charts" data-colors="#42d29d,#ffa866,#44badc"></div>

                                    <div class="row text-center mt-2">
                                        <div class="col-md-4">
                                            <i class="mdi mdi-send widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                            <h3 class="fw-normal mt-3">
                                                <span>6,510</span>
                                            </h3>
                                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Total Sent</p>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="mdi mdi-flag-variant widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                            <h3 class="fw-normal mt-3">
                                                <span>3,487</span>
                                            </h3>
                                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Reached</p>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="mdi mdi-email-open widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                            <h3 class="fw-normal mt-3">
                                                <span>1,568</span>
                                            </h3>
                                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Opened</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body-->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-->

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                                        </div>
                                    </div>
                                    
                                    <h4 class="header-title mb-3">Revenue</h4>

                                    <div class="chart-content-bg">
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <p class="text-muted mb-0 mt-3">Current Month</p>
                                                <h2 class="fw-normal mb-3">
                                                    <span>$42,025</span>
                                                </h2>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-muted mb-0 mt-3">Previous Month</p>
                                                <h2 class="fw-normal mb-3">
                                                    <span>$74,651</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div dir="ltr">
                                        <div id="dash-revenue-chart" class="apex-charts" data-colors="#42d29d,#44badc"></div>
                                    </div>

                                </div>
                                <!-- end card body-->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->


                    <div class="row d-none">
                        <div class="col-xl-4 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-3">Top Performing</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Leads</th>
                                                    <th>Deals</th>
                                                    <th>Tasks</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-15 mb-1 fw-normal">Jeremy Young</h5>
                                                        <span class="text-muted font-13">Senior Sales Executive</span>
                                                    </td>
                                                    <td>187</td>
                                                    <td>154</td>
                                                    <td>49</td>
                                                    <td class="table-action">
                                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-15 mb-1 fw-normal">Thomas Krueger</h5>
                                                        <span class="text-muted font-13">Senior Sales Executive</span>
                                                    </td>
                                                    <td>235</td>
                                                    <td>127</td>
                                                    <td>83</td>
                                                    <td class="table-action">
                                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-15 mb-1 fw-normal">Pete Burdine</h5>
                                                        <span class="text-muted font-13">Senior Sales Executive</span>
                                                    </td>
                                                    <td>365</td>
                                                    <td>148</td>
                                                    <td>62</td>
                                                    <td class="table-action">
                                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-15 mb-1 fw-normal">Mary Nelson</h5>
                                                        <span class="text-muted font-13">Senior Sales Executive</span>
                                                    </td>
                                                    <td>753</td>
                                                    <td>159</td>
                                                    <td>258</td>
                                                    <td class="table-action">
                                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-15 mb-1 fw-normal">Kevin Grove</h5>
                                                        <span class="text-muted font-13">Senior Sales Executive</span>
                                                    </td>
                                                    <td>458</td>
                                                    <td>126</td>
                                                    <td>73</td>
                                                    <td class="table-action">
                                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-4">Recent Leads</h4>

                                    <div class="d-flex align-items-start">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-2.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-warning-lighten float-end">Cold lead</span>
                                            <h5 class="mt-0 mb-1">Risa Pearson</h5>
                                            <span class="font-13">richard.john@mail.com</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-3">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-3.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-danger-lighten float-end">Lost lead</span>
                                            <h5 class="mt-0 mb-1">Margaret D. Evans</h5>
                                            <span class="font-13">margaret.evans@rhyta.com</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-3">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-4.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-success-lighten float-end">Won lead</span>
                                            <h5 class="mt-0 mb-1">Bryan J. Luellen</h5>
                                            <span class="font-13">bryuellen@dayrep.com</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-3">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-5.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-warning-lighten float-end">Cold lead</span>
                                            <h5 class="mt-0 mb-1">Kathryn S. Collier</h5>
                                            <span class="font-13">collier@jourrapide.com</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-3">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-1.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-warning-lighten float-end">Cold lead</span>
                                            <h5 class="mt-0 mb-1">Timothy Kauper</h5>
                                            <span class="font-13">thykauper@rhyta.com</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mt-3">
                                        <img class="me-3 rounded-circle" src="assets/images/users/avatar-6.jpg" width="40" alt="Generic placeholder image">
                                        <div class="w-100 overflow-hidden">
                                            <span class="badge badge-success-lighten float-end">Won lead</span>
                                            <h5 class="mt-0 mb-1">Zara Raws</h5>
                                            <span class="font-13">austin@dayrep.com</span>
                                        </div>
                                    </div>
                                       
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->  
                        
                        <div class="col-xl-4 col-lg-6">
                            <div class="card cta-box bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-center">
                                        <div class="w-100 overflow-hidden">
                                            <h2 class="mt-0"><i class="mdi mdi-bullhorn-outline"></i>&nbsp;</h2>
                                            <h3 class="m-0 fw-normal cta-box-title">Enhance your <b>Campaign</b> for better outreach <i class="mdi mdi-arrow-right"></i></h3>
                                        </div>
                                        <img class="ms-3" src="assets/images/email-campaign.svg" width="120" alt="Generic placeholder image">
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card-->

                            <!-- Todo-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mb-2">Todo</h4>

                                    <div class="todoapp">
                                        <div data-simplebar style="max-height: 224px">
                                            <ul class="list-group list-group-flush todo-list" id="todo-list"></ul>
                                        </div>
                                    </div> <!-- end .todoapp-->

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->

                        </div>
                        <!-- end col -->  
                    </div>
                    <!-- end row-->

                </div>
                <!-- container -->

                

<?php include(SHARED_PATH . '/admin_footer.php');?>
