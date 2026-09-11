<?php
// archivo registrer_user.php
require_once "controller/UsuarioController.php";

$controller = new UsuarioController();

//datos del nuevo  usuario
$username = "nuevo_usuario";
$password = "clave_secreta";

//registrar el usuario
if ($controller->registrar($username, $password)){
    echo "usuario registrado correctamente.";
} else {
    echo "Error  al registrar el usuario.";
}
?>