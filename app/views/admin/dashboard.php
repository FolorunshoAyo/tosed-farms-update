<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Login | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>admin-assets/images/tosed-logo/admin-favicon.png">

    <!-- App css -->
    <link href="<?= BASE_URL ?>/admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= BASE_URL ?>/admin-assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include VIEW_PATH . "/admin/components/topbar.php" ?>
        <!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <?php include VIEW_PATH . "/admin/components/left-sidebar.php" ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tosed Integrated Farm Ventures</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-4 col-sm-6">
                            <div class="card-box widget-box-three">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <i class="ti-image font-30 text-muted avatar-title"></i>
                                    </div>
                                    <div class="wigdet-two-content media-body text-right">
                                        <p class="mt-1 text-uppercase font-weight-medium">Brands</p>
                                        <h2 class="mb-2"><span data-plugin="counterup">2,562</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card-box widget-box-three">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <!-- <i class="ti-agenda font-30 text-muted avatar-title"></i> -->
                                        <i class="ti-image font-30 text-muted avatar-title"></i>
                                    </div>
                                    <div class="wigdet-two-content media-body text-right">
                                        <p class="mt-1 text-uppercase font-weight-medium">Products</p>
                                        <h2 class="mb-2"><span data-plugin="counterup">257</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card-box widget-box-three">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <i class="ti-image font-30 text-muted avatar-title"></i>
                                        <!-- <i class="ti-comment-alt font-30 text-muted avatar-title"></i> -->
                                    </div>
                                    <div class="wigdet-two-content media-body text-right">
                                        <p class="mt-1 text-uppercase font-weight-medium">Posts</p>
                                        <h2 class="mb-2"><span data-plugin="counterup">10</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Recent Brands</h4>

                                <div class="inbox-widget slimscroll" style="max-height: 360px;">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author"><a href="#">Kapro</a></p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span> <i class="mdi mdi-star mdi-18px" style="vertical-align: middle; color: yellow;"></i></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-warning">Hidden</span></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span></p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/kapro-logo.png" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kapro</p>
                                            <p class="inbox-item-date"><span class="badge badge-success">Published</span></p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-8">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Recent Posts</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered m-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Comments</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#"> <img class="rounded" alt="" src="<?= BASE_URL ?>/admin-assets/images/small/img-1.jpg" style="width: 100px; height: 66px;"> </a>
                                                </td>
                                                <td><a href="#">Exclusive: Get a First Look at the Fall Collection</a></td>
                                                <td>Lifestyle</td>
                                                <td>984</td>
                                                <td><span class="badge badge-success">Published</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"> <img class="rounded" alt="" src="<?= BASE_URL ?>/admin-assets/images/small/img-2.jpg" style="width: 100px; height: 66px;"> </a>
                                                </td>
                                                <td><a href="#">How To Beat The Heat</a></td>
                                                <td>Lifestyle</td>
                                                <td>651</td>
                                                <td><span class="badge badge-danger">Deleted</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"> <img class="rounded" alt="" src="<?= BASE_URL ?>/admin-assets//images/small/img-3.jpg" style="width: 100px; height: 66px;"> </a>
                                                </td>
                                                <td><a href="#">The Most Impressive London Streets</a></td>
                                                <td>Travel</td>
                                                <td>124</td>
                                                <td><span class="badge badge-success">Published</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"> <img class="rounded" alt="" src="<?= BASE_URL ?>/admin-assets/images/small/img-4.jpg" style="width: 100px; height: 66px;"> </a>
                                                </td>
                                                <td><a href="#">Stay Cool Italian Style</a></td>
                                                <td>Style</td>
                                                <td>512</td>
                                                <td><span class="badge badge-warning">Draft</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"> <img class="rounded" alt="" src="<?= BASE_URL ?>/admin-assets/images/small/img-5.jpg" style="width: 100px; height: 66px;"> </a>
                                                </td>
                                                <td><a href="#">The Best Places to Visit in the UK</a></td>
                                                <td>Travel</td>
                                                <td>235</td>
                                                <td><span class="badge badge-success">Published</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            <!-- Footer Start -->
            <?php include VIEW_PATH . "/admin/components/footer.php" ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="<?= BASE_URL ?>/admin-assets//js/vendor.min.js"></script>
    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets//js/app.min.js"></script>

</body>
</html>