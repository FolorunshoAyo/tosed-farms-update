<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Register | Tosed Integrated Farm Ventures</title>
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
                            <form action="<?= BASE_URL ?>/admin/register" method="post" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <input class="form-control" name="first_name" type="text" id="first_name" required="" placeholder="First Name">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="last_name" type="text" id="last_name" required="" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" id="username" required="" placeholder="Username">
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" id="email" required="" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" required="" id="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="confirm_password" type="password" required="" id="confirm_password" placeholder="Confirm Password">
                                </div>

                                <div class="form-group text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have account?<a href="<?= BASE_URL ?>/admin/login" class="text-primary ml-1"><b>Sign In</b></a></p>
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
    <script src="assets/js/vendor.min.js"></script>

    <script>
        function validateForm() {
            var firstName = document.getElementById('first_name').value;
            var lastName = document.getElementById('last_name').value;
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (firstName === '' || lastName === '' || email === '' || username === '' || password === '' || confirmPassword === '') {
                alert('All fields are required');
                return false;
            }

            // Validate email format
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Invalid email format');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return false;
            }

            // Add more validation rules as needed

            return true;
        }
    </script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>
</html>