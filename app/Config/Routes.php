<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', function ($routes) {
    $routes->get('login', 'Admin\AuthController::login');
    $routes->post('login', 'Admin\AuthController::attemptLogin');
    $routes->get('logout', 'Admin\AuthController::logout');

    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('utilisateurs', 'Admin\UtilisateurController::index');
    $routes->get('utilisateurs/search', 'Admin\UtilisateurController::search');
    $routes->get('utilisateurs/(:num)', 'Admin\UtilisateurController::show/$1');
    $routes->post('utilisateurs/(:num)', 'Admin\UtilisateurController::update/$1');
    $routes->get('utilisateurs/(:num)', 'Admin\UtilisateurController::delete/$1');
    
    $routes->get('employees', 'Admin\EmployeeController::index');
    $routes->get('employees/search', 'Admin\EmployeeController::search');
    $routes->post('employees', 'Admin\EmployeeController::store');
    $routes->post('employees/(:num)', 'Admin\EmployeeController::update/$1');
    $routes->get('employees/(:num)', 'Admin\EmployeeController::delete/$1');
});