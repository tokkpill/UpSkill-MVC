<?php

// Carga el archivo app.php una sola vez usando la ruta absoluta del sistema, 
//inicializando configuración, helpers y conexión necesarios para la app.
require_once __DIR__ . '/../includes/app.php';

// Importa las clases AuthController y Router 
//para poder usarlas sin escribir su ruta completa dentro de este archivo.
//(ESTAS RUTAS SON DEFINIDAS EN EL GULPFILE.JS)
use Controllers\AuthController;
use MVC\Router;

// Crea una instancia del Router, que será el encargado de registrar y dirigir 
//las URLs hacia el controlador correspondiente.
// ¿que es una instancia?
//instanciar = crear on objeto
//la clase router es un molde, la instancia es una gelatina ya hecha que uso ese molde:
//ESTOY CREANDO UN OBJETO QUE CONTIENE:
//1.los arreglos donde se guardarán rutas
//2.las funciones para registrarlas
//3.la lógica para ejecutarlas
//new router entonces, crea un objeto real del tipo router para poder usar sus funciones 
$router = new Router();


//A considera:

//GET
//se usa para pedir información o mostrar una vista (el navegador hace una petición GET.)
//cuando alguien VISITA la página, muéstrale el formulario

//POST
// se usa para enviar datos al servidor COMO PRESIONAR UN ENVIAR FORMULARIIO (se usa para enviar datos al servidor)
// cuando el formulario se envíe, procesa los datos

//ESTRUCTURA DE LAS LLAMADAS GET/POST
// $router->get(...) "registra una ruta que responderá a peticiones GET"
// '/login' "Si el usuario escribe: localhost:3000/login" el router detecta esa ruta.

//[AuthController::class, 'login'] "Esto indica qué código ejecutar cuando se visite /login"
//Es un arrgelo con AuthController::class que hace referencia hacia esa clase 
//y 'login' es el metodo a ejecutar DE ESA CLASE

$router->get('/login', [AuthController::class, 'login']);

// Define la ruta raíz "/" para mostrar el formulario de registro (GET)
$router->get('/', [AuthController::class, 'registro']);

// Define la ruta "/registro" para procesar el envío del formulario (POST)
$router->post('/registro', [AuthController::class, 'registro']);

//Comprobar que las rutas existan y les asigna las funciones del AuthControlador 
$router->comprobarRutas();