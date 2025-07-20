<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Mendefinisikan rute untuk halaman beranda
$routes->get('/', 'Home::index');

// Mendefinisikan rute POST untuk pengiriman formulir kontak
$routes->post('home/submitContact', 'Home::submitContact');
