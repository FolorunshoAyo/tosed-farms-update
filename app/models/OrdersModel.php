<?php
class OrdersModel
{
    public static function total() {
        try{
            global $pdo;

            $query = "SELECT COUNT(*) as total FROM orders";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $ordersTotal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $ordersTotal['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function createOrder($first_name, $last_name, $phone, $email, $address, $additional_notes, $type)
    {
        try{
            global $pdo;
            $query = "INSERT INTO orders (first_name, last_name, phone, email, address, additional_notes, type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$first_name, $last_name, $phone, $email, $address, $additional_notes, $type]);

            return $pdo->lastInsertId();
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getOrderById($order_no)
    {
        try{
            global $pdo;

            $query = "SELECT * FROM orders WHERE order_no = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$order_no]);

            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            return $order;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllOrders() {
        try{
            global $pdo;

            $query = "SELECT * FROM orders ORDER BY order_id DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $brands;
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
