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
$router->get('/tosed-farms/admin/products/branded/veterinary-products', 'AdminController@listVeterinaryProducts'); 
$router->get('/tosed-farms/admin/products/branded/new', 'AdminController@newBrandedProductForm'); 
$router->post('/tosed-farms/admin/products/branded/new', 'AdminController@newBrandedProduct'); 
$router->post('/tosed-farms/admin/products/branded/edit', 'AdminController@editBrandedProduct'); 
$router->get('/tosed-farms/admin/products/brand/:name/', 'AdminController@listSingleBrandProducts'); 
$router->get('/tosed-farms/admin/products/unbranded/feed-ingredients', 'AdminController@feedIngredientsList'); 
$router->get('/tosed-farms/admin/products/unbranded/feed-ingredient/new', 'AdminController@newFeedIngredientForm'); 
$router->post('/tosed-farms/admin/products/unbranded/feed-ingredient/new', 'AdminController@newFeedIngredient'); 
$router->post('/tosed-farms/admin/products/unbranded/feed-ingredient/edit', 'AdminController@editFeedIngredient'); 
$router->get('/tosed-farms/admin/products/unbranded/feed-additives', 'AdminController@feedAdditivesList'); 
$router->get('/tosed-farms/admin/products/unbranded/feed-additive/new', 'AdminController@newFeedAdditivesForm'); 
$router->post('/tosed-farms/admin/products/unbranded/feed-additive/new', 'AdminController@newFeedAdditive'); 
$router->post('/tosed-farms/admin/products/unbranded/feed-additive/edit', 'AdminController@editFeedAdditive'); 
$router->get('/tosed-farms/admin/products/unbranded/miscellaneous', 'AdminController@miscellaneousList'); 
$router->get('/tosed-farms/admin/products/unbranded/miscellaneous/new', 'AdminController@newMiscellaneousForm'); 
$router->post('/tosed-farms/admin/products/unbranded/miscellaneous/new', 'AdminController@newMiscellaneous'); 
$router->post('/tosed-farms/admin/products/unbranded/miscellaneous/edit', 'AdminController@editMiscellaneous'); 
$router->get('/tosed-farms/admin/posts', 'AdminController@blogsList'); 
$router->get('/tosed-farms/admin/posts/category/:category', 'AdminController@blogsList'); 
$router->get('/tosed-farms/admin/post/single/:title', 'AdminController@blogSingle'); 
$router->get('/tosed-farms/admin/post/new', 'AdminController@newBlogPostForm'); 
$router->post('/tosed-farms/admin/post/new', 'AdminController@newBlogPost'); 
$router->get('/tosed-farms/admin/post/:id/edit', 'AdminController@editBlogPostForm');
$router->post('/tosed-farms/admin/post/:id/edit', 'AdminController@editBlogPost'); 
$router->post('/tosed-farms/admin/post/:id/comment/new', 'AdminController@newPostComment'); 
$router->post('/tosed-farms/admin/post/comment/approve/:id', 'AdminController@approveComment'); 
$router->get('/tosed-farms/admin/post/comment/unapprove/:id', 'AdminController@disproveComment'); 

// Dispatch the request
$router->dispatch();

?>