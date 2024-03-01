<?php
class BrandedProductsModel
{
    public static function countAll($brand_id){
        try{
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM branded_products WHERE brand_id = '$brand_id'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }catch (PDOException $e) {
            return false;
        }
    }
    
    // public static function create($name, $category, $image_url, $featured_status, $visibility_status)
    // {
    //     try{
    //         global $pdo;
    //         $query = "INSERT INTO brands (name, category, image_url, featured_status, visibility_status) 
    //                   VALUES (?, ?, ?, ?, ?)";
    //         $stmt = $pdo->prepare($query);
    //         $stmt->execute([$name, $category, $image_url, $featured_status, $visibility_status]);

    //     }catch (PDOException $e) {
    //         return false;
    //     }
    // }

    public static function getAllBrandedProducts($product_type) {
        try{
            global $pdo;

            $query = "SELECT branded_products.*, brands.name as brand_name
            FROM branded_products
            INNER JOIN brands ON branded_products.brand_id = brands.brand_id WHERE brands.catergory = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$product_type]);

            $brandedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brandedProducts;
        }catch (PDOException $e) {
            return false;
        }
    }
    
    // public static function updateBrandedProduct($brand_id, $name, $category, $image_url, $featured_status, $visibility_status)
    // {
    //     try{
    //         global $pdo;

    //         $query = "UPDATE brands
    //         SET name = ?, category = ?, image_url = ?, featured_status = ?, visibility_status = ?
    //         WHERE brand_id = ?";
    //         $stmt = $pdo->prepare($query);
    //         return $stmt->execute([$name, $category, $image_url, $featured_status, $visibility_status, $brand_id]);

    //     }catch (PDOException $e) {
    //         return false;
    //     }
    // }



    // public static function deleteBrandedProduct($brand_id)
    // {
    //     $query = "DELETE FROM brands WHERE brand_id = ?";
    //     $stmt = $this->db->prepare($query);
    //     return $stmt->execute([$brand_id]);
    // }
}
