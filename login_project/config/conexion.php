<?php
// config/conexion.php
class Conexion {
    private $host = "localhost";
    private $dbname = "crud";
    private $user = "root";
    private $password = "";
    public $conn;


    public function __construct(){
        try{
            //aca se crea la conexion a la BD usando PDO 
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PODException $e) {
                die("Error en la conexion: " . $e->getMessage());

        }
    }
}
?>
