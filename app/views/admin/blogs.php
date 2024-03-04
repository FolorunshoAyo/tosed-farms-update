<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blog Posts | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

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
                                        <li class="breadcrumb-item active">Blogs</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Blog List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="p-4">
                                        <?php if (isset($_SESSION['error_message'])): ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-block-helper mr-2"></i> <?= $_SESSION['error_message'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php unset($_SESSION['error_message']); ?>
                                        <?php endif; ?>

                                        <?php if (isset($_SESSION['success_message'])): ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all mr-2"></i> <?= $_SESSION['success_message'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php unset($_SESSION['success_message']); ?>
                                        <?php endif; ?>

                                        <?php if (count(($data['blogs'])) > 0): ?>
                                            <div class="row blog-column-wrapper">
                                                <?php foreach ($data['blogs'] as $post): ?>
                                                    <div class="col-md-6">
                                                        <div class="card blog-post">
                                                            <div class="post-image">
                                                                <img src="<?= BASE_URL . "/blog-images/" . $post['featured_image'] ?>" alt="#" class="img-fluid mx-auto d-block">
                                                                <a href="<?= BASE_URL . "/admin/blogs/category/" . $post['category']?>" class="badge badge-danger"><?= ucfirst($post['category']) ?></a>
                                                            </div>
                                                            <div class="card-body">

                                                                <div class="text-muted"><span>by <a class="text-dark"><?= $post['first_name'] . " " . $post['last_name'] ?></a>,</span> <span><?= date("M d, Y", strtotime($post['date_posted'])) ?></span></div>
                                                                <div class="post-title">
                                                                    <h5><a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($post['title']) ?>"><?= $post['title'] ?></a></h5>
                                                                </div>
                                                                <div>
                                                                <?= $post['status'] === "1"? '<span class="badge badge-warning">Draft</span>' : '<span class="badge badge-success">Published</span>' ?>
                                                                </div>
                                                                <div class="text-right">
                                                                <a href="<?= BASE_URL . "/admin/post/". $post['post_id'] .  "/edit" ?>" class="btn btn-warning btn-sm waves-effect waves-light">Edit <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                                    <a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($post['title']) ?>" class="btn btn-success btn-sm waves-effect waves-light">Read More <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="btn-toolbar mb-4 pb-2">
                                                <ul class="pagination mb-lg-0 mb-5">
                                                    <li class="page-item page-prev <?= $page > 1? "" : "disabled"?>">
                                                        <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Prev</a>
                                                    </li>
                                                    <?php
                                                        // Display ellipsis if there are too many pages
                                                        $numLinksToShow = 5;
                                                        $start = max(1, $page - floor($numLinksToShow / 2));
                                                        $end = min($totalPages, $start + $numLinksToShow - 1);

                                                        if ($start > 1) {
                                                            echo '
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="javascript:void(0)">....</a>
                                                            </li>';
                                                        }

                                                        for ($i = $start; $i <= $end; $i++):
                                                    ?>
                                                        <?php if ($i == $page): ?>
                                                            <li class="page-item active">
                                                                <a href="?page=<?= $i ?>" class="page-link" href="#"><?= $i ?></a>
                                                            </li>
                                                        <?php else: ?>
                                                            <li class="page-item">
                                                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                            </li>
                                                        <?php endif; ?>                                                        
                                                    <?php endfor; ?>

                                                    <li class="page-item page-next <?= $page < $totalPages? "" : "disabled"?>">
                                                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-6 text-center">
                                                        <img src="assets/images/animat-search-color.gif" alt="" height="120">
                                                        <h2 class="text-uppercase text-danger">No Blogs</h2>
                                                        <p class="text-muted mb-2">It's looking like you don't have any blogs posted yet</p>

                                                        <a class="btn btn-primary waves-effect waves-light mt-4" href="<?= BASE_URL . "/admin/post/new"?>"> Create Post </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="p-4">

                                        <div class="">
                                            <h5 class="text-uppercase mb-4">Search</h5>
                                            <div class="form-group search-box">
                                                <input type="text" id="search-input" class="form-control" placeholder="Search here...">
                                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="text-uppercase mb-4">Categories</h5>

                                            <ul class="blog-categories-list list-unstyled">
                                                <?php
                                                foreach($data['categories'] as $category):
                                                ?>
                                                    <li><a href="<?= BASE_URL . "/admin/blogs/category/" . $category['name'] ?>"><?= $category['name'] ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="text-uppercase mb-4">Latest Post</h5>

                                            <?php
                                                foreach($data['latest_posts'] as $latest_post):
                                            ?>

                                            <div class="media latest-post-item mt-3 mt-lg-0">
                                                <div class="media-left mr-2">
                                                    <a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($latest_post['title']) ?>"> <img class="rounded" alt="" src="<?= BASE_URL . "/blog-images/" . $latest_post['featured_image'] ?>" style="width: 100px; height: 66px;"> </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading mt-0 mb-1"><a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($latest_post['title']) ?>" class="text-muted font-15" ><?= $latest_post['title'] ?></a> </h5>
                                                    <p class="font-12 text-muted">
                                                        <?= date("M d, Y", strtotime($latest_post['date_posted'])) ?> | <?= $latest_post['first_name'] . " " . $latest_post['last_name'] ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>

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
    <script src="<?= BASE_URL ?>/admin-assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>
</html>