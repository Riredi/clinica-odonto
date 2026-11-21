<?php
$esEdicion = !empty($modoEdicion) && !empty($pacienteData);
$actionUrl = $esEdicion
    ? '/clinica-odonto/app/controladores/pacientecontroller.php?accion=editar&id=' . (int) $pacienteData['id']
    : '/clinica-odonto/app/controladores/pacientecontroller.php?accion=crear';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $esEdicion ? 'Editar paciente' : 'Registrar paciente'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 500px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #27ae60; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1><?php echo $esEdicion ? 'Editar paciente' : 'Registrar paciente'; ?></h1>

    <form method="POST" action="<?php echo $actionUrl; ?>">
        <?php if ($esEdicion): ?>
            <input type="hidden" name="id" value="<?php echo (int) $pacienteData['id']; ?>">
        <?php endif; ?>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" maxlength="8" required
               value="<?php echo htmlspecialchars($pacienteData['dni'] ?? ''); ?>">

        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required
               value="<?php echo htmlspecialchars($pacienteData['nombres'] ?? ''); ?>">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required
               value="<?php echo htmlspecialchars($pacienteData['apellidos'] ?? ''); ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono"
               value="<?php echo htmlspecialchars($pacienteData['telefono'] ?? ''); ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
               value="<?php echo htmlspecialchars($pacienteData['email'] ?? ''); ?>">

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
               value="<?php echo htmlspecialchars($pacienteData['fecha_nacimiento'] ?? ''); ?>">

        <button type="submit"><?php echo $esEdicion ? 'Actualizar paciente' : 'Guardar paciente'; ?></button>
    </form>

    <br>
    <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=listar">← Volver a lista</a>
</body>
</html><?php
$esEdicion = !empty($modoEdicion) && !empty($pacienteData);
$actionUrl = $esEdicion
    ? '/clinica-odonto/app/controladores/pacientecontroller.php?accion=editar&id=' . (int) $pacienteData['id']
    : '/clinica-odonto/app/controladores/pacientecontroller.php?accion=crear';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $esEdicion ? 'Editar paciente' : 'Registrar paciente'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 500px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #27ae60; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1><?php echo $esEdicion ? 'Editar paciente' : 'Registrar paciente'; ?></h1>

    <form method="POST" action="<?php echo $actionUrl; ?>">
        <?php if ($esEdicion): ?>
            <input type="hidden" name="id" value="<?php echo (int) $pacienteData['id']; ?>">
        <?php endif; ?>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" maxlength="8" required
               value="<?php echo htmlspecialchars($pacienteData['dni'] ?? ''); ?>">

        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required
               value="<?php echo htmlspecialchars($pacienteData['nombres'] ?? ''); ?>">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required
               value="<?php echo htmlspecialchars($pacienteData['apellidos'] ?? ''); ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono"
               value="<?php echo htmlspecialchars($pacienteData['telefono'] ?? ''); ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
               value="<?php echo htmlspecialchars($pacienteData['email'] ?? ''); ?>">

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
               value="<?php echo htmlspecialchars($pacienteData['fecha_nacimiento'] ?? ''); ?>">

        <button type="submit"><?php echo $esEdicion ? 'Actualizar paciente' : 'Guardar paciente'; ?></button>
    </form>

    <br>
    <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=listar">← Volver a lista</a>
</body>
</html>