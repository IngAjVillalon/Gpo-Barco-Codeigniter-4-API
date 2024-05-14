<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('entrada/(:alphanum)','PruebaConexion::entrada/$1');

$routes->get('salida/(:alphanum)','PruebaConexion::salida/$1');

$routes->resource('querybyrfc/', ['controller'=>'QueryByRFC']);


//$routes->resource('querybyrfc2', ['controller' => 'QueryByRFC']);
// Would create routes like:
//$routes->get('querybyrfc2', '\App\Controllers\QueryByRFC::salida');

$routes->get('querybyrfc2/salida/(:alphanum)', 'QueryByRFC::salida/$1');
//$routes->get('querybyrfc2/salida/', 'QueryByRFC::salida');

$routes->get('querybyrfc2/entrada/(:alphanum)', 'QueryByRFCe::entrada/$1');

$routes->get('query-by-rfc-all/(:alphanum)', 'QueryByRFCAll::all/$1', ['filter'=>'cors']);





