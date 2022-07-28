<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::home', ['as' => 'home']);
$routes->get('/user', 'Home::user', ['as' => 'users']);

// filter declared in app/Config/Filter $aliases
// accessed by guest user
$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->group('', ['namespace' => 'App\Controllers\Auth'], function($routes) {
        $routes->get('/register', 'Register::index', ['as' => 'reg-view']);
        $routes->post('/register', 'Register::auth', ['as' => 'registering']);

        $routes->get('/login', 'Login::index', ['as' => 'log-view']);
        $routes->post('/login', 'Login::auth', ['as' => 'login']);
    });
});

// accessed by authenticate user
$routes->group('', ['filter' => 'auth'], function ($routes) {

    // only for admin user
    $routes->group('', ['filter' => 'admin'], function ($routes) {
        $routes->get('/admin', 'Home::admin', ['as' => 'admin']);
    });

    // only for employee user
    $routes->group('', ['filter' => 'employee'], function ($routes) {
        $routes->get('/karyawan', 'Home::karyawan', ['as' => 'employee']);
    });

    $routes->group('', ['namespace' => 'App\Controllers\Auth'], function($routes) {
        $routes->get('/logout', 'Login::logout', ['as' => 'logout']);
    });
});

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
