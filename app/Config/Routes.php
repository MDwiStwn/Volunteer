<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
// Atur halaman 404 kustom
$routes->get('/health', function(){
    return "Server OK!";
});

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Rute untuk halaman utama dan halaman statis lainnya
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index'); // <- FIX disini
$routes->get('/programs', 'ProgramController::index');
$routes->get('/contact', 'ContactController::index');
$routes->get('/donate', 'DonationController::index');

// Rute dinamis untuk detail program berdasarkan slug.
// (:segment) adalah placeholder untuk string apapun (misal: 'bantu-pendidikan-anak')
// $1 akan meneruskan nilai dari (:segment) sebagai argumen ke metode detail().
$routes->get('/program/(:segment)', 'ProgramController::detail/$1');

// Rute untuk proses backend yang diakses via POST (form submission)
$routes->post('/contact/submit', 'ContactController::submitContact');
$routes->post('/donation/process', 'DonationController::process');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
