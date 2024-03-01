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

// Define front routes
$router->get('/', 'HomeController@index');
$router->get('/about', 'AboutController@index');
$router->post('/contact', 'ContactController@store');

// Admin routes
$router->get('/tosed-farms/admin/register', 'AdminController@registrationForm'); // Display registration form
$router->post('/tosed-farms/admin/register', 'AdminController@register');
$router->get('/tosed-farms/admin/login', 'AdminController@login');
$router->post('/tosed-farms/admin/authenticate', 'AdminController@authenticate');
$router->get('/tosed-farms/admin/logout', 'AdminController@logout');
$router->get('/tosed-farms/admin/', 'AdminController@dashboard');   
$router->get('/tosed-farms/admin/brands/', 'AdminController@listBrands');   
$router->get('/tosed-farms/admin/brand/new', 'AdminController@newBrandForm');   
$router->post('/tosed-farms/admin/brand/new', 'AdminController@newBrand');   
$router->post('/tosed-farms/admin/brand/edit', 'AdminController@editBrand');   
$router->get('/tosed-farms/admin/products/branded/poultry-feeds', 'AdminController@listPoultryFeeds'); 
$router->get('/tosed-farms/admin/products/branded/fish-feeds', 'AdminController@listFishFeeds'); 
$router->get('/tosed-farms/admin/products/branded/veterinary-products', 'AdminController@listVeteribaryProducts'); 

// Dispatch the request
$router->dispatch();

?>