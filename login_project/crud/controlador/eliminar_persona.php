<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("delete from tb_personas where id=$id");

    if ($sql == 1) {
        // Esta línea es la clave: recarga la página limpia sin el ?id=
        header("location:index.php");
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar</div>";
    }
}
?>