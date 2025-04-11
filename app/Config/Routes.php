<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//$routes->get('product', 'ProductsController::show');

$routes->get('home', 'Home::index');

$routes->get('/', 'CatalogController::index');

$routes->get('dashboard', 'DashboardController::index');

$routes->get('/catalog/(:num)', 'CatalogController::show/$1');

$routes->get('/product/(:segment)', 'ProductsController::show/$1');

// $routes->get('admin/product/', 'AdminProductsController::index');

//$routes->get('admin/product/create', 'AdminProductsController::create');

$routes->post('admin/product/store', 'AdminProductsController::store');
//$routes->post('admin/product/upload-gallery/(:num)', 'AdminProductsController::uploadGallery/$1');


$routes->get('admin', 'AuthController::index');
$routes->get('auth/logout', 'AuthController::logout');
$routes->post('admin/do-login', 'AuthController::doLogin');

$routes->get('brand', 'BrandController::index');
$routes->post('brand/store', 'BrandController::store');
$routes->post('brand/update/(:num)', 'BrandController::update/$1');
$routes->post('brand/delete/(:num)', 'BrandController::delete/$1');



$routes->get('product/', 'ProductsController::index');
$routes->get('product-create', 'ProductsController::create');
$routes->get('product/edit/(:num)', 'ProductsController::edit/$1');
$routes->post('product/store', 'ProductsController::store');
$routes->post('products/delete/(:num)', 'ProductsController::delete/$1');
$routes->post('product-upload/(:num)', 'ProductsController::upload/$1');
$routes->post('product/update/(:num)', 'ProductsController::update/$1');

$routes->get('order', 'OrderController::index');
$routes->get('order/create', 'OrderController::create');
$routes->post('order/store', 'OrderController::store');

$routes->get('ajax/products/get', 'OrderController::ajaxGetProducts');

$routes->get('media/show/(:segment)/(:any)', 'MediaController::show/$1/$2');

$routes->get('mockup/product/detail', 'Mockup::productDetail3w');
