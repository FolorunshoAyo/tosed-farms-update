<?php
class AdminModel {
    public static function authenticate($username, $password) {
        try {
            // Prepare SQL statement
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);

            // Fetch admin record
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password'])) {
                return true; // Authentication successful
            } else {
                return false; // Authentication failed
            }
        } catch (PDOException $e) {
            // Handle database connection or query error
            die("Database error: " . $e->getMessage());
        }
    }
}
