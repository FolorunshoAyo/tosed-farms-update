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
$router->get('/tosed-farms/', 'HomeController@index');
$router->get('/tosed-farms/brands', 'HomeController@listAllBrands');
$router->get('/tosed-farms/brand/:name', 'HomeController@listAllBrandProducts');
$router->get('/tosed-farms/categories', 'HomeController@allCategories');
$router->get('/tosed-farms/category/poultry-feeds', 'HomeController@listPoultryFeeds');
$router->get('/tosed-farms/category/fish-feeds', 'HomeController@listFishFeeds');
$router->get('/tosed-farms/category/veterinary-products', 'HomeController@listVeterinaryProducts');
$router->get('/tosed-farms/category/feed-ingredients', 'HomeController@feedIngredientsList');
$router->get('/tosed-farms/category/feed-additives', 'HomeController@feedAdditivesList');
$router->get('/tosed-farms/category/miscellaneous', 'HomeController@miscellaneousList');
$router->get('/tosed-farms/about', 'HomeController@about');
$router->get('/tosed-farms/contact', 'HomeController@contactForm');
$router->get('/tosed-farms/posts', 'HomeController@blogsList');
$router->get('/tosed-farms/posts/category/:category', 'HomeController@blogsList');
$router->get('/tosed-farms/post/:title', 'HomeController@blogSingle');
$router->post('/tosed-farms/post/:id/comment/new', 'HomeController@newPostComment');
$router->post('/tosed-farms/comment/:id/reply/new', 'HomeController@newCommentReply');

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
$router->post('/tosed-farms/admin/brand/delete', 'AdminController@deleteBrand');   
$router->get('/tosed-farms/admin/products/branded/poultry-feeds', 'AdminController@listPoultryFeeds'); 
$router->get('/tosed-farms/admin/products/branded/fish-feeds', 'AdminController@listFishFeeds'); 
$router->get('/tosed-farms/admin/products/branded/veterinary-products', 'AdminController@listVeterinaryProducts'); 
$router->get('/tosed-farms/admin/products/branded/new', 'AdminController@newBrandedProductForm'); 
$router->post('/tosed-farms/admin/products/branded/new', 'AdminController@newBrandedProduct'); 
$router->post('/tosed-farms/admin/products/branded/edit', 'AdminController@editBrandedProduct'); 
$router->post('/tosed-farms/admin/products/branded/delete', 'AdminController@deleteBrandedProduct'); 
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
$router->post('/tosed-farms/admin/products/unbranded/:type/delete', 'AdminController@deleteUnbrandedProduct'); 
$router->get('/tosed-farms/admin/posts', 'AdminController@blogsList'); 
$router->get('/tosed-farms/admin/posts/category/:category', 'AdminController@blogsList'); 
$router->get('/tosed-farms/admin/post/single/:title', 'AdminController@blogSingle'); 
$router->get('/tosed-farms/admin/post/new', 'AdminController@newBlogPostForm'); 
$router->post('/tosed-farms/admin/post/new', 'AdminController@newBlogPost'); 
$router->get('/tosed-farms/admin/post/:id/edit', 'AdminController@editBlogPostForm');
$router->post('/tosed-farms/admin/post/:id/edit', 'AdminController@editBlogPost'); 
$router->post('/tosed-farms/admin/post/:id/comment/new', 'AdminController@newPostComment'); 
$router->post('/tosed-farms/admin/post/:id/comment/edit', 'AdminController@editPostComment'); 
$router->post('/tosed-farms/admin/post/comment/delete/', 'AdminController@deleteComment'); 
$router->post('/tosed-farms/admin/post/comment/approve/', 'AdminController@approveComment'); 
$router->post('/tosed-farms/admin/post/comment/unapprove/', 'AdminController@disproveComment'); 
$router->post('/tosed-farms/admin/comment/:id/reply/new', 'AdminController@newCommentReply');
$router->post('/tosed-farms/admin/post/:id/reply/edit', 'AdminController@editCommentReply'); 
$router->post('/tosed-farms/admin/post/reply/delete/', 'AdminController@deleteReply'); 
$router->post('/tosed-farms/admin/post/reply/approve/', 'AdminController@approveReply'); 
$router->post('/tosed-farms/admin/post/reply/unapprove/', 'AdminController@disproveReply'); 

// Dispatch the request
$router->dispatch();

?>