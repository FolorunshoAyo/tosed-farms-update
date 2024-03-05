<?php
    $post = $data['post'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Blog Post - <?= $post['title'] ?> | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

    <!-- Plugins css -->
    <link href="<?= BASE_URL ?>/admin-assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Summernote css -->
    <link href="<?= BASE_URL ?>/admin-assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />

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
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "/admin/blogs" ?>">Blogs</a></li>
                                        <li class="breadcrumb-item active">Edit Post</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Post </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card-box">

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
                                
                                <div class="">
                                    <form id="new-blog-form" action="<?= BASE_URL ?>/admin/post/<?= $post['post_id']?>/edit" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <label for="featured_image">Featured Image Upload</label>
                                            <input id="featured_image" type="file" name="featured_image" class="dropify" accept="image/*" data-height="210" data-show-remove="false" data-default-file="<?= BASE_URL . "/blog-images/" . $post['featured_image'] ?>"/>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="title">Post Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?= $post['title'] ?>" placeholder="Enter title" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Post Content</label>
                                            <div class="summernote">
                                                <?= $post['content'] ?>
                                            </div>
                                        </div>

                                        <input type="hidden" id="content" name="content">

                                        <div class="form-group mb-4">
                                            <label for="category" class="col-sm-2 control-label">Post Category</label>
                                            <select id="category" class="form-control" required name="category">
                                                <option value="">Select Post Category</option>
                                                <?php
                                                foreach($data['categories'] as $category):
                                                ?>
                                                    <option value="<?= $category['category_id'] ?>" <?= $post['category_id'] === $category['category_id']? "selected" : "" ?>><?= $category['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="action" value="2" class="btn btn-success waves-effect waves-light mr-1">Save and Republish</button>
                                        <button type="submit" name="action" value="1" class="btn btn-warning waves-effect waves-light mr-1">Save as Draft</button>
                                        <a href="<?= BASE_URL . "/admin/post/single/" . convertToSlug($post['title']) ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                    </form>
                                </div>
                            </div>
                            <!-- end p-20 -->
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
    <script src="<?= BASE_URL ?>/admin-assets/js/vendor.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.js"></script>

    <!-- Summernote js -->
    <script src="<?= BASE_URL ?>/admin-assets/libs/summernote/summernote-bs4.min.js"></script>

    <!-- Plugins js -->
    <script src="<?= BASE_URL ?>/admin-assets/libs/dropify/dropify.min.js"></script>

    <script>
        $(function () {
            $(".dropify").dropify({
                messages: {
                default: "Drag and drop a file here or click",
                replace: "Drag and drop or click to replace",
                remove: "Remove",
                error: "Ooops, something wrong appended.",
                },
                error: { fileSize: "The file size is too big (1M max)." },
            }),
            $(".summernote").summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: !1,
            }),
            $(".select2").select2(),
            $(".select2-limiting").select2({ maximumSelectionLength: 2 });

            $('#new-blog-form').on('submit', function() {
                var content = $('.summernote').summernote('code');
                $('#content').val(content);
            });
        });
        </script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>
</html>