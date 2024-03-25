<?php
// AdminController.php
require_once MODEL_PATH . '/AdminModel.php';
require_once MODEL_PATH . '/BrandsModel.php';
require_once MODEL_PATH . '/BrandedProductsModel.php';
require_once MODEL_PATH . '/UnbrandedProductsModel.php';
require_once MODEL_PATH . '/BlogPostsModel.php';
require_once MODEL_PATH . '/BlogCommentsModel.php';
require_once MODEL_PATH . '/BlogCommentRepliesModel.php';

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
            'total_products' => UnBrandedProductsModel::total() + BrandedProductsModel::total(),
            'total_brands' => BrandsModel::total(),
            'total_posts' => BlogPostsModel::total(),
            'brands' => BrandsModel::getAllBrands(),
            'posts' => BlogPostsModel::getLatestBlogPosts(5),
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

    public function deleteBrand(){
        $brandId = $_POST['brandId'];

        if (BrandsModel::deleteBrand($brandId)) {
            $_SESSION['success_message'] = 'Brand Deleted Successfully!';
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

        $brand_name = join(" ",explode("-", $params[0]));

        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => BrandedProductsModel::getAllSingleBrandProducts($brand_name),
            'current_page' => $_SERVER['REQUEST_URI'],
            'brand_name' => $brand_name
        ];

        include VIEW_PATH . '/admin/single-brand-products.php'; 
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
        $showProduct = isset($_POST['show_product']);

        // Server-side validation
        if (empty($productName) || empty($productDesc) || empty($productBrand) || empty($productNetWeight) || empty($productPrice)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/branded/new');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPrice)));


        // Create new admin record in the database using AdminModel
        if (BrandedProductsModel::create($productBrand,  $productName, $productNetWeight, $productInStock, $productDesc, $re_formatted_price, $showProduct)) {
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
        $$showPrice = isset($_POST['show_price']);

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
        if (BrandedProductsModel::update($productId, $productBrand,  $productName, $productNetWeight, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Product Updated Successfully!';
            redirect($redirect);
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect($redirect);
        }

    }

    public function deleteBrandedProduct(){
        $productId = $_POST['productId'];
        $productBrand = $_POST['brandId'];

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

         // Create new admin record in the database using AdminModel
         if (BrandedProductsModel::deleteProduct($productId)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Product Deleted Successfully!';
            redirect($redirect);
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect($redirect);
        }
    }

    public function feedIngredientsList(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('ingredients'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/admin/feed-ingredients.php'; 
    }

    public function newFeedIngredientForm(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/new-feed-ingredient.php';
    }

    public function newFeedIngredient(){
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerKg = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredient/new');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerKg)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::create('ingredients', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Feed Ingredient Added Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/feed-ingredients");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredient/new');
        }

    }

    public function editFeedIngredient(){
        $productId = $_POST['productId'] ?? '';
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerKg = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productId) || empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredients');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerKg)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::update($productId, 'ingredients', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Feed Ingredient Updated Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/feed-ingredients");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredients');
        }

    }

    public function feedAdditivesList(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('additives'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/admin/feed-additives.php'; 
    }

    public function newFeedAdditivesForm(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/new-feed-additive.php';
    }

    public function newFeedAdditive(){
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerKg = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredient/new');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerKg)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::create('additives', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Feed Additive Added Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/feed-additives");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-additive/new');
        }

    }

    public function editFeedAdditive(){
        $productId = $_POST['productId'] ?? '';
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerG = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productId) || empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-ingredients');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerG)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::update($productId, 'ingredients', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Feed Additive Updated Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/feed-additives");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/feed-additives');
        }

    }

    public function miscellaneousList(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('miscellaneous'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/admin/miscellaneous.php'; 
    }

    public function newMiscellaneousForm(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/new-miscellaneous.php';
    }

    public function newMiscellaneous(){
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerKg = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/miscellaneous/new');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerKg)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::create('miscellaneous', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Miscellaneous Product Added Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/miscellaneous");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/miscellaneous/new');
        }

    }

    public function editMiscellaneous(){
        $productId = $_POST['productId'] ?? '';
        $productName = $_POST['name'] ?? '';
        $productDesc = $_POST['desc'] ?? '';
        $productManufacturer = $_POST['manufacturer'] ?? '';
        $productPricePerKg = $_POST['price'] ?? '';
        $productInStock = isset($_POST['in_stock']);
        $showPrice = isset($_POST['show_price']);

        // Server-side validation
        if (empty($productId) || empty($productName) || empty($productDesc) || empty($productManufacturer) || empty($productPricePerKg)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/products/unbranded/miscellaneous');
            return;
        }   

        $re_formatted_price = trim(str_replace("₦","",str_replace(",","",$productPricePerKg)));


        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::update($productId, 'miscellaneous', $productName, $productManufacturer, $productInStock, $productDesc, $re_formatted_price, $showPrice)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = 'Miscellaneous Product Updated Successfully!';
            redirect(BASE_URL . "/admin/products/unbranded/miscellaneous");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/miscellaneous');
        }

    }

    public function deleteUnbrandedProduct($params){
        $productType = $params[0];
        $productId = $_POST['productId'] ?? '';
        $productTypeName = "";

        switch ($productType) {
            case 'feed-ingredients':
                $productTypeName = "Feed Ingredient";
                break;
            case 'feed-additives':
                $productTypeName = "Feed Additive";
                break;
            case 'miscellaneous':
                $productTypeName = "Miscellaneous";
                break;
        }

        // Create new admin record in the database using AdminModel
        if (UnBrandedProductsModel::deleteProduct($productId)) {
            // insertion successful, redirect to respective branded products page with success message
            $_SESSION['success_message'] = "$productTypeName Product Deleted Successfully!";
            redirect(BASE_URL . "/admin/products/unbranded/$productType");
        } else {
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . '/admin/products/unbranded/miscellaneous');
        }
    }

    public function blogsList($category = ""){
        $category = ($category !== "") ? join(" ",explode("-", $category[0])) : "";

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $totalPosts = BlogPostsModel::total();
        $totalPages = ceil($totalPosts / $limit);
        
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'blogs' => BlogPostsModel::getAllBlogPosts($category, $limit, $offset),
            'totalPages' => $totalPages,
            'categories' => BlogPostsModel::getAllBlogCategories(),
            'current_page' => $_SERVER['REQUEST_URI'],
            'latest_posts' => BlogPostsModel::getLatestBlogPosts(3)
        ];

        include VIEW_PATH . '/admin/blogs.php';
    } 

    public function blogSingle($params){
        $post_title = join(" ", explode("-", $params[0]));

        $post = BlogPostsModel::getBlogPostByTitle($post_title);

        if(!$post){
            redirect(BASE_URL . "/admin/blogs");
            return;
        }

        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI'],
            'post' => $post,
            'categories' => BlogPostsModel::getAllBlogCategories(),
            'latest_posts' => BlogPostsModel::getLatestBlogPosts(3),
            'comments_total' => BlogCommentsModel::total($post['post_id']),
            'comments' => BlogCommentsModel::getAllComments($post['post_id'])
        ];

        include VIEW_PATH . '/admin/single-post.php';
    }

    public function newBlogPostForm(){
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI'],
            'categories' => BlogPostsModel::getAllBlogCategories()
        ];

        include VIEW_PATH . '/admin/new-blog.php';
    }

    public function newBlogPost(){
        $admin_id = $_SESSION['admin_id'];
        $featured_image = $_FILES['featured_image'];
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $action = $_POST['action'] ?? '';
        $category= $_POST['category'] ?? '';

        if (empty($featured_image['name']) || empty($title) || empty($content) || empty($action) || empty($category)) {
            $_SESSION['error_message'] = 'The brand image, name and category fields are required.';
            redirect(BASE_URL . '/admin/post/new');
            return;
        }

        $file = basename($featured_image["name"]);
        $targetDir = "blog-images/";
        $targetPath = $targetDir . $file;
        
        if(move_uploaded_file($featured_image["tmp_name"], $targetPath)){
            // Create new blog post record in the database
            if (BlogPostsModel::create($admin_id, $category, $file, $title, $content, $action)) {
                $_SESSION['success_message'] = 'New Post Added Successfully!';
                redirect(BASE_URL . '/admin/blogs');
            } else {
                // Insertion failed, redirect back to new post form with error
                $_SESSION['error_message'] = 'Update failed. Please try again.';
                $_SESSION['content_recover'] = $content;
                redirect(BASE_URL . '/admin/post/new');
            }
        }
    }

    public function editBlogPostForm($params){
        $post_id = $params[0];
        $post = BlogPostsModel::getBlogPost($post_id);

        if(!$post){
            redirect(BASE_URL . "/admin/blogs");
            return;
        }

        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI'],
            'post' => $post,
            'categories' => BlogPostsModel::getAllBlogCategories()
        ];

        include VIEW_PATH . '/admin/edit-blog.php';
    }

    public function editBlogPost($params) { 
        // Collect form data
        $post_id = $params[0];
        $featured_image = $_FILES['featured_image'];
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $action = $_POST['action'] ?? '';
        $category= $_POST['category'] ?? ''; 

        // Server-side validation
        if (empty($title) || empty($content) || empty($action) || empty($category)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/$post_id/edit");
            return;
        }

        if(!empty($featured_image['name'])){
            $file = basename($featured_image["name"]);
            $targetDir = "blog-images/";
            $targetPath = $targetDir . $file;

            if(move_uploaded_file($featured_image["tmp_name"], $targetPath)){
                // Create new brand record in the database
                if (BlogPostsModel::update($post_id, $file, $category, $title, $content, $action)) {
                    if($action === "1"){
                        $_SESSION['success_message'] = 'Blog Post Updated and Saved As Draft Successfully!';
                    }else{
                        $_SESSION['success_message'] = 'Blog Post Updated Successfully!';
                    }

                    redirect(BASE_URL . "/admin/post/$post_id/edit");
                } else {
                    print_r($_POST);
                    print_r(empty($_FILES['featured_image'])? "0" : "1");
                    return;
                    // Insertion failed, redirect back to new brand form with error
                    $_SESSION['error_message'] = 'Update failed. Please try again.';
                    redirect(BASE_URL . "/admin/post/$post_id/edit");
                }
            }
            return;
        } 

        if (BlogPostsModel::updateWithoutImage($post_id, $category, $title, $content, $action)) {
            if($action === "1"){
                $_SESSION['success_message'] = 'Blog Post Updated and Saved As Draft Successfully!';
            }else{
                $_SESSION['success_message'] = 'Blog Post Updated Successfully!';
            }

            redirect(BASE_URL . "/admin/post/$post_id/edit");
        } else {
            // Insertion failed, redirect back to new brand form with error
            $_SESSION['error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/$post_id/edit");
        }
        
    }

    public function newPostComment($params){
        $post_id = $params[0];
        $admin_id = $_SESSION['admin_id'];
        $message = $_POST['message'] ?? '';

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']); 

        if (empty($message)) {
            $_SESSION['new_comment_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#commentForm");
            return;
        }

        if (BlogCommentsModel::createComment($post_id, $message, $admin_id)) {
            // insertion successful, redirect to post page with uploaded comment
            $_SESSION['new_comment_success_message'] = 'Comment Added Successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['new_comment_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#commentForm");
        }

    }

    public function editPostComment($params){
        $comment_id = $params[0];
        $message = $_POST['comment'] ?? '';
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']); 

        if (empty($message)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsModel::updateComment($comment_id, $message)) {
            // insertion successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Comment Updated Successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }

    }

    public function deleteComment(){
        $comment_id = $_POST['commentId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($comment_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsModel::deleteComment($comment_id)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Comment was deleted successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function approveComment(){
        $comment_id = $_POST['commentId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($comment_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsModel::updateCommentStatus($comment_id, 1)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Comment was approved successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function disproveComment(){
        $comment_id = $_POST['commentId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($comment_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsModel::updateCommentStatus($comment_id, 0)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Comment was unapproved successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function newCommentReply($params){
        $comment_id = $params[0];
        $admin_id = $_SESSION['admin_id'];
        $message = $_POST['message'] ?? '';
        $post_id = $_POST['post_id'] ?? '';

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']); 

        if (empty($message)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsRepliesModel::createReply($comment_id, $message, $admin_id)) {
            // insertion successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Reply Added Successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function editCommentReply($params){
        $reply_id = $params[0];
        $message = $_POST['comment'] ?? '';
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']); 

        if (empty($message)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsRepliesModel::updateCommentReply($reply_id, $message)) {
            // insertion successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Reply Updated Successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }

    }

    public function deleteReply(){
        $reply_id = $_POST['replyId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($reply_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsRepliesModel::deleteReply($reply_id)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Reply was deleted successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function approveReply(){
        $reply_id = $_POST['replyId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($reply_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsRepliesModel::updateCommentReplyStatus($reply_id, 1)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Reply was approved successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

    public function disproveReply(){
        $reply_id = $_POST['replyId'];
        $post_id = $_POST['postId'];

        $post_title = convertToSlug(BlogPostsModel::getBlogPost($post_id)['title']);

        if (empty($reply_id)) {
            $_SESSION['comment_action_error_message'] = 'All fields are required.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
            return;
        }

        if (BlogCommentsRepliesModel::updateCommentReplyStatus($reply_id, 0)) {
            // upadte successful, redirect to post page with uploaded comment
            $_SESSION['comment_action_success_message'] = 'Reply was unapproved successfully!';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        } else {
            $_SESSION['comment_action_error_message'] = 'Update failed. Please try again.';
            redirect(BASE_URL . "/admin/post/single/$post_title#comments");
        }
    }

}
