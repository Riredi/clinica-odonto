
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar cita</title>
</head>
<body>

    <h1>Registrar cita</h1>

    <form method="POST" action="/clinica-odonto/app/controladores/citacontroller.php?accion=crear">

        <label>Paciente:</label><br>
        <select name="paciente_id" required>
            <option value="">Seleccione paciente</option>
            <?php foreach ($pacientes as $p) { ?>
                <option value="<?php echo $p['id']; ?>">
                    <?php echo htmlspecialchars($p['nombres'] . ' ' . $p['apellidos']); ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label>Doctor:</label><br>
        <select name="doctor_id" required>
            <option value="">Seleccione doctor</option>
            <?php foreach ($doctores as $d) { ?>
                <option value="<?php echo $d['id']; ?>">
                    <?php echo htmlspecialchars($d['nombres'] . ' ' . $d['apellidos'] . ' - ' . $d['especialidad']); ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha_cita" required>
        <br><br>

        <label>Hora:</label><br>
        <input type="time" name="hora_cita" required>
        <br><br>

        <label>Motivo:</label><br>
        <textarea name="motivo" rows="4" cols="40"></textarea>
        <br><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="Atendida">Atendida</option>
            <option value="Cancelada">Cancelada</option>
        </select>
        <br><br>

        <button type="submit">Guardar cita</button>

    </form>

    <br>
    <a href="/clinica-odonto/app/controladores/citacontroller.php?accion=listar">Volver a la lista</a>

</body>
</html>
