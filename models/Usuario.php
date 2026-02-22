<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'token', 'confirmado', 'rol'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $token;
    public $confirmado;
    public $rol;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->rol = $args['rol'] ?? null;
    }

    // Aquí añadire todos los metodos:

    public function hashPassword(): void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken():void 
    {
        $this->token = substr(bin2hex(random_bytes(8)), 0, 15);
    }


}