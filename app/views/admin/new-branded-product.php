<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2024 11:51:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title>New Branded Product | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/favicon.ico">

    <link href="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

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
                                        <li class="breadcrumb-item active">New Branded Product</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">New Branded Product</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title">Create New Branded Product</h4>
                                <p class="sub-header">
                                    Create a new branded product for your collection below.
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

                                        <form class="form-horizontal" action="<?= BASE_URL ?>/admin/products/branded/new"  method="post" onsubmit="return validateForm()">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-2 control-label">Name</label>
                                                <div class="col-md-10">
                                                    <input id="name" name="name" type="text" class="form-control" required placeholder="Enter Product Name e.g Kepro">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="desc" class="col-md-2 control-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea id="desc" name="desc" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="brand" class="col-sm-2 control-label">Select from existing Brands</label>
                                                <div class="col-sm-10">
                                                    <select id="brand" name="brand" class="form-control select2" style="width: 100%;" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            $poultry_feed_brands = BrandsModel::getBrandsAlphabetically('poultry');

                                                            if(count($poultry_feed_brands) > 0){
                                                        ?>
                                                        <optgroup label="Poultry Feeds">
                                                            <?php
                                                                foreach ($poultry_feed_brands as $poultry_brand) {
                                                            ?>
                                                            <option value="<?= $poultry_brand['brand_id'] ?>"><?= $poultry_brand['name'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </optgroup>
                                                        <?php
                                                            }
                                                        ?>
                                                        <?php
                                                            $fish_feed_brands = BrandsModel::getBrandsAlphabetically('fish');

                                                            if(count($fish_feed_brands) > 0){
                                                        ?>
                                                        <optgroup label="Fish Feeds">
                                                            <?php
                                                                foreach ($fish_feed_brands as $fish_brand) {
                                                            ?>
                                                            <option value="<?= $fish_brand['brand_id'] ?>"><?= $fish_brand['name'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </optgroup>
                                                        <?php
                                                            }
                                                        ?>
                                                        <?php
                                                            $drug_brands = BrandsModel::getBrandsAlphabetically('drug');

                                                            if(count($drug_brands) > 0){
                                                        ?>
                                                        <optgroup label="Fish Feeds">
                                                            <?php
                                                                foreach ($drug_brands as $drug_brand) {
                                                            ?>
                                                            <option value="<?= $drug_brand['brand_id'] ?>"><?= $drug_brand['name'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </optgroup>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="net_weight" class="col-md-2 control-label">Net weight (Include the unit e.g g/kg/ml)</label>
                                                <div class="col-md-10">
                                                    <input id="net_weight" type="text" name="net_weight" required class="form-control" placeholder="Enter Product Net Weight e.g 100g/kg/ml">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="price" class="col-md-2 control-label">Price</label>
                                                <div class="col-md-10">
                                                    <input id="price" name="price" type="text" required placeholder="Enter product price" data-a-sign="₦ " class="form-control autonumber">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="in_stock" class="col-sm-2 control-label">In stock</label>
                                                <div class="col-sm-10">
                                                    <input id="in_stock" name="in_stock" type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" />
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                                                    <i class="fas fa-plus mr-1"></i> <span>Create Product</span> 
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
    <script src="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.js"></script>

    <!-- Init js-->
    <script>
        $('[data-plugin="switchery"]').each(function (a, e) {
            new Switchery($(this)[0], $(this).data());
        })
        $(".select2").select2();
        $(".autonumber").autoNumeric("init");


        function validateForm() {
            // Get form inputs
            var name = document.getElementById('name').value;
            var brand = document.getElementById('brand').value;
            var netWeight = document.getElementById('net_weight').value;
            var price = document.getElementById('price').value;

            // Validate brand name and category
            if (name.trim() === '') {
            alert('Please enter a name.');
            return false;
            }

            if (brand === '') {
            alert('Please select a brand.');
            return false;
            }

            if (netWeight.trim() === '') {
            alert('Please enter a net weight.');
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