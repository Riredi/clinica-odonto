<?php
    require_once __DIR__ . '/../../modelos/Doctor.php';

    $doctor = new Doctor();
    $resultado = $doctor->listar();
    $lista = $resultado->fetchAll();
?>

<!DOCTYPE html>
<html>


    <head>
        <!--nota: esto es una plantilla para las tablas-->
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            table { border-collapse: collapse; width: 100%; max-width: 800px; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            a { text-decoration: none; color: blue; }
        </style>
    </head>


    <body>
        <h1>Lista de Doctores</h1>
        <p><a href="formulario.php">+ Agregar nuevo doctor</a></p>

        <table>
            <tr>
                <th>ID</th>
                <th>CMP</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            
            <?php foreach($lista as $fila) { ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["cmp"]; ?></td>
                    <td><?php echo $fila["nombres"]; ?></td>
                    <td><?php echo $fila["apellidos"]; ?></td>
                    <td><?php echo $fila["especialidad"]; ?></td>
                    <td><?php echo $fila["telefono"]; ?></td>
                    <td>
                        <a href="../../controladores/DoctorController.php?accion=editar&id=<?php echo $fila['id']; ?>">Editar</a>
                        <a class="btn-del" href="../../controladores/DoctorController.php?accion=eliminar&id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar este doctor?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>