<?php
$esEdicion = !empty($modoEdicion) && !empty($doctorData);
$actionUrl = $esEdicion
    ? '/clinica-odonto/app/controladores/doctorcontroller.php?accion=editar&id=' . (int) $doctorData['id']
    : '/clinica-odonto/app/controladores/doctorcontroller.php?accion=crear';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $esEdicion ? 'Editar Doctor' : 'Registrar Nuevo Doctor'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 500px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; background: #27ae60; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1><?php echo $esEdicion ? 'Editar Doctor' : 'Registrar Nuevo Doctor'; ?></h1>

    <form method="POST" action="<?php echo $actionUrl; ?>">
        <?php if ($esEdicion): ?>
            <input type="hidden" name="id" value="<?php echo (int) $doctorData['id']; ?>">
        <?php endif; ?>

        <label for="cmp">CMP:</label>
        <input type="text" id="cmp" name="cmp" maxlength="10" required
               value="<?php echo htmlspecialchars($doctorData['cmp'] ?? ''); ?>">

        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required
               value="<?php echo htmlspecialchars($doctorData['nombres'] ?? ''); ?>">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required
               value="<?php echo htmlspecialchars($doctorData['apellidos'] ?? ''); ?>">

        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required
               value="<?php echo htmlspecialchars($doctorData['especialidad'] ?? ''); ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono"
               value="<?php echo htmlspecialchars($doctorData['telefono'] ?? ''); ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
               value="<?php echo htmlspecialchars($doctorData['email'] ?? ''); ?>">

        <button type="submit"><?php echo $esEdicion ? 'Actualizar Doctor' : 'Guardar Doctor'; ?></button>
    </form>

    <br>
    <a href="/clinica-odonto/app/controladores/doctorcontroller.php?accion=listar">← Volver a lista</a>
</body>
</html>