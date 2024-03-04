<?php
class UnBrandedProductsModel
{
    public static function total(){
        try{
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM unbranded_products");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function countAll($category){
        try{
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM unbranded_products WHERE category = '$category'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }catch (PDOException $e) {
            return false;
        }
    }
    
    public static function create($category, $name, $manufacturer, $availability_status, $description, $price)
    {
        try{
            global $pdo;
            $query = "INSERT INTO unbranded_products (category, name, manufacturer, availability_status, description, price) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$category, $name, $manufacturer, $availability_status, $description, $price]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllUnBrandedProducts($product_type) {
        try{
            global $pdo;

            $query = "SELECT *
            FROM unbranded_products
            WHERE category = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$product_type]);

            $unbrandedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $unbrandedProducts;
        }catch (PDOException $e) {
            return false;
        }
    }
    
    public static function update($product_id, $category, $name, $manufacturer, $availability_status, $description, $price)
    {
        try{
            global $pdo;

            $query = "UPDATE unbranded_products
            SET category = ?, name = ?, manufacturer = ?, availability_status = ?, description = ?, price = ?
            WHERE product_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$category, $name, $manufacturer, $availability_status, $description, $price, $product_id]);

        }catch (PDOException $e) {
            return false;
        }
    }



    // public static function deleteBrandedProduct($brand_id)
    // {
    //     $query = "DELETE FROM brands WHERE brand_id = ?";
    //     $stmt = $this->db->prepare($query);
    //     return $stmt->execute([$brand_id]);
    // }
}
