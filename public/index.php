<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use MVC\Router;

$router = new Router();

//  Login y registro
$router->get('/login', [AuthController::class, 'login']);

$router->get('/', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

//Comprobar que las rutas existan y les asigna las funciones del controlador 
$router->comprobarRutas();