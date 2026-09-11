<?php
// Requerimos el controlador del login
require_once "controller/Usuariocontroller.php";
session_start();

$controller = new UsuarioController();

// 1. Verificamos si se enviaron datos por POST (Login)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]))  {

if ($_POST["action"] == "register"){
//recoge datos
$username = $_POST["username"];
$password = $_POST["password"];


// registrar el usuario
if ($controller->registrar($username, $password))   {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar el usuario.";
}

}

//accion de inicio de sesion
if($_POST["action"] == "login"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    //intentra iniciar sesion
    $user = $controller ->Login($username,$password);

    if($user){
        //usuario autenticado guardamos la sesion y redirigimos 
        $_SESSION["user"] = $user;
        header("Location: crud/index.php");
    } else {
        //Error  en la autenticacion
        echo "Usuario o contraseña incorrectos";

    }
}

}

//accion de cierre de sesion
if (isset($_GET["action"]) && $_GET["action"] == "logout"  ){
//destruir la secion y redirigir
 session_destroy();
 header ("Location: index.php");
}

//mostrar vistas del estado de la sesion 
if (isset($_SESSION["user"])){
    //si hay una sesion activa mostrar el panel principal
    require_once "view/dashboard.php";
} else {
    //si no hay sesion, mostar la pagina de inicio de secion
    require_once "view/login.php";
}
?>