<!DOCTYPE html>
<html>


    <head>
        <!--nota: esto tambien es una plantilla para los inputs-->
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; max-width: 500px; }
            label { display: block; margin-top: 10px; font-weight: bold; }
            input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
            button { margin-top: 15px; padding: 10px 20px; background: #27ae60; color: white; border: none; cursor: pointer; }
        </style>
    </head>


    <body>
    <h1>Registrar Nueva Cita</h1>
    
    <form method="POST" action="">
        <label for="paciente_id">Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <option value="">Seleccione un paciente</option>
            <?php foreach ($pacientes as $p): ?>
                <option value="<?php echo $p['id']; ?>">
                    <?php echo htmlspecialchars($p['nombres'] . ' ' . $p['apellidos']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="doctor_id">Doctor:</label>
        <select id="doctor_id" name="doctor_id" required>
            <option value="">Seleccione un doctor</option>
            <?php foreach ($doctores as $d): ?>
                <option value="<?php echo $d['id']; ?>">
                    <?php echo htmlspecialchars($d['nombres'] . ' ' . $d['apellidos'] . ' - ' . $d['especialidad']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="fecha_cita">Fecha de la cita:</label>
        <input type="date" id="fecha_cita" name="fecha_cita" required>
        
        <label for="hora_cita">Hora:</label>
        <input type="time" id="hora_cita" name="hora_cita" required>
        
        <label for="motivo">Motivo de consulta:</label>
        <textarea id="motivo" name="motivo" rows="4"></textarea>
        
        <label for="estado">Estado inicial:</label>
        <select id="estado" name="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="Atendida">Atendida</option>
            <option value="Cancelada">Cancelada</option>
        </select>
        
        <button type="submit">Guardar Cita</button>
    </form>
    
    <br>
    <a href="../../controladores/CitaController.php?accion=listar">← Volver a lista</a>
</body>
</html>