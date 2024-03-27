<?php
class OrderProductModel
{
    public static function total($order_id) {
        try{
            global $pdo;

            $query = "SELECT COUNT(*) as total FROM order_product WHERE order_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$order_id]);

            $orderProductsTotal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $orderProductsTotal['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function createOrderProduct($order_id, $product_id, $type, $weight, $quantity, $total_price)
    {
        try{
            global $pdo;
            $query = "INSERT INTO order_product (order_id, product_id, type, weight, quantity, total_price) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$order_id, $product_id, $type, $weight, $quantity, $total_price]);

            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getOrderProductById($order_id)
    {
        try{
            global $pdo;

            $query = "SELECT * FROM order_product WHERE order_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$order_id]);

            $orderProducts = $stmt->fetch(PDO::FETCH_ASSOC);

            return $orderProducts;
        }catch (PDOException $e) {
            return false;
        }
    }

    // public static function deleteBrand($brand_id)
    // {
    //     try{
    //         global $pdo;

    //         $query = "DELETE FROM brands WHERE brand_id = ?";
    //         $stmt = $pdo->prepare($query);
    //         return $stmt->execute([$brand_id]);
            
    //     }catch (PDOException $e) {
    //         return false;
    //     }
    // }
}
