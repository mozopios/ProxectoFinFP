<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
session_start();
/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('InicioController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// Ruta Inicio
$routes->get("/","InicioController::index");

// Rutas UsuariosController
$routes->get('/users','UsuarioController::mostrarTodos');

$routes->get("/users/view/(:num)","UsuarioController::viewUser/$1");

$routes->get("/users/edit/(:num)","UsuarioController::mostrarEdit/$1");
$routes->post("/users/edit/(:num)","UsuarioController::edit/$1");

$routes->get("/users/add","UsuarioController::mostrarAdd");
$routes->post("/users/add","UsuarioController::add");

$routes->get("/users/baja/(:num)","UsuarioController::bajaAltaUser/$1");
$routes->get("/users/alta/(:num)","UsuarioController::bajaAltaUser/$1");

//Rutas PedidosController
$routes->get("/reserva", "PedidoController::mostrarFormPedido");

$routes->post("/reserva", "PedidoController::addPedido");

//Rutas MenusController
$routes->get("/menus", "MenusController::mostrarMenus");
$routes->get("/menus/view/(:num)","MenusController::viewMenu/$1");

$routes->get("/menus/edit/(:num)","MenusController::mostrarEdit/$1");
$routes->post("/menus/edit/(:num)","MenusController::edit/$1");

$routes->get("/menus/add","MenusController::mostrarAdd");
$routes->post("/menus/add","MenusController::add");

$routes->get("/menus/baja/(:num)","MenusController::bajaAltaMenu/$1");
$routes->get("/menus/alta/(:num)","MenusController::bajaAltaMenu/$1");
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
