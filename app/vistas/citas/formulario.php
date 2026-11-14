<!DOCTYPE html>
<html>
<body>
    <h1>Registrar cita</h1>
    
    <form method="POST" action="">
        <label for="paciente_id">Paciente:</label><br>
        <select id="paciente_id" name="paciente_id" required>
            <option value="">Seleccione paciente</option>


            <?php foreach ($pacientes as $p): ?>
                <option value="<?php echo $p['id']; ?>">
                    <?php echo $p['nombres'] . ' ' . $p['apellidos']; ?>
                </option>
            <?php endforeach; ?>


        </select><br><br>
        
        <label for="doctor_id">Doctor:</label><br>
        <select id="doctor_id" name="doctor_id" required>
            <option value="">Seleccione un doctor</option>

            <?php foreach ($doctores as $d): ?>
                <option value="<?php echo $d['id']; ?>">
                    <?php echo $d['nombres']. ' ' .$d['apellidos']. '-'.$d['especialidad']; ?>
                </option>
            <?php endforeach; ?>
  
  
        </select><br><br>
        
        <label for="fecha_cita">Fecha: </label><br>
        <input type="date" id="fecha_cita" name="fecha_cita" required><br><br>
        
        <label for="hora_cita">Hora:</label><br>
        <input type="time" id="hora_cita" name="hora_cita" required><br><br>
        
        <label for="motivo">Motivo:</label><br>
        <textarea id="motivo" name="motivo" rows="4" cols="50"></textarea><br><br>
        
        <label for="estado">Estado: </label><br>
        <select id="estado" name="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="Atendida">atendida </option>
            <option value="Cancelada">cancelada</option>
        </select><br><br>
        
        <button type="submit"> Guardar cita</button>
    </form>
    
    <br>
    <a href="../../controladores/CitaController.php?accion=listar">Volver a lista</a>
</body>
</html>
