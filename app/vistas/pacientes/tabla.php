
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de pacientes</title>

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

    <h1>Lista de pacientes</h1>

    <p>
        <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=crear">Agregar nuevo paciente</a>
        |
        <a href="/clinica-odonto/index.php">Volver al inicio</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($lista as $fila) { ?>

        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo htmlspecialchars($fila['dni']); ?></td>
            <td><?php echo htmlspecialchars($fila['nombres']); ?></td>
            <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
            <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
            <td><?php echo htmlspecialchars($fila['email']); ?></td>
            <td><?php echo htmlspecialchars($fila['fecha_nacimiento'] ?? ''); ?></td>
            <td>
                <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=editar&id=<?php echo $fila['id']; ?>">Editar</a>
                |
                <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=eliminar&id=<?php echo $fila['id']; ?>"
                   onclick="return confirm('¿Eliminar este paciente?')">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>
