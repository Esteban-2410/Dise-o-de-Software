<?php
include "modelos/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("select * from tb_personas where id=$id");
$datos = $sql->fetch_object();

// Solo permitimos diploma si la nota es aprobatoria
if ($datos->nota < 3.0) {
    die("Lo sentimos, el estudiante no ha alcanzado la nota mínima para el diploma.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diploma - <?= $datos->nombre ?></title>
    <style>
        body { font-family: 'Georgia', serif; background-color: #f0f0f0; display: flex; justify-content: center; padding: 50px; }
        .diploma-card {
            width: 800px; height: 550px; background: white; padding: 50px;
            border: 15px double #1a3c6d; position: relative; text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .header { color: #1a3c6d; font-size: 40px; margin-bottom: 20px; }
        .text { font-size: 20px; margin: 20px 0; }
        .nombre-alumno { font-size: 45px; font-weight: bold; color: #333; text-decoration: underline; }
        .nota { font-size: 25px; margin-top: 30px; font-weight: bold; }
        .firma { margin-top: 60px; border-top: 2px solid #333; width: 250px; display: inline-block; }
        .sello { position: absolute; bottom: 40px; right: 50px; width: 100px; opacity: 0.8; }
        
        /* Esto hace que al imprimir no salga el fondo gris del navegador */
        @media print {
            body { background: none; padding: 0; }
            .diploma-card { box-shadow: none; border: 15px double #1a3c6d !important; }
            .btn-imprimir { display: none; }
        }
        .btn-imprimir { background: #1a3c6d; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div>
        <button class="btn-imprimir" onclick="window.print()">Imprimir Diploma</button>
        
        <div class="diploma-card">
            <div class="header">CERTIFICADO DE EXCELENCIA</div>
            <div class="text">Otorgado con orgullo por el Sistema Académico Nixon a:</div>
            
            <div class="nombre-alumno"><?= $datos->nombre ?> <?= $datos->apellido ?></div>
            
            <div class="text">Por haber cumplido satisfactoriamente con los requisitos académicos del curso 2026, obteniendo una calificación meritoria de:</div>
            
            <div class="nota"><?= number_format($datos->nota, 1) ?> / 5.0</div>
            
            <div style="margin-top: 40px;">
                <div class="firma"><br>Firma del Rector</div>
                <div style="width: 100px; display: inline-block;"></div>
                <div class="firma"><br>Coordinación Académica</div>
            </div>
            
            <div class="text" style="font-size: 14px; margin-top: 30px;">Fecha de expedición: <?= date("d/m/Y") ?></div>
        </div>
    </div>
</body>
</html>