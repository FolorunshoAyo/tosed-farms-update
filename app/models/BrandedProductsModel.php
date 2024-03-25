<?php
class BrandedProductsModel
{
    public static function total(){
        try{
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM branded_products");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

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
    
    public static function create($brand_id, $name, $net_weight, $availability_status, $description, $price, $show_price)
    {
        try{
            global $pdo;
            $query = "INSERT INTO branded_products (brand_id, name, net_weight, availability_status, description, price, show_price) 
                      VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$brand_id, $name, $net_weight, $availability_status, $description, $price, $show_price]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBrandedProducts($product_type) {
        try{
            global $pdo;

            $query = "SELECT branded_products.*, brands.name as brand_name, brands.brand_id as brand_id
            FROM branded_products
            INNER JOIN brands ON branded_products.brand_id = brands.brand_id WHERE brands.category = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$product_type]);

            $brandedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brandedProducts;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBrandedProductsTotal($product_type) {
        try{
            global $pdo;

            $query = "SELECT branded_products.*, brands.category as brand_category
            FROM branded_products
            INNER JOIN brands ON branded_products.brand_id = brands.brand_id WHERE brands.category = ?
            ORDER BY branded_products.name ASC";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$product_type]);

            $brandedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brandedProducts;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllSingleBrandProducts($brand_name){
        try{
            global $pdo;

            $query = "SELECT branded_products.*, brands.name as brand_name
            FROM branded_products
            INNER JOIN brands ON branded_products.brand_id = brands.brand_id WHERE brands.name = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$brand_name]);

            $brandedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brandedProducts;
        }catch (PDOException $e) {
            return false;
        }
    }
    
    public static function update($product_id, $brand_id, $name, $net_weight, $availability_status, $description, $price, $show_price)
    {
        try{
            global $pdo;

            $query = "UPDATE branded_products
            SET brand_id = ?, name = ?, net_weight = ?, availability_status = ?, description = ?, price = ?, show_price = ?
            WHERE product_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$brand_id, $name, $net_weight, $availability_status, $description, $price, $show_price, $product_id]);

        }catch (PDOException $e) {
            return false;
        }
    }



    public static function deleteProduct($product_id)
    {
        try{
            global $pdo;

            $query = "DELETE FROM branded_products WHERE product_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$product_id]);
            
        }catch (PDOException $e) {
            return false;
        }
    }
}
