<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//$routes->get('product', 'ProductsController::show');

$routes->get('/', 'CatalogController::index');
$routes->get('/catalog/(:num)', 'CatalogController::show/$1');

$routes->get('/product/(:segment)', 'ProductsController::show/$1');

$routes->get('admin/product/create', 'AdminProductsController::create');

$routes->post('admin/product/store', 'AdminProductsController::store');
$routes->post('admin/product/upload-gallery/(:num)', 'AdminProductsController::uploadGallery/$1');
