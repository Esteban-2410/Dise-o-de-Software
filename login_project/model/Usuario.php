<?php
//model usuario.php
require_once "config/conexion.php";

class usuario{
    private $db;

    public function __construct(){
        $this->db = (new Conexion())->conn;
    }


    public function login($username, $password){
        $query = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(":username", $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        //aca se compara la contraseña con la encriptada

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;

    }

    public function registrar($username, $password){
        //aca se encripta la contraseña  antes de guardarla 
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
        //aca se busca al usiario en la BD
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hash);
        return $stmt->execute();
    }

    
}


?>