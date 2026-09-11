<?php

if (!empty($_POST["btnregistrar"])) {
    // Verificamos que todos los campos no estén vacíos
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["documento"]) and !empty($_POST["fecha"]) and !empty($_POST["correo"]) and isset($_POST["nota"])) {
        
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $documento = $_POST["documento"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        $nota = $_POST["nota"];

        // Lógica de validación de edad (Mínimo 6 años)
        $anio_nacimiento = date("Y", strtotime($fecha));
        $anio_actual = date("Y");

        if (($anio_actual - $anio_nacimiento) < 6) {
            echo '<div class="alert alert-danger">Error: El estudiante debe tener al menos 6 años.</div>';
        } else {
            // Si tiene 6 años o más, procedemos al registro
            $sql = $conexion->query(" INSERT INTO tb_personas (nombre, apellido, documento, fecha_nac, correo, nota) VALUES ('$nombre', '$apellido', '$documento', '$fecha', '$correo', $nota) ");

            if ($sql == 1) {
                echo '<div class="alert alert-success">Persona registrada correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar: ' . $conexion->error . '</div>';
            }
        }

    } else {
        echo '<div class="alert alert-warning">Uno o más campos están vacíos</div>';
    }
}

?>