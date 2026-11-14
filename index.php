<?php
    session_start();
    if (!isset($_SESSION['usuario']))
    {
        header('Location: app/controladores/AuthController.php');

        exit;    
    }

?>
<!DOCTYPE html>
<html>

    <body>
        <h1>Nombre de usuario: <?php echo $_SESSION['usuario']; ?></h1>
        
        <h2>Modulos de sistema </h2>

        <ul>
            <li><a href="app/controladores/PacienteController.php?accion=listar">Pacientes</a></li>
            <li><a href="app/controladores/DoctorController.php?accion=listar">Doctores</a></li>
            <li><a href="app/controladores/CitaController.php?accion=listar">Citas</a></li>
        </ul>
        
        <br>

        <a href="app/controladores/AuthController.php?accion=cerrar">Cerrar sesion</a>
    </body>
</html>