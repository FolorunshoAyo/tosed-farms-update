<?php

class AdminModel {
    public static function authenticate($usernameOrEmail, $password, $rememberMe = false) {
        try {
            global $pdo;

            // Prepare SQL statement to retrieve admin by username or email
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username OR email = :email");
            $stmt->execute([':username' => $usernameOrEmail, ':email' => $usernameOrEmail]);

            // Fetch admin record
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if ($admin && password_verify($password, $admin['password'])) {
                if ($rememberMe) {
                    $token = bin2hex(random_bytes(16));
                    setcookie('remember_token', $token, time() + (86400 * 30), '/');
                    // Update 'remember_token' field in database
                    $stmt = $pdo->prepare("UPDATE admins SET remember_token = :token WHERE admin_id = :id");
                    $stmt->execute([':token' => $token, ':id' => $admin['admin_id']]);
                }

                return $admin;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function findByRememberToken($token) {
        try {
            global $pdo;

            $stmt = $pdo->prepare("SELECT * FROM admins WHERE remember_token = ?");
            $stmt->execute([$token]);

            // Fetch admin record
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            return $admin;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function create($firstName, $lastName, $email, $username, $password) {
        try {
            global $pdo;

            // Prepare SQL statement to insert new admin record
            $stmt = $pdo->prepare("INSERT INTO admins (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $username, $email, $password]);

            // Registration successful
            return true;
        } catch (PDOException $e) {
            // Handle database connection or query error
            // Log or display the error message
            return false;
        }
    }

    public static function findById($id) {
        try {
            global $pdo;

            $stmt = $pdo->prepare("SELECT admin_id, first_name, last_name, username, email FROM admins WHERE admin_id = ?");
            $stmt->execute([$id]);

            // Fetch admin record
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $admin;
        } catch (PDOException $e) {
            return false;
        }
    }

}
