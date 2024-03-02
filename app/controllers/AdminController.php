<?php
// AdminController.php
require_once MODEL_PATH . '/AdminModel.php';
require_once MODEL_PATH . '/BrandsModel.php';
require_once MODEL_PATH . '/BrandedProductsModel.php';

class AdminController {
    public function login() {
        if (isset($_COOKIE['remember_token'])) {
            // Check if the remember token exists in the database
            $rememberToken = $_COOKIE['remember_token'];
            $admin = AdminModel::findByRememberToken($rememberToken);

            if ($admin) {
                redirect(BASE_URL . '/admin/');
            }
        }

        include VIEW_PATH . '/admin/login.php';
    }

    
    public function registrationForm(){
        include VIEW_PATH . '/admin/registration.php';
    }

    public function register(){
        // Collect form data
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Server-side validation
        if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $_SESSION['error_message'] = 'Passwords do not match.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = 'Invalid email format.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create new admin record in the database using AdminModel
        if (AdminModel::create($firstName, $lastName, $email, $username, $hashedPassword)) {
            // Registration successful, redirect to login page with success message
            $_SESSION['success_message'] = 'Registration successful! You can now login.';
            redirect(BASE_URL . '/admin/login');
        } else {
            // Registration failed, redirect back to registration form with error
            $_SESSION['error_message'] = 'Registration failed. Please try again.';
            redirect(BASE_URL . '/admin/register');
        }
    }

    public function authenticate() {
        $usernameOrEmail = $_POST['login_input'] ?? '';
        $password = $_POST['password'] ?? '';
        $rememberMe = isset($_POST['remember_me']);

        $admin = AdminModel::authenticate($usernameOrEmail, $password, $rememberMe);

        if ($admin) {
            $_SESSION['admin_id'] = $admin['admin_id'];
            redirect(BASE_URL . '/admin/');
        } else {
            $_SESSION['error_message'] = 'Invalid username/email or password.';
            redirect(BASE_URL . '/admin/login');
        }
    }

    public function logout() {
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            setcookie('remember_token', '', time() - 3600, '/'); // Expire the cookie
        }

        session_destroy();
        redirect(BASE_URL . '/admin/login'); // Redirect to admin login page
    }

    public function dashboard() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/dashboard.php';
    }

    public function listBrands() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'brands' => BrandsModel::getAllBrands(),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/brands.php';
    }

    public function newBrand() { 
        // Collect form data
        $brandImage = $_FILES['brandImage'];
        $brandName = $_POST['brandName'] ?? '';
        $brandCategory = $_POST['brandCategory'] ?? '';
        $visibility = isset($_POST['visibility']);
        $featured = isset($_POST['featured']);

        if (empty($brandImage['name']) || empty($brandName) || empty($brandCategory)) {
            $_SESSION['error_message'] = 'The brand image, name and category fields are required.';
            redirect(BASE_URL . '/admin/brand/new');
            return;
        }

        $file = basename($brandImage["name"]);
        $targetDir = "brand-images/";
        $targetPath = $targetDir . $file;
        
        if(move_uploaded_file($brandImage["tmp_name"], $targetPath)){
            // Create new brand record in the database
            if (BrandsModel::createBrand($brandName, $brandCategory, $file, $featured, $visibility)) {
                $_SESSION['success_message'] = 'New Brand Added Successfully!';
                redirect(BASE_URL . '/admin/brands/');
            } else {
                // Insertion failed, redirect back to new brand form with error
                $_SESSION['error_message'] = 'Update failed. Please try again.';
                redirect(BASE_URL . '/admin/brand/new');
            }
        }
    }

    public function editBrand() { 
        // Collect form data
        $brandId = $_POST['editBrandId'];
        $brandImage = $_FILES['editBrandImage'];
        $brandName = $_POST['editBrandName'] ?? '';
        $brandCategory = $_POST['editBrandCategory'] ?? '';
        $visibility = isset($_POST['visibility']);
        $featured = isset($_POST['featured']);
        
        // Server-side validation
        if (empty($brandName) || empty($brandCategory)) {
            $_SESSION['error_message'] = 'The Name and category fields are required.';
            redirect(BASE_URL . '/admin/brands/');
            return;
        }

        if(!empty($brandImage['name'])){
            $file = basename($brandImage["name"]);
            $targetDir = "brand-images/";
            $targetPath = $targetDir . $file;
            
            if(move_uploaded_file($brandImage["tmp_name"], $targetPath)){
                // Create new brand record in the database
                if (BrandsModel::updateBrand($brandId,$brandName, $brandCategory, $file, $featured, $visibility)) {
                    $_SESSION['success_message'] = 'Brand Updated Successfully!';
                    redirect(BASE_URL . '/admin/brands/');
                } else {
                    // Insertion failed, redirect back to new brand form with error
                    $_SESSION['error_message'] = 'Update failed. Please try again.';
                    redirect(BASE_URL . '/admin/brands/');
                }
            }
            return;
        }

        if (BrandsModel::updateBrandWithoutImage($brandId, $brandName, $brandCategory, $featured, $visibility)) {
            $_SESSION['success_message'] = 'Brand Updated Successfully!';
            redirect(BASE_URL . '/admin/brands/');
        } else {
            // Insertion failed, redirect back to new brand form with error
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/brands/');
        }
    }

    public function newBrandForm() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/new-brand.php';
    }

    public function listPoultryFeeds(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => BrandedProductsModel::getAllBrandedProducts('poultry'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'poultry'
        ];

        include VIEW_PATH . '/admin/branded-products.php'; 
    }

    public function listFishFeeds(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => BrandedProductsModel::getAllBrandedProducts('fish'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'fish'
        ];

        include VIEW_PATH . '/admin/branded-products.php'; 
    }

    public function listVeterinaryProducts(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => BrandedProductsModel::getAllBrandedProducts('drug'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'drugs'
        ];

        include VIEW_PATH . '/admin/branded-products.php'; 
    }

    public function listSingleBrandProducts($params){

        $brand_name = $params[0];

        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => BrandedProductsModel::getAllSingleBrandProducts($brand_name),
            'current_page' => $_SERVER['REQUEST_URI'],
            'brand_name' => join(" ",explode("-", $brand_name))
        ];

        include VIEW_PATH . '/admin/branded-products.php'; 
    }

    public function newBrandedProductForm(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/new-branded-product.php';
    }

    public function newBrandedProduct(){
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productBrand = $_POST['brand'] ?? '';
        $productNetWeight = $_POST['net_weight'] ?? '';
        $productPrice = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);

        // Server-side validation
        if (empty($productName) || empty($productDesc) || empty($productBrand) || empty($productNetWeight) || empty($productPrice)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/branded/new');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPrice)));


        // Create new admin record in the database using AdminModel
        if (BrandedProductsModel::create($productBrand,  $productName, $productNetWeight, $productInStock, $productDesc, $re_formatted_price)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Product Added Successfully!';

            // Retrieve Brand Category i.e (poultry, fish or drug) for proper redirect
            $redirect = "";
            switch (BrandsModel::getBrandById($productBrand)['category']) {
                case 'poultry':
                    $redirect = BASE_URL . "/admin/products/branded/poultry-feeds";
                    break;
                case 'fish':
                    $redirect = BASE_URL . "/admin/products/branded/fish-feeds";
                    break;
                case 'drug':
                    $redirect = BASE_URL . "/admin/products/branded/veterinary-products";
                    break;
            }

            redirect($redirect);
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/branded/new');
        }

    }

    public function editBrandedProduct(){
        $productId = $_POST['productId'] ?? '';
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productBrand = $_POST['brand'] ?? '';
        $productNetWeight = $_POST['net_weight'] ?? '';
        $productPrice = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);

        // Retrieve Brand Category i.e (poultry, fish or drug) for proper redirect
        $redirect = "";
        switch (BrandsModel::getBrandById($productBrand)['category']) {
            case 'poultry':
                $redirect = BASE_URL . "/admin/products/branded/poultry-feeds";
                break;
            case 'fish':
                $redirect = BASE_URL . "/admin/products/branded/fish-feeds";
                break;
            case 'drug':
                $redirect = BASE_URL . "/admin/products/branded/veterinary-products";
                break;
        }
        
        // Server-side validation
        if (empty($productId) || empty($productName) || empty($productDesc) || empty($productBrand) || empty($productNetWeight) || empty($productPrice)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect($redirect);
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPrice)));


        // Create new admin record in the database using AdminModel
        if (BrandedProductsModel::update($productId, $productBrand,  $productName, $productNetWeight, $productInStock, $productDesc, $re_formatted_price)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Product Updated Successfully!';
            redirect($redirect);
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect($redirect);
        }

    }
}
