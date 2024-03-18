<?php
// AdminController.php
require_once MODEL_PATH . '/BrandsModel.php';
require_once MODEL_PATH . '/BrandedProductsModel.php';
require_once MODEL_PATH . '/UnbrandedProductsModel.php';
require_once MODEL_PATH . '/BlogPostsModel.php';
require_once MODEL_PATH . '/BlogCommentsModel.php';
require_once MODEL_PATH . '/BlogCommentRepliesModel.php';

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
            'current_page' => $_SERVER['REQUEST_URI'],
            'post' => $post,
            'categories' => BlogPostsModel::getAllBlogCategories(),
            'latest_posts' => BlogPostsModel::getLatestBlogPosts(3),
            'comments_total' => BlogCommentsModel::total($post['post_id']),
            'comments' => BlogCommentsModel::getAllComments($post['post_id'])
        ];

        include VIEW_PATH . '/admin/single-post.php';
    }
}
