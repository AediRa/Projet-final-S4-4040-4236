<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('accueil', 'Accueil::index');
//$routes->get('profil', 'Profil::index');

// Page pour admins
//$routes->get('admin', 'AdminController::index', ['filter' => 'auth:admin']);

// Page pour clients
//$routes->get('home', 'HomeController::index', ['filter' => 'auth:user']);

$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');

// client
$routes->group('', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('home', 'ClientController::index');
    $routes->get('depot', 'ClientController::depot');
    $routes->get('retrait', 'ClientController::retrait');
    $routes->get('transfert', 'ClientController::transfert');
    $routes->get('historique', 'ClientController::historique');
});

// admin
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'AdminController::index');
    $routes->get('prefixes', 'AdminController::prefixes');
    $routes->get('types-operation', 'AdminController::typesOperation');
    $routes->get('frais', 'AdminController::frais');
    $routes->get('clients', 'AdminController::clients');
});