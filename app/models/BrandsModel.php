<?php
class BrandModel
{
    public static function createBrand($name, $category, $image_url, $featured_status, $visibility_status)
    {
        try{
            global $pdo;
            $query = "INSERT INTO brands (name, category, image_url, featured_status, visibility_status) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$name, $category, $image_url, $featured_status, $visibility_status]);

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

    public function getAllBrands() {
        try{
            global $pdo;

            $query = "SELECT * FROM brands";
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



    // public static function deleteBrand($brand_id)
    // {
    //     $query = "DELETE FROM brands WHERE brand_id = ?";
    //     $stmt = $this->db->prepare($query);
    //     return $stmt->execute([$brand_id]);
    // }
}
