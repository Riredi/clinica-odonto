<?php
    require_once __DIR__ . '/../../modelos/paciente.php';

    $paciente = new Paciente();
    $resultado = $paciente->listar();
    $lista = $resultado->fetchAll();
?>


<!DOCTYPE html>
<html>


    <head>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            table { border-collapse: collapse; width: 100%; max-width: 800px; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            a { text-decoration: none; color: blue; }
        </style>
    </head>


    <body>
        <h1>Lista de pacientes</h1>
        <p><a href="formulario.php">+ Agregar nuevo paciente</a></p>
        <table>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>nombres</th>
                <th>apellidos</th>
                <th>telefono</th>
                <th>email</th>
            </tr>
            <?php foreach($lista as $fila) { ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["dni"]; ?></td>
                    <td><?php echo $fila["nombres"]; ?></td>
                    <td><?php echo $fila["apellidos"]; ?></td>
                    <td><?php echo $fila["telefono"]; ?></td>
                    <td><?php echo $fila["email"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>