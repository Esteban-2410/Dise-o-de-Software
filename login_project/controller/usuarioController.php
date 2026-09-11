<?php
//controller/usuariocontroller.php
require_once "model/usuario.php";

class usuariocontroller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel= new Usuario();
    }

    public function login($username, $password) {
        return $this->usuarioModel->login($username, $password);
    }


    //metodo para registrar  un usuario con contraseña  encriptada
    public function registrar ($username, $password){
        return $this->usuarioModel->registrar($username, $password);
    }
}



?>