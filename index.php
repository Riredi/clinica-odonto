<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: app/vistas/login.php'); 
        exit;    
    }
    if (isset($_GET['accion']) && $_GET['accion'] === 'cerrar') {
        session_destroy();
        header('Location: app/vistas/login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel Principal - Clínica</title>
    </head>
    <body>
        <h1>Nombre de usuario: <?php echo htmlspecialchars($_SESSION['admin']); ?></h1>
        <h2>Modulos de sistema</h2>
        <ul>
            <li><a href="app/controladores/PacienteController.php?accion=listar">Pacientes</a></li>
            <li><a href="app/controladores/DoctorController.php?accion=listar">Doctores</a></li>
            <li><a href="app/controladores/CitaController.php?accion=listar">Citas</a></li>
        </ul>
        <br>
        <a href="index.php?accion=cerrar">Cerrar sesion</a>
    </body>
</html>