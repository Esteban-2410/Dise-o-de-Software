<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["documento"]) and !empty($_POST["fecha"]) and !empty($_POST["correo"])) {
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $documento = $_POST["documento"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        // He añadido la "s" a tb_personas para que coincida con tu phpMyAdmin
        $sql = $conexion->query("update tb_personas set nombre='$nombre', apellido='$apellido', documento='$documento', fecha_nac='$fecha', correo='$correo' where id=$id ");

        if ($sql == 1) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar Usuario</div>";
        }

    } else {
        echo "<div class='alert alert-warning'>campos vacíos</div>";
    }
}

?>