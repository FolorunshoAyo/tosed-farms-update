<?php
class BrandsModel
{
    public static function total() {
        try{
            global $pdo;

            $query = "SELECT COUNT(*) as total FROM brands";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brandsTotal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $brandsTotal['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function createBrand($name, $category, $image_url, $featured_status, $visibility_status)
    {
        try{
            global $pdo;
            $query = "INSERT INTO brands (name, category, image_url, featured_status, visibility_status) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$name, $category, $image_url, $featured_status, $visibility_status]);

            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getBrandById($brand_id)
    {
        try{
            global $pdo;

            $query = "SELECT * FROM brands WHERE brand_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$brand_id]);

            $brand = $stmt->fetch(PDO::FETCH_ASSOC);

            return $brand;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getBrandByName($brand_name)
    {
        try{
            global $pdo;

            $query = "SELECT * FROM brands WHERE name = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$brand_name]);

            $brand = $stmt->fetch(PDO::FETCH_ASSOC);

            return $brand;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBrands() {
        try{
            global $pdo;

            $query = "SELECT * FROM brands ORDER BY brand_id DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getBrandsByCategory($brand_category) {
        try{
            global $pdo;

            $query = "SELECT * FROM brands WHERE category = '$brand_category' ORDER BY name ASC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getFeaturedBrands() {
        try{
            global $pdo;

            $query = "SELECT * FROM brands WHERE featured_status = 1 ORDER BY name ASC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getBrandsAlphabetically($brand_category){
        try{
            global $pdo;

            $query = "SELECT * FROM brands where category = ? ORDER BY name";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$brand_category]);

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBrandsAlphabetically(){
        try{
            global $pdo;

            $query = "SELECT * FROM brands ORDER BY name";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getUniqueCharacters(){
        try{
            global $pdo;

            $query = "SELECT DISTINCT SUBSTRING(name, 1, 1) AS first_character
            FROM brands
            ORDER BY first_character ASC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brandCharacters = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brandCharacters;
        }catch (PDOException $e) {
            return false;
        }
    }
    
    public static function getBrandsByFirstChar($char){
        try{
            global $pdo;

            $query = "SELECT *
            FROM brands
            WHERE name LIKE '$char%'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateBrand($brand_id, $name, $category, $image_url, $featured_status, $visibility_status)
    {
        try{
            global $pdo;

            $query = "UPDATE brands
            SET name = ?, category = ?, image_url = ?, featured_status = ?, visibility_status = ?
            WHERE brand_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$name, $category, $image_url, $featured_status, $visibility_status, $brand_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateBrandWithoutImage($brand_id, $name, $category, $featured_status, $visibility_status)
    {
        try{
            global $pdo;

            $query = "UPDATE brands
            SET name = ?, category = ?, featured_status = ?, visibility_status = ?
            WHERE brand_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$name, $category, $featured_status, $visibility_status, $brand_id]);

        }catch (PDOException $e) {
            return false;
        }
    }



    public static function deleteBrand($brand_id)
    {
        try{
            global $pdo;

            $query = "DELETE FROM brands WHERE brand_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$brand_id]);
            
        }catch (PDOException $e) {
            return false;
        }
    }
}
