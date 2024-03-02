<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>New Brand | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/favicon.ico">

    <link href="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= BASE_URL ?>/admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= BASE_URL ?>/admin-assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <style>
        .image-placeholder {
            width: 250px;
            display: inline-block;
            border: 2px dashed #ccc;
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
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
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/brands/">Brands</a></li>
                                        <li class="breadcrumb-item active">New Brand</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">New Brand</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title">Create New Brand</h4>
                                <p class="sub-header">
                                    Create a new brand for your collection below.
                                </p>
                                <div class="row">
                                    <div class="col-12">

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

                                        <form id="brandForm" action="<?= BASE_URL ?>/admin/brand/new" method="post" onsubmit="return validateForm()" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="image-placeholder">
                                                    <!-- Image placeholder frame -->
                                                    <img id="preview" src="https://via.placeholder.com/250x200" class="img-fluid" alt="Placeholder Image">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="brandImage" class="col-md-2 control-label">Brand Image</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="brandImage" id="brandImage" accept="image/*" onchange="previewImage()" class="filestyle" data-text="Select file">
                                                    <!-- <input type="file" name="brandImage" id="brandImage" accept="image/*" onchange="previewImage()"> -->
                                                    <span class="font-13 text-muted">recommended size - 1000 X 1026</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="brandName" class="col-md-2 control-label">Brand Name</label>
                                                <div class="col-md-10">
                                                    <input required id="brandName" name="brandName" type="text" class="form-control" placeholder="Enter Brand Name e.g Kepro">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="brandCategory" class="col-sm-2 control-label">Brand Category</label>
                                                <div class="col-sm-10">
                                                    <select id="brandCategory" class="form-control" required name="brandCategory">
                                                        <option value="">Select Brand Category</option>
                                                        <option value="poultry">Poultry Feed</option>
                                                        <option value="fish">Fish Feed</option>
                                                        <option value="drug">Veterinary Product</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label">Visibility</label>
                                                <div class="col-sm-10">
                                                    <input id="visibility" name="visibility" type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label">Featured</label>
                                                <div class="col-sm-10">
                                                    <input id="Featured" type="checkbox" name="featured" checked data-plugin="switchery" data-color="#f1b53d" />
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                                                    <i class="fas fa-plus mr-1"></i> <span>Create Brand</span> 
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
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
    <script src="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>

    <!-- Init js-->
    <script>
        function validateForm() {
            // Get form inputs
            var brandImage = document.getElementById('brandImage').files[0];
            var brandName = document.getElementById('brandName').value;
            var brandCategory = document.getElementById('brandCategory').value;

            // Validate brand name and category
            if (brandName.trim() === '') {
            alert('Please enter a brand name.');
            return false;
            }
            if (brandCategory === '') {
            alert('Please select a brand category.');
            return false;
            }

            // Validate brand image
            if (!brandImage) {
            alert('Please select a brand image.');
            return false;
            }

            return true;
        }

        function previewImage() {
            var preview = document.getElementById('preview');
            var file = document.getElementById('brandImage').files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            }

            if (file) {
            reader.readAsDataURL(file);
            }
        }

        $('[data-plugin="switchery"]').each(function (a, e) {
            new Switchery($(this)[0], $(this).data());
        })
    </script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2024 11:51:29 GMT -->
</html>