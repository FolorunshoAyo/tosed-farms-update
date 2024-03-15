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
            'brand_name' => $brand_name, 
        ];

        include VIEW_PATH . "/home/single-brand.php";
    }
}