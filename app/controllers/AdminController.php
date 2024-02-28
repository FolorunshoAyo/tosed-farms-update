<?php
// AdminController.php

require_once MODEL_PATH . '/AdminModel.php';

class AdminController {
    public function login() {
        include VIEW_PATH . '/admin/login.php';
    }

    public function authenticate() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (AdminModel::authenticate($username, $password)) {
            $_SESSION['admin_logged_in'] = true;
            redirect(BASE_URL . '/admin/dashboard');
        } else {
            redirect(BASE_URL . '/admin/login?error=1');
        }
    }

    public function logout() {
        // Logout the admin by destroying the session
        session_destroy();
        redirect(BASE_URL . '/admin/login'); // Redirect to admin login page
    }

    public function dashboard() {
        // Check if admin is logged in
        if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
            // Admin not logged in, redirect to login page
            redirect(BASE_URL . '/admin/login');
        }

        include VIEW_PATH . '/admin/dashboard.php';
    }
}
