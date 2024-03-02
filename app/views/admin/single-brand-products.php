<?php
    $brandName = ucwords($data['brand_name']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $brandName ?> Products | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">
    <link href="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Table datatable css -->
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>/admin-assets/libs/datatables/fixedColumns.bootstrap4.min.html" rel="stylesheet" type="text/css" />

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
                                        <li class="breadcrumb-item active"><?= $brandName ?> Products</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?= $brandName ?> Products</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card-box table-responsive">

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

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Brand</th>
                                            <th>Net weight</th>
                                            <th>Price</th>
                                            <th>Availability</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            foreach ($data['products'] as $product) {
                                            $in_stock = $product['availability_status'] === 1; 
                                            $formatted_brand_name = strtolower(join("-", explode(" ", $product['brand_name'])));
                                        ?>
                                        <tr>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $product['description'] ?></td>
                                            <td data-brand-id="<?= $product['brand_id'] ?>"><a href="<?= BASE_URL . "/admin/products/brand/" . $formatted_brand_name . "/"?>"><?= $product['brand_name'] ?></a></td>
                                            <td><?= $product['net_weight'] ?></td>
                                            <td>₦ <?= number_format($product['price'], 2, '.', ',') ?></td>
                                            <td>
                                                <span class="badge badge-<?= $in_stock? "success" : "danger" ?>"><?= $in_stock? "In Stock" : "Out of stock" ?></span>
                                            </td>
                                            <td>
                                                <div class="btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button type="button" class="editBtn btn btn-primary" style="float: none;" data-product-id="<?= $product['product_id'] ?>">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>

                                <div class="mt-4 text-right">
                                    <a href="<?= BASE_URL ?>/admin/products/branded/new" class="btn btn-primary waves-effect waves-light"> 
                                        <i class="fas fa-plus mr-1"></i> <span>Add New <?= $brandName ?> Product</span> 
                                    </a>
                                </div>
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

        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="editBrandForm" method="post" action="<?= BASE_URL ?>/admin/products/branded/edit" onsubmit="return validateForm()">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input required id="name" name="name" type="text" class="form-control" placeholder="Enter Brand Name e.g Kepro">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <textarea id="desc" name="desc" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 control-label">Brand</label>
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
                                <optgroup label="Veterinary Products">
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
                        <label for="net_weight" class="col-md-2 control-label">Net Weight</label>
                        <div class="col-md-10">
                            <input required id="net_weight" name="net_weight" type="text" class="form-control" placeholder="Enter Brand Name e.g Kepro">
                        </div>
                    </div>

                    <input type="hidden" name="productId">

                    <div class="form-group row">
                        <label for="price" class="col-md-2 control-label">Price</label>
                        <div class="col-md-10">
                            <input id="price" name="price" type="text" placeholder="" data-a-sign="₦ " class="form-control autonumber">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Availability</label>
                        <div class="col-sm-10">
                            <input type="checkbox" id="in_stock" name="in_stock" data-switch="success"/>
                            <label for="in_stock" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                            <span>Save Changes</span> 
                        </button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/vendor.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/select2/select2.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/autonumeric/autoNumeric-min.js"></script>

    <!-- Datatable plugin js -->
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/buttons.print.min.js"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.scroller.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/datatables/dataTables.fixedColumns.min.html"></script>

    <script src="<?= BASE_URL ?>/admin-assets/libs/jszip/jszip.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/pdfmake/vfs_fonts.js"></script>

    <!-- Collections init -->
    <script >
        var handleDataTableButtons = function () {
        "use strict";
        0 !== $("#datatable-buttons").length &&
            $("#datatable-buttons").DataTable({
            dom: "Bfrtip",
            buttons: [
                { extend: "copy", className: "btn-sm" },
                { extend: "csv", className: "btn-sm" },
                { extend: "excel", className: "btn-sm" },
                { extend: "pdf", className: "btn-sm" },
                { extend: "print", className: "btn-sm" },
            ],
            responsive: !0,
            columnDefs: [
                // {
                //     target: 4,
                //     render: DataTable.render.number(null, null, 0, '₦ '),
                // },
                {
                    targets: [0, 2, 3, 4],
                    className: 'font-weight-bold'
                },
                {
                    targets: 0,
                    className: 'text-center'
                },
                {
                    "targets": [1], 
                    "render": function ( data, type, row ) {
                        return '<div style="text-wrap: wrap;">'+data+'</div>';
                    }
                }    
            ]
            });
        },
        TableManageButtons = (function () {
        "use strict";
        return {
            init: function () {
            handleDataTableButtons();
            },
        };
        })();
        TableManageButtons.init();

        $(document).ready(function() {
            $(".select2").select2();
            $(".autonumber").autoNumeric("init");

            $('#datatable-buttons tbody').on('click', '.editBtn', function() {
                var row = $(this).closest('tr');

                if (row.hasClass('child')) {
                    row = row.prev('tr');
                }

                // Get the data from the table row
                var name = row.find('td:eq(0)').text().trim();
                var desc = row.find('td:eq(1)').text().trim();
                var brand = row.find('td:eq(2)').data("brand-id");
                var netWeight = row.find('td:eq(3)').text().trim();
                var price = row.find('td:eq(4)').text().trim().toLowerCase();
                var availability = row.find('td:eq(5)').text().trim().toLowerCase();
                var productId = $(this).data("product-id");

                // Populate the modal fields with the data
                $('#name').val(name);
                $('#desc').val(desc);
                $('#brand').val(brand).trigger("change");
                $('#net_weight').val(netWeight);
                $('#price').val(price);
                $('#in_stock').attr('checked', availability === 'in stock');
                $('[name="productId"]').attr("value", productId);

                // Show the modal
                $('#editProductModal').modal('show');
            });
        });
    
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