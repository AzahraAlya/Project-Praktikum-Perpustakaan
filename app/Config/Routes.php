<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'AuthController::index');
$routes->get('/register', 'AuthController::register');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/anggota', 'Dashboard::anggota');
$routes->get('/anggota/tambah', 'Dashboard::tambah');
$routes->post('/anggota/store', 'Dashboard::store');
$routes->get('/anggota/delete/(:any)', 'Dashboard::index');
$routes->delete('/anggota/delete/(:any)', 'Dashboard::delete/$1');
$routes->get('/anggota/edit/(:segment)', 'Dashboard::edit/$1');
$routes->post('/anggota/update/(:segment)', 'Dashboard::update/$1');

$routes->get('/buku', 'Dashboard::buku');
$routes->get('/buku/tambah', 'Dashboard::tambahbuku');
$routes->post('/buku/store', 'Dashboard::storebuku');
$routes->get('/buku/edit/(:segment)', 'Dashboard::editbuku/$1');
$routes->post('/buku/update/(:segment)', 'Dashboard::updatebuku/$1');
$routes->get('/buku/delete/(:any)', 'Dashboard::index');
$routes->delete('/buku/delete/(:any)', 'Dashboard::deletebuku/$1');

$routes->get('/peminjaman', 'C_Peminjaman::index');
$routes->get('/peminjaman/tambah', 'C_Peminjaman::tambah');
$routes->post('/peminjaman/store', 'C_Peminjaman::store');

$routes->get('/pengembalian', 'C_Pengembalian::index');
$routes->get('/peminjaman/kembalikan/(:segment)', 'C_Peminjaman::kembalikan/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
