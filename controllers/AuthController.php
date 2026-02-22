<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AuthController {
    public static function registro(Router $router) {
        $usuario = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar();

            if(empty($alertas)) {
                // Verificar que el usuario no exista
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya está registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el Password
                    $usuario->hashPassword();

                    // Generar el Token
                    $usuario->crearToken();

                    // Guardar en la DB
                    $resultado = $usuario->guardar();

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta en UpSkill',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}