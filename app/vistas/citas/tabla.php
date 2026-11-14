<?php
    require_once __DIR__ . '/../../modelos/Cita.php';

    $cita = new Cita();
    $resultado = $cita->listar();
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


        <h1>Lista de citas</h1>
        <p><a href="../../controladores/CitaController.php?accion=crear">Nueva cita</a></p>

        <table>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            
            <?php foreach($lista as $fila) {
                $claseEstado = strtolower($fila['estado']); 
            ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo htmlspecialchars($fila["paciente"]); ?></td>
                    <td><?php echo htmlspecialchars($fila["doctor"]); ?></td>
                    <td><?php echo htmlspecialchars($fila["especialidad"]); ?></td>
                    <td><?php echo $fila["fecha_cita"]; ?></td>
                    <td><?php echo $fila["hora_cita"]; ?></td>
                    <td><?php echo htmlspecialchars($fila["motivo"]); ?></td>
                    <td class="<?php echo $claseEstado; ?>"><?php echo $fila["estado"]; ?></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#">Cancelar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        
    </body>
</html>