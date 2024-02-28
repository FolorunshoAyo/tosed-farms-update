<?php
// index.php

// Define a constant for the base path of the application
define('BASEPATH', __DIR__);

// Load the necessary files
require_once 'config/config.php'; // Configuration file
require_once 'helpers/helpers.php'; // Helper functions
require_once 'core/router.php'; // Router class

// Initialize the router
$router = new Router();

// Define routes
$router->get('/', 'HomeController@index'); // Home page
$router->get('/about', 'AboutController@index'); // About page
$router->post('/contact', 'ContactController@store'); // Contact form submission

// Admin routes
$router->get('/tosed-farms/admin/login', 'AdminController@login'); // Admin login page
$router->post('/tosed-farms/admin/authenticate', 'AdminController@authenticate'); // Admin authentication
$router->get('/tosed-farms/admin/logout', 'AdminController@logout'); // Admin logout
$router->get('/tosed-farms/admin/', 'AdminController@dashboard'); // Admin dashboard

// Dispatch the request
$router->dispatch();

?>