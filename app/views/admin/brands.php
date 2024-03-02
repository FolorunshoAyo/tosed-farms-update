<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Brands List | Tosed Integrated Farm Ventures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-favicon.png">

    <link href="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

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

    <style>
        .image-placeholder {
            max-width: 250px;
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
                                        <li class="breadcrumb-item active">Brands</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Datatable</h4>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>No. Of Products</th>
                                            <th>Category</th>
                                            <th>Visible</th>
                                            <th>Featured</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($data['brands'] as $brand) {
                                            switch ($brand['category']) {
                                                case 'poultry':
                                                    $category = "Poultry Feeds";
                                                    break;
                                                case 'fish':
                                                    $category = "Fish Feeds";
                                                    break;
                                                case 'drug':
                                                    $category = "Veterinary Products";
                                                    break;
                                            }
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="rounded" alt="" src="<?= BASE_URL ?>/brand-images/<?= $brand['image_url'] ?>" style="width: 100px; height: 66px;">
                                            </td>
                                            <td><?= $brand['name'] ?></td>
                                            <td><?= BrandedProductsModel::countAll($brand['brand_id']) ?></td>
                                            <td><a href="<?= BASE_URL . "/admin/products/branded/" . strtolower(join("-",explode(" ", $category))) ?>"><?= $category ?></a></td>
                                            <td>
                                                <?= $brand['visibility_status'] === 1? "Yes" : "No" ?>
                                            </td>
                                            <td>
                                            <?= $brand['featured_status'] === 1? "Yes" : "No" ?>
                                            </td>
                                            <td>
                                                <div class="btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <button type="button" class="editBtn btn btn-primary" style="float: none;" data-brand-id="<?= $brand['brand_id'] ?>">
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
                                    <a href="<?= BASE_URL ?>/admin/brand/new" class="btn btn-primary waves-effect waves-light"> 
                                        <i class="fas fa-plus mr-1"></i> <span>Add New Brand</span> 
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

        <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form id="editBrandForm" method="post" action="<?= BASE_URL ?>/admin/brand/edit" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="image-placeholder">
                            <!-- Image placeholder frame -->
                            <img id="preview" src="https://via.placeholder.com/250x200" class="img-fluid" alt="Placeholder Image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editBrandImage" class="col-md-2 control-label">Brand Image</label>
                        <div class="col-md-10">
                            <input type="file" name="editBrandImage" id="brandImage" accept="image/*" onchange="previewImage()" class="filestyle" data-text="Select file">
                            <span class="font-13 text-muted">recommended size - 1000 X 1026</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editBrandName" class="col-md-2 control-label">Brand Name</label>
                        <div class="col-md-10">
                            <input required id="editBrandName" name="editBrandName" type="text" class="form-control" placeholder="Enter Brand Name e.g Kepro">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editBrandCategory" class="col-sm-2 control-label">Brand Category</label>
                        <div class="col-sm-10">
                            <select id="editBrandCategory" class="form-control" required name="editBrandCategory">
                                <option value="">Select Brand Category</option>
                                <option value="poultry">Poultry Feed</option>
                                <option value="fish">Fish Feed</option>
                                <option value="drug">Veterinary Product</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="editBrandId">

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Visibility</label>
                        <div class="col-sm-10">
                            <input name="visibility" type="checkbox" id="visibility" data-switch="success"/>
                            <label for="visibility" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Featured</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="featured"  id="featured" data-switch="success"/>
                            <label for="featured" data-on-label="Yes" data-off-label="No"></label>
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

    <script src="<?= BASE_URL ?>/admin-assets/libs/switchery/switchery.min.js"></script>
    <script src="<?= BASE_URL ?>/admin-assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>

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

    <!-- Datatables init -->
    <script>
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
                    //     target: 3,
                    //     render: DataTable.render.number(null, null, 0, '₦ '),
                    // },
                    {
                        targets: 2,
                        className: 'font-weight-bold'
                    },
                    {
                        targets: 0,
                        className: 'text-center'
                    },
                    // {
                    //     "targets": [1], 
                    //     "render": function ( data, type, row ) {
                    //         return '<div class="table-description">'+data+'</div>';
                    //     }
                    // }    
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
            $('#datatable-buttons tbody').on('click', '.editBtn', function() {
                var row = $(this).closest('tr');

                // clear previous form
                $('#editBrandForm')[0].reset();

                if (row.hasClass('child')) {
                    row = row.prev('tr');
                }

                // Get the data from the table row
                var brandImage = row.find('img').attr('src');
                var brandName = row.find('td:eq(1)').text().trim();
                var category = row.find('td:eq(3)').text().trim();
                var visible = row.find('td:eq(4)').text().trim();
                var featured = row.find('td:eq(5)').text().trim();
                var brandId = $(this).data("brand-id");

                switch (category) {
                    case "Fish Feeds":
                        category = "fish"
                        break;
                    case "Poultry Feeds":
                        category = "poultry"
                        break;
                    case "Veterinary Products":
                        category = "drug"
                        break;
                    default:
                        console.log("could not find results");
                        break;
                }

                // Populate the modal fields with the data
                $('#preview').attr("src", brandImage);
                $('#editBrandName').val(brandName);
                $('#editBrandCategory').val(category);
                $('#visibility').attr('checked', visible === 'Yes');
                $('#featured').attr ('checked', featured === 'Yes');
                $('[name="editBrandId"]').attr("value", brandId);

                console.log(brandId);

                // Show the modal
                $('#editBrandModal').modal('show');
            });
        });
    
        function validateForm() {
            // Get form inputs
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

            return true;
        }

        function previewImage() {
            var preview = document.getElementById('preview');
            var file = document.getElementById('brandImage').files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>
</html>