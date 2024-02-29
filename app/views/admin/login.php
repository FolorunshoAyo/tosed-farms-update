<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2024 11:52:45 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Admin Login | Tosed Integrated Farm Ventures</title>
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

    <div class="account-pages">
        <div class="container vh-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <a href="index-2.html" class="text-success">
                                    <span><img src="<?= BASE_URL ?>/admin-assets/images/tosed-logo/admin-logo-main.png" alt="" height="36"></span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
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

                            <form action="<?= BASE_URL ?>/admin/authenticate" method="post" onsubmit="return validateForm()">

                                <div class="form-group">
                                    <input class="form-control" type="text" name="login_input" id="login_input" required="" placeholder="Username Or Email">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" required="" id="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <!-- <div class="form-group text-center mt-4 pt-2">
                                    <div class="col-sm-12">
                                        <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                </div> -->

                                <div class="form-group text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="<?= BASE_URL ?>/admin/register    " class="text-primary ml-1"><b>Sign Up</b></a></p>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/vendor.min.js"></script>
    <script>
        function validateForm() {
            var loginInput = document.getElementById('login_input').value;
            var password = document.getElementById('password').value;

            if (loginInput.trim() === '' || password.trim() === '') {
                alert('Please enter both username/email and password.');
                return false;
            }
            return true;
        }
    </script>
    <!-- App js -->
    <script src="<?= BASE_URL ?>/admin-assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2024 11:52:47 GMT -->
</html>