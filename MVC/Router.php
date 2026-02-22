<?php

namespace MVC;

class Router {
    public array $rutasGET = [];
    public array $rutasPOST = [];

    // Registra una ruta GET
    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    // Registra una ruta POST
    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if ($fn) {
            // La URL existe y tiene una función asociada
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada";
        }
    }

    // Muestra una vista
    public function render($view, $datos = []) {
        foreach ($datos as $key => $value) {
            $$key = $value; // Variable de variable (ej: $titulo)
        }

        ob_start(); // Almacenamiento en memoria temporal
        include_once __DIR__ . "/../views/$view.php";
        $contenido = ob_get_clean(); // Limpia la memoria
        include_once __DIR__ . "/../views/layout.php";
    }
}