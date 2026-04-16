<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'BmiController::index');
$routes->post('/bmi/hitung', 'BmiController::hitungBmi');
$routes->get('/diabetes', 'BmiController::diabetes');
$routes->post('/diabetes/hitung', 'BmiController::hitungDiabetes');
