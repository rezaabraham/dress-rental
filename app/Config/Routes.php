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

$routes->get('admin/product/', 'AdminProductsController::index');

$routes->get('admin/product/create', 'AdminProductsController::create');

$routes->post('admin/product/store', 'AdminProductsController::store');
$routes->post('admin/product/upload-gallery/(:num)', 'AdminProductsController::uploadGallery/$1');


$routes->get('admin', 'AuthController::index');
$routes->get('auth/logout', 'AuthController::logout');
$routes->post('admin/do-login', 'AuthController::doLogin');

$routes->get('brand', 'BrandController::index');
$routes->post('brand/store', 'BrandController::store');
$routes->post('brand/store', 'BrandController::store');

$routes->post('products/delete/(:num)', 'ProductsController::delete/$1');
