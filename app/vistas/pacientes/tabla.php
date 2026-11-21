<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de pacientes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        .btn-del { color: #c0392b; margin-left: 8px; }
    </style>
</head>
<body>
    <h1>Lista de pacientes</h1>
    <p>
        <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=crear">+ Agregar nuevo paciente</a> |
        <a href="/clinica-odonto/index.php">Volver al inicio</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>

        <?php if (!empty($lista)): ?>
            <?php foreach ($lista as $fila): ?>
                <tr>
                    <td><?php echo (int) $fila['id']; ?></td>
                    <td><?php echo htmlspecialchars($fila['dni']); ?></td>
                    <td><?php echo htmlspecialchars($fila['nombres']); ?></td>
                    <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
                    <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($fila['email']); ?></td>
                    <td><?php echo htmlspecialchars($fila['fecha_nacimiento'] ?? ''); ?></td>
                    <td>
                        <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=editar&id=<?php echo (int) $fila['id']; ?>">Editar</a>
                        <a class="btn-del"
                           href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=eliminar&id=<?php echo (int) $fila['id']; ?>"
                           onclick="return confirm('¿Eliminar este paciente?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No hay pacientes registrados.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>