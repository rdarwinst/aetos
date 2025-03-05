<?php

namespace App;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'users';
    protected static $columnasDB = ['id', 'name', 'lastname', 'email', 'password', 'token'];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$errores['email'] = 'Email field cannot be empty.';
        }
        if (!$this->password) {
            self::$errores['password'] = 'Password field cannot be empty.';
        }

        return self::$errores;
    }

    public function validarPassword($password)
    {
        $resultado = password_verify($password, $this->password);
        if (!$resultado) {
            self::$errores['password'] = 'The entered password is incorrect.';
        } else {
            return true;
        }
    }

    public function validarEmail()
    {
        $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        if (!$this->email) {
            self::$errores['email'] = 'The email is required.';
        }

        if (!preg_match($regex, $this->email)) {
            self::$errores['email'] = 'Enter a valid email address.';
        }

        return self::$errores;
    }

    public function crearToken()
    {
        $this->token = uniqid();
    }

    public function comprobarPassword()
    {
        if (!$this->password) {
            self::$errores['password'] = 'The password is required.';
        }
        if (strlen($this->password) < 8) {
            self::$errores['password'] = "The password must be at least 8 characters long.";
        }

        return self::$errores;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}
