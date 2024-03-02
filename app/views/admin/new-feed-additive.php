<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>New Feed Additives | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

    <link href="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
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
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/products/unbranded/feed-additives">Feed Additives</a></li>
                                        <li class="breadcrumb-item active">New Feed Additives</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">New Feed Additives</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title">Create New Feed Additives</h4>
                                <p class="sub-header">
                                    Create a new feed additives for your collection below.
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

                                        <form class="form-horizontal" action="<?= BASE_URL ?>/admin/products/unbranded/feed-additive/new" method="post" onsubmit="return validateForm()">
                                            <!-- Image placholder here -->
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 control-label">Name</label>
                                                <div class="col-md-10">
                                                    <input id="name" type="text" name="name" class="form-control" placeholder="Enter Product Name e.g Lysine" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="desc" class="col-md-2 control-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea id="desc" name="desc" class="form-control" rows="5" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="manufacturer" class="col-md-2 control-label">Manufacturer</label>
                                                <div class="col-md-10">
                                                    <input id="manufacturer" name="manufacturer" type="text" class="form-control" placeholder="Enter Manufacturer Name e.g Tosed Farms" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="price" class="col-md-2 control-label">Price per (100g)</label>
                                                <div class="col-md-10">
                                                    <input id="price" name="price" type="text" placeholder="Enter price e.g ₦ 1,000" data-a-sign="₦ " class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="in_stock" class="col-sm-2 control-label">In stock</label>
                                                <div class="col-sm-10">
                                                    <input id="in_stock" name="in_stock" type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" />
                                                </div>
                                            </div>

                                            <div class="mt-4 text-right">
                                                <button class="btn btn-primary waves-effect waves-light"> 
                                                    <i class="fas fa-plus mr-1"></i> <span>Add Feed Additive</span> 
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
    <script src="<?= BASE_URL ?>/admin-assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/autonumeric/autoNumeric-min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.js"></script>

    <!-- Init js-->
    <script>
        $('[data-plugin="switchery"]').each(function (a, e) {
            new Switchery($(this)[0], $(this).data());
        })
        $(".autonumber").autoNumeric("init");

        function validateForm() {
            // Get form inputs
            var name = document.getElementById('name').value;
            var manufacturer = document.getElementById('manufacturer').value;
            var price = document.getElementById('price').value;

            // Validate brand name and category
            if (name.trim() === '') {
            alert('Please enter a name.');
            return false;
            }

            if (manufacturer === '') {
            alert('Please enter a manufacturer.');
            return false;
            }

            if (price.trim() === '') {
            alert('Please enter a price.');
            return false;
            }

            return true;
        }
    </script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>


</html>