<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Feed Additives - Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

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
                                        <li class="breadcrumb-item active">Feed Additives</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Feed Additives</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">

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

                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Manufacturer</th>                                            
                                            <th>Price (per 100g)</th>
                                            <th>Availability</th>
                                            <th>Show Price</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            foreach ($data['products'] as $product) {
                                            $in_stock = $product['availability_status'] === 1;
                                            $show_price = $product['show_price'] === 1; 
                                        ?>
                                        <tr>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $product['description'] ?></td>
                                            <td><?= $product['manufacturer'] ?></td>
                                            <td>₦ <?= number_format($product['price'], 2, '.', ',') ?></td>
                                            <td><span class="badge badge-<?= $in_stock? "success" : "danger" ?>"><?= $in_stock? "In Stock" : "Out of stock" ?></span></td>
                                            <td>
                                                <span class="badge badge-<?= $show_price? "success" : "danger" ?>"><?= $show_price? "Yes" : "No" ?></span>
                                            </td>
                                            <td>
                                                <div class="btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button type="button" class="editBtn btn btn-primary" style="float: none;" data-product-id="<?= $product['product_id'] ?>">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </button>
                                                        <button type="button" class="deleteBtn btn btn-danger" style="float: none;" data-product-id="<?= $product['product_id'] ?>">
                                                            <span class="mdi mdi-trash-can-outline"></span>
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
                                    <a href="<?= BASE_URL ?>/admin/products/unbranded/feed-additive/new" class="btn btn-primary waves-effect waves-light"> 
                                        <i class="fas fa-plus mr-1"></i> <span>Add New Feed Additive</span> 
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
                  <form id="editBrandForm" method="post" action="<?= BASE_URL ?>/admin/products/unbranded/feed-additive/edit" onsubmit="return validateForm()">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Enter Product Name e.g PKC" required>
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

                    <input type="hidden" name="productId">

                    <div class="form-group row">
                        <label for="price" class="col-md-2 control-label">Price (per 100g)</label>
                        <div class="col-md-10">
                            <input id="price" name="price" type="text" placeholder="" data-a-sign="₦ " class="form-control autonumber" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Show Price?</label>
                        <div class="col-sm-10">
                            <input type="checkbox" id="show_price" name="show_price" data-switch="success"/>
                            <label for="show_price" data-on-label="Yes" data-off-label="No"></label>
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

        <div class="modal fade" id="productActionModal" tabindex="-1" aria-labelledby="commentActionModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete this product?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p>Please <b>Note:</b>This is a one time action and cannot be undone. Proceed?</p>
                  <form id="productActionForm" action="<?= BASE_URL ?>/admin/products/unbranded/feed-additives/delete" method="post">

                    <input id="hiddenProductId" type="hidden"/>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> 
                            <span>Yes</span> 
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                            No
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
                    targets: [0, 2, 3],
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
            $(".autonumber").autoNumeric("init");

            $('#datatable-buttons tbody').on('click', '.editBtn', function() {
                var row = $(this).closest('tr');

                if (row.hasClass('child')) {
                    row = row.prev('tr');
                }

                // Get the data from the table row
                var name = row.find('td:eq(0)').text().trim();
                var desc = row.find('td:eq(1)').text().trim();
                var manufacturer= row.find('td:eq(2)').text().trim();
                var price = row.find('td:eq(3)').text().trim();
                var availability = row.find('td:eq(4)').text().trim().toLowerCase();
                var show_price = row.find('td:eq(5)').text().trim().toLowerCase();
                var productId = $(this).data("product-id");

                // Populate the modal fields with the data
                $('#name').val(name);
                $('#desc').val(desc);
                $('#manufacturer').val(manufacturer);
                $('#price').val(price);
                $('#in_stock').attr('checked', availability === 'in stock');
                $('#show_price').attr('checked', show_price === 'yes');
                $('[name="productId"]').attr("value", productId);

                // Show the modal
                $('#editProductModal').modal('show');
            });

            $('#datatable-buttons tbody').on('click', '.deleteBtn', function() {
                var row = $(this).closest('tr');

                if (row.hasClass('child')) {
                    row = row.prev('tr');
                }

                var productId = $(this).data("product-id");

                $("#productActionForm #hiddenProductId").attr("name", "productId");
                $("#productActionForm #hiddenProductId").attr("value", productId);

                // Show the modal
                $('#productActionModal').modal('show');
            });
        });
    
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