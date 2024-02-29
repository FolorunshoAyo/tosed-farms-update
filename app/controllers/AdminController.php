<?php
// AdminController.php
require_once MODEL_PATH . '/AdminModel.php';

class AdminController {
    public function login() {
        if (isset($_COOKIE['remember_token'])) {
            // Check if the remember token exists in the database
            $rememberToken = $_COOKIE['remember_token'];
            $admin = AdminModel::findByRememberToken($rememberToken);

            if ($admin) {
                redirect(BASE_URL . '/admin/');
            }
        }

        include VIEW_PATH . '/admin/login.php';
    }

    
    public function registrationForm(){
        include VIEW_PATH . '/admin/registration.php';
    }

    public function register(){
        // Collect form data
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Server-side validation
        if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
            $_SESSION['error_message'] = 'All fields are required.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $_SESSION['error_message'] = 'Passwords do not match.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = 'Invalid email format.';
            redirect(BASE_URL . '/admin/register');
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create new admin record in the database using AdminModel
        if (AdminModel::create($firstName, $lastName, $email, $username, $hashedPassword)) {
            // Registration successful, redirect to login page with success message
            $_SESSION['success_message'] = 'Registration successful! You can now login.';
            redirect(BASE_URL . '/admin/login');
        } else {
            // Registration failed, redirect back to registration form with error
            $_SESSION['error_message'] = 'Registration failed. Please try again.';
            redirect(BASE_URL . '/admin/register');
        }
    }

    public function authenticate() {
        $usernameOrEmail = $_POST['login_input'] ?? '';
        $password = $_POST['password'] ?? '';
        $rememberMe = isset($_POST['remember_me']);

        $admin = AdminModel::authenticate($usernameOrEmail, $password, $rememberMe);

        if ($admin) {
            $_SESSION['admin_id'] = $admin['admin_id'];
            redirect(BASE_URL . '/admin/');
        } else {
            $_SESSION['error_message'] = 'Invalid username/email or password.';
            redirect(BASE_URL . '/admin/login');
        }
    }

    public function logout() {
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            setcookie('remember_token', '', time() - 3600, '/'); // Expire the cookie
        }

        session_destroy();
        redirect(BASE_URL . '/admin/login'); // Redirect to admin login page
    }

    public function dashboard() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/dashboard.php';
    }

    public function listBrands() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/dashboard.php';
    }

    public function newBrand() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/dashboard.php';
    }

    public function newBrandForm() { 
        $data = [
            'admin_details' => AdminModel::findById($_SESSION['admin_id']),
            'current_page' => $_SERVER['REQUEST_URI']
        ];

        include VIEW_PATH . '/admin/dashboard.php';
    }
}
