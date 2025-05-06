<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('eventos', 'Publicos::eventos');
$routes->get('ambientaciones', 'Publicos::ambientaciones');
$routes->get('productos', 'Publicos::productos');
$routes->get('entidades', 'Publicos::entidades');

$routes->get('/(:segment)', 'EntidadPublic::ver/$1');
$routes->get('/(:segment)/ambientaciones', 'AmbientacionPublic::index/$1');
$routes->get('/(:segment)/ambientacion/(:segment)', 'AmbientacionPublic::ver/$1/$2');
$routes->get('/(:segment)/eventos', 'EventoPublic::index/$1');
$routes->get('/(:segment)/evento/(:segment)', 'EventoPublic::ver/$1/$2');
$routes->get('(:segment)/tienda', 'TiendaPublic::index/$1');
$routes->get('(:segment)/tienda/(:segment)', 'TiendaPublic::categoria/$1/$2');
$routes->get('(:segment)/tienda/producto/(:segment)', 'TiendaPublic::producto/$1/$2');
$routes->get('/(:segment)/(:segment)', 'EntidadPublic::pagina/$1/$2');

// Rutas de usuario



// Rutas para creación
$routes->post('eventos/guardar', 'EventosPublic::guardar');
$routes->post('productos/guardar', 'ProductosPublic::guardar');
$routes->post('tiendas/guardar', 'TiendasPublic::guardar');

$routes->get('eventos/crear', 'EventosPublic::crear');
$routes->get('tiendas/crear', 'TiendasPublic::crear');
$routes->get('productos/crear', 'ProductosPublic::crear');


// Cementerio
$routes->get('welcome', 'Home::welcome');

$routes->get('eventos-V0', 'EventosPublic::index');
$routes->get('tiendas-V0', 'TiendasPublic::index');
$routes->get('productos-V0', 'ProductosPublic::index');

