
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de citas</title>

    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

    <h1>Lista de citas</h1>

    <p>
        <a href="/clinica-odonto/app/controladores/citacontroller.php?accion=crear">Nueva cita</a>
    </p>

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

        <?php foreach ($lista as $fila) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo htmlspecialchars($fila['paciente']); ?></td>
            <td><?php echo htmlspecialchars($fila['doctor']); ?></td>
            <td><?php echo htmlspecialchars($fila['especialidad']); ?></td>
            <td><?php echo $fila['fecha_cita']; ?></td>
            <td><?php echo $fila['hora_cita']; ?></td>
            <td><?php echo htmlspecialchars($fila['motivo'] ?? ''); ?></td>
            <td><?php echo $fila['estado']; ?></td>
            <td>
                <a href="#">Editar</a> |
                <a href="#">Cancelar</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>
