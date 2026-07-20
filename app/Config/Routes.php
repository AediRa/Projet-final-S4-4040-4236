<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Accueil::index');
$routes->get('accueil', 'Accueil::index');
$routes->get('profil', 'Profil::index');