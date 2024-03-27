<?php
// AdminController.php
require_once MODEL_PATH . '/BrandsModel.php';
require_once MODEL_PATH . '/BrandedProductsModel.php';
require_once MODEL_PATH . '/UnbrandedProductsModel.php';
require_once MODEL_PATH . '/BlogPostsModel.php';
require_once MODEL_PATH . '/BlogCommentsModel.php';
require_once MODEL_PATH . '/BlogCommentRepliesModel.php';
require_once MODEL_PATH . '/OrdersModel.php';
require_once MODEL_PATH . '/OrderProductModel.php';

class HomeController {
    public function  index() {
        $data = array(
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            "featured_brands" => BrandsModel::getFeaturedBrands(),
        );

        include VIEW_PATH . "/home/index.php";
    }

    public function listAllBrands(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'unique_brand_characters' => BrandsModel::getUniqueCharacters() 
        ];

        include VIEW_PATH . "/home/all-brands.php";
    }

    public function listAllBrandProducts($params){
        $brand_name = join(" ",explode("-", $params[0]));

        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' =>  BrandedProductsModel::getAllSingleBrandProducts($brand_name),
            'brand_details' => BrandsModel::getBrandByName($brand_name), 
        ];

        include VIEW_PATH . "/home/single-brand.php";
    }

    public function allCategories(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug')
        ];

        include VIEW_PATH . "/home/categories.php";
    }

    public function listPoultryFeeds(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => BrandedProductsModel::getAllBrandedProducts('poultry'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'poultry',
            'category_caption' => "Here is our collection of quality feeds for poultry birds"
        ];

        include VIEW_PATH . '/home/branded-products.php'; 
    }

    public function listFishFeeds(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => BrandedProductsModel::getAllBrandedProducts('fish'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'fish',
            'category_caption' => "Here is our collection of quality feeds for fishes"
        ];

        include VIEW_PATH . '/home/branded-products.php'; 
    }

    public function listVeterinaryProducts(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => BrandedProductsModel::getAllBrandedProducts('drug'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'product_type' => 'drugs',
            'category_caption' => "Here is our collection of quality veterinary drugs for animals"
        ];

        include VIEW_PATH . '/home/branded-products.php'; 
    }

    public function feedIngredientsList(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('ingredients'),
        ];

        include VIEW_PATH . '/home/feed-ingredients.php'; 
    }

    public function feedAdditivesList(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('additives')

        ];

        include VIEW_PATH . '/home/feed-additives.php'; 
    }

    public function miscellaneousList(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'products' => UnBrandedProductsModel::getAllUnBrandedProducts('miscellaneous'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/home/miscellaneous.php'; 
    }

    public function getAllProducts(){
        $allProducts = array();

        // each product is an associative array
        $branded_products_polutry = BrandedProductsModel::getAllBrandedProductsTotal('poultry');
        $branded_products_fish = BrandedProductsModel::getAllBrandedProductsTotal('fish');
        $branded_products_drug = BrandedProductsModel::getAllBrandedProductsTotal('drug');
        $unbranded_products_ingredients = UnBrandedProductsModel::getAllUnBrandedProducts('ingredients');
        $unbranded_products_additives = UnBrandedProductsModel::getAllUnBrandedProducts('additives');
        $unbranded_products_miscellaneous = UnBrandedProductsModel::getAllUnBrandedProducts('miscellaneous');
        
        $count = 1;

        foreach ($branded_products_polutry as $branded_product_poultry){
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $branded_product_poultry['product_id'],
                'name' => $branded_product_poultry['name'],
                'type' => 'branded',
                'category' => $branded_product_poultry['brand_category'],
                'net_weight' => $branded_product_poultry['net_weight'],
                'show_price' => $branded_product_poultry['show_price'],
                'price' => (int) (float) $branded_product_poultry['price']
            ));
            $count++;
        }

        foreach ($branded_products_fish as $branded_product_fish){
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $branded_product_fish['product_id'],
                'name' => $branded_product_fish['name'],
                'type' => 'branded',
                'category' => $branded_product_fish['brand_category'],
                'net_weight' => $branded_product_fish['net_weight'],
                'show_price' => $branded_product_fish['show_price'],
                'price' => (int) (float) $branded_product_fish['price']
            ));
            $count++;
        }

        foreach ($branded_products_drug as $branded_product_drug){
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $branded_product_drug['product_id'],
                'name' => $branded_product_drug['name'],
                'type' => 'branded',
                'category' => $branded_product_drug['brand_category'],
                'net_weight' => $branded_product_drug['net_weight'],
                'show_price' => $branded_product_drug['show_price'],
                'price' => (int) (float) $branded_product_drug['price']
            ));
            $count++;
        }

        foreach ($unbranded_products_ingredients as $unbranded_product_ingredients) {
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $unbranded_product_ingredients['product_id'],
                'name' => $unbranded_product_ingredients['name'],
                'type' => 'unbranded',
                'category' => 'ingredient',
                'unit' => 'kg',
                'manufacturer' => $unbranded_product_ingredients['manufacturer'],
                'show_price' => $unbranded_product_ingredients['show_price'],
                'price' => (int) (float) $unbranded_product_ingredients['price']
            ));
            $count++;
        }

        foreach ($unbranded_products_additives as $unbranded_product_additives) {
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $unbranded_product_additives['product_id'],
                'name' => $unbranded_product_additives['name'],
                'type' => 'unbranded',
                'category' => 'additive',
                'unit' => 'g',
                'manufacturer' => $unbranded_product_additives['manufacturer'],
                'show_price' => $unbranded_product_additives['show_price'],
                'price' => (int) (float) $unbranded_product_additives['price']
            ));
            $count++;
        }

        foreach ($unbranded_products_miscellaneous as $unbranded_product_miscellaneous) {
            array_push($allProducts, array(
                'id' => $count,
                'product_id' => $unbranded_product_miscellaneous['product_id'],
                'name' => $unbranded_product_miscellaneous['name'],
                'type' => 'unbranded',
                'category' => 'miscellaneous',
                'manufacturer' => $unbranded_product_miscellaneous['manufacturer'],
                'show_price' => $unbranded_product_miscellaneous['show_price'],
                'price' => (int) (float) $unbranded_product_miscellaneous['price']
            ));
        }
        echo json_encode(array("status" => "success", "products" => $allProducts));
    }

    public function about(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/home/about.php'; 
    }

    public function contactForm(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'current_page' => $_SERVER['REQUEST_URI'],
        ];

        include VIEW_PATH . '/home/contact-form.php'; 
    }

    public function blogsList($category = ""){
        $category = ($category !== "") ? join(" ",explode("-", $category[0])) : "";

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $totalPosts = BlogPostsModel::total();
        $totalPages = ceil($totalPosts / $limit);
        
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'blogs' => BlogPostsModel::getAllBlogPosts($category, $limit, $offset),
            'totalPages' => $totalPages,
            'categories' => BlogPostsModel::getAllBlogCategories(),
            'current_page' => $_SERVER['REQUEST_URI'],
            'latest_posts' => BlogPostsModel::getLatestBlogPosts(3)
        ];

        include VIEW_PATH . '/home/blogs.php';
    }

    public function blogSingle($params){
        $post_title = join(" ", explode("-", $params[0]));

        $post = BlogPostsModel::getBlogPostByTitle($post_title);

        if(!$post){
            redirect(BASE_URL . "/posts");
            return;
        }

        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
            'current_page' => $_SERVER['REQUEST_URI'],
            'post' => $post,
            'categories' => BlogPostsModel::getAllBlogCategories(),
            'latest_posts' => BlogPostsModel::getLatestBlogPosts(3),
            'comments_total' => BlogCommentsModel::totalForClient($post['post_id']),
            'comments' => BlogCommentsModel::getAllComments($post['post_id'])
        ];

        include VIEW_PATH . '/home/single-post.php';
    }

    public function newPostComment($params){
        $post_id = $params[0];

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        $post = BlogPostsModel::getBlogPost($post_id);

        if(!$post){
            echo json_encode(array('type' => "danger", 'message' => 'This post does not exist'));
            return;
        }

        // Returned content must be JSON data
        if (empty($name) || empty($email) || empty($message)) {
            echo json_encode(array('type' => "danger", 'message' => 'All fields are required'));
            return;
        }

        if (BlogCommentsModel::createComment($post_id, $message, "", "", array('name' => $name, 'email' => $email))) {
            // insertion successful, redirect to post page with uploaded comment
            echo json_encode(array('type' => "success", 'message' => 'Your comment was posted successfully and is under review'));
        } else {
            echo json_encode(array('type' => "danger", 'message' => 'Update failed. Please try again.'));
        }

    }

    public function newCommentReply($params){
        $comment_id = $params[0];

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($name) || empty($email) || empty($message)) {
            echo json_encode(array('type' => "danger", 'message' => 'All fields are required'));
            return;
        }

        if (BlogCommentsRepliesModel::createReply($comment_id, $message, "", "", array('name' => $name, 'email' => $email))) {
            // insertion successful, redirect to post page with uploaded comment
            echo json_encode(array('type' => "success", 'message' => 'Your reply was posted successfully and is under review'));
        } else {
            echo json_encode(array('type' => "danger", 'message' => 'Update failed. Please try again.'));
        }
    }

    public function cart(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
        ];

        include VIEW_PATH . '/home/cart.php'; 
    }

    public function checkout(){ 
        $products = $_POST['selectedProducts'];
        $_SESSION['selected_products'] = $products;

        // send success message back to client
        echo json_encode(array('status' => 'success'));
    }

    public function requestContactDetailsForm(){
        $action = $_GET['action'];

        if(!isset($_SESSION['selected_products']) && empty($_SESSION['selected_products'])){
            redirect(BASE_URL . '/cart');
            return;
        }

        $products = $_SESSION['selected_products']; 
        $total_price = 0;

        foreach ($products as $product) {
            $total_price += (int) $product['total_price'];
        }

        if(isset($action) && !empty($action)){
            if($action === "quote" || $action === "invoice"){
                $data = [
                    'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
                    'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
                    "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
                    "action" => $action
                ];
        
                include VIEW_PATH . '/home/contact-details.php';
            }else{
                include VIEW_PATH . '/home/404.php';
                return;
            }
        }else{
            include VIEW_PATH . '/home/404.php';
            return;
        }
    }

    public function sendQuote(){
        $lname = $_POST['last_name'] ?? '';
        $fname = $_POST['first_name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';
        $state = $_POST['state'] ?? '';
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $additionalNotes = $_POST['additionalNotes'] ?? '';
        $selected_products = $_SESSION['selected_products'];

        if(empty($lname) || empty($fname) || empty($phone) || empty($email) || empty($address) || empty($state) || empty($city) || empty($state)){
            // Validate the data before sending it
            echo json_encode(array('type' => "danger", 'message' => 'All fields are required'));
            return;
        }

        $formatted_address = "$address $city $state state.";
        $order_id = OrdersModel::createOrder($fname, $lname, $phone, $email, $formatted_address, $additionalNotes, 2); 
        // Create new order with contact details
        if($order_id){
            foreach($selected_products as $product) {
                OrderProductModel::createOrderProduct($order_id, $product['product_id'], $product['type'], isset($product['weight'])? $product['weight'] . $product['unit'] : '', $product['quantity'], $product['total_price']);
            }
            // Send mail at this line (To alert admin that a request for quote was made).
            unset($_SESSION['selected_products']);
            echo json_encode(array('type' => "success", "redirect" => BASE_URL . "/quote/success"));
        }else{
            echo json_encode(array('type' => "danger", 'message' => 'All fields are required'));
        }
    }

    public function quoteSuccessMessage(){
        $data = [
            'poultry_feed_brands' => BrandsModel::getBrandsByCategory("poultry"),
            'fish_feed_brands' => BrandsModel::getBrandsByCategory("fish"),
            "drug_brands" => BrandsModel::getBrandsByCategory('drug'),
        ];

        include VIEW_PATH . '/home/quote-success.php';
    }
}
