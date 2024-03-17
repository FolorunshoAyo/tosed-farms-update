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
}
