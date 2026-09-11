<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Académico - NIXON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        :root {
            --azul-colegio: #1a3c6d;
            --gris-fondo: #f4f7f6;
        }
        body {
            background-color: var(--gris-fondo);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header-institucional {
            background-color: var(--azul-colegio);
            color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card-registro {
            background: white;
            border-radius: 15px;
            border-top: 5px solid var(--azul-colegio);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .tabla-contenedor {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .thead-dark {
            background-color: var(--azul-colegio);
            color: white;
        }
        .btn-registrar {
            background-color: var(--azul-colegio);
            border: none;
            width: 100%;
            font-weight: bold;
        }
        /* Colores para el Modo Oscuro */
   body.dark-mode {
    background-color: #121212 !important;
    color: #e0e0e0;
  }
.dark-mode .card-registro, 
.dark-mode .tabla-contenedor, 
.dark-mode table {
    background-color: #1e1e1e !important;
    color: #e0e0e0 !important;
    border-color: #333 !important;
}
.dark-mode .form-control {
    background-color: #2c2c2c !important;
    color: white !important;
    border: 1px solid #444;
}
.dark-mode .header-institucional {
    background-color: #000 !important;
}
.dark-mode td, .dark-mode th {
    color: #e0e0e0 !important;
    border-bottom: 1px solid #333;
}
    </style>
</head>
<body>
  <div class="form-check form-switch p-3" style="position: absolute; top: 10px; right: 20px; z-index: 1000;">
  <input class="form-check-input" type="checkbox" id="darkModeSwitch">
  <label class="form-check-label text-white fw-bold" for="darkModeSwitch" id="labelSwitch">Modo Oscuro</label>
</div>

    <header class="header-institucional p-4 mb-4">
        <div class="container text-center">
            <h1 class="display-5 fw-bold"><i class="fas fa-graduation-cap me-2"></i>SISTEMA ACADÉMICO - NIXON</h1>
            <p class="mb-0">Gestión de Registro de Personas e Información Estudiantil</p>
        </div>
    </header>
 
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card-registro p-4">
                    <h3 class="text-center mb-4 text-dark"><i class="fas fa-user-plus me-2"></i>Nueva Persona</h3>

                    <?php
                    include "modelos/conexion.php";
                    // Es vital incluir eliminar antes que registro para limpiar la URL
                    include "controlador/eliminar_persona.php";
                    include "controlador/registro_persona.php";
                    ?>
                     <?php if (isset($_POST["btnregistrar"]) && $_POST["nota"] >= 4.5): ?>
                  <script>
                        confetti({
                         particleCount: 150,
                       spread: 70,
                        origin: { y: 0.6 }
                      });
                </script>
                <?php endif; ?>
                    <form method="POST">
                        <div class="mb-2">
                            <label class="form-label fw-bold small">NOMBRE:</label>
                            <input type="text" class="form-control bg-light" name="nombre" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold small">APELLIDO:</label>
                            <input type="text" class="form-control bg-light" name="apellido" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold small">DOCUMENTO:</label>
                            <input type="text" class="form-control bg-light" name="documento" required>
                        </div>
                       <div class="mb-2">
                             <label class="form-label fw-bold small">FECHA NACIMIENTO:</label>
                             <input type="date" class="form-control bg-light" name="fecha" max="2020-12-31" required>
                       </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold small">CORREO:</label>
                            <input type="email" class="form-control bg-light" name="correo" required>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label fw-bold small text-primary">NOTA FINAL (1.0 - 5.0):</label>
                            <input type="number" step="0.1" min="1" max="5" class="form-control" name="nota" placeholder="0.0" required>
                        </div>
                        <button type="submit" class="btn btn-registrar btn-primary p-2" name="btnregistrar" value="ok">
                            <i class="fas fa-save me-2"></i>REGISTRAR
                        </button>
                        <a href="../index.php?action=logout" style="color: red;">
                            Cerrar Sesión</a>
                    </form>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tabla-contenedor p-0">
                    <table class="table table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="py-3 px-4">ID</th>
                                <th scope="col" class="py-3">NOMBRE</th>
                                <th scope="col" class="py-3">APELLIDO</th>
                                <th scope="col" class="py-3">DOCUMENTO</th>
                                <th scope="col" class="py-3 text-nowrap">F. NACIMIENTO</th>
                                <th scope="col" class="py-3">CORREO</th>
                                <th scope="col" class="py-3">NOTA</th>
                                <th scope="col" class="py-3">ESTADO</th>
                                <th scope="col" class="py-3">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conexion->query("select * from tb_personas");
                            while($datos = $sql->fetch_object()) { 
                                // Lógica de aprobación
                                $notaVal = (float)$datos->nota;
                                if ($notaVal >= 3.0) {
                                    $estadoStr = "APROBADO";
                                    $colorBadge = "bg-success";
                                } else {
                                    $estadoStr = "REPROBADO";
                                    $colorBadge = "bg-danger";
                                }
                            ?>
                            <tr class="align-middle">
                                <td class="px-4 fw-bold text-muted"><?= $datos->id ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->apellido ?></td>
                                <td><span class="badge bg-secondary"><?= $datos->documento ?></span></td>
                                <td><?= date("d/m/Y", strtotime($datos->fecha_nac)) ?></td>
                                <td><small><?= $datos->correo ?></small></td>
                                <td class="fw-bold"><?= number_format($notaVal, 1) ?></td>
                                <td>
                                    <span class="badge <?= $colorBadge ?> p-2" style="min-width: 85px;">
                                        <?= $estadoStr ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="modificar_persona.php?id=<?= $datos->id ?>" class="btn btn-outline-warning btn-sm mx-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-outline-danger btn-sm mx-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="diploma.php?id=<?= $datos->id ?>" target="_blank" class="btn btn-outline-primary btn-sm mx-1" title="Generar Diploma">
                                             <i class="fas fa-certificate"></i>
                                            </a>
                                            
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function eliminar() {
            return confirm("¿Estás seguro de eliminar este registro estudiantil?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const switchBtn = document.getElementById('darkModeSwitch');
    const body = document.body;

    // Revisar si ya lo activó antes
    if(localStorage.getItem('dark-mode') === 'enabled'){
        body.classList.add('dark-mode');
        switchBtn.checked = true;
    }

    switchBtn.addEventListener('change', () => {
        if(switchBtn.checked){
            body.classList.add('dark-mode');
            localStorage.setItem('dark-mode', 'enabled');
        } else {
            body.classList.remove('dark-mode');
            localStorage.setItem('dark-mode', 'disabled');
        }
    });
</script>
<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.href = '../index.php';
        }
    });
</script>
</body>
</html>