
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>

    <style>
        body {
            font-family: Arial;
            margin: 20px;
            max-width: 500px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1><?php echo $titulo; ?></h1>

    <form method="POST" action="/clinica-odonto/app/controladores/pacientecontroller.php?accion=<?php echo $accion; ?>">

        <input type="hidden" name="id" value="<?php echo $pacienteData['id'] ?? ''; ?>">

        <label>DNI:</label>
        <input type="text" name="dni" maxlength="8" required
               value="<?php echo htmlspecialchars($pacienteData['dni'] ?? ''); ?>">

        <label>Nombres:</label>
        <input type="text" name="nombres" required
               value="<?php echo htmlspecialchars($pacienteData['nombres'] ?? ''); ?>">

        <label>Apellidos:</label>
        <input type="text" name="apellidos" required
               value="<?php echo htmlspecialchars($pacienteData['apellidos'] ?? ''); ?>">

        <label>Telefono:</label>
        <input type="text" name="telefono"
               value="<?php echo htmlspecialchars($pacienteData['telefono'] ?? ''); ?>">

        <label>Email:</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($pacienteData['email'] ?? ''); ?>">

        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required
               value="<?php echo htmlspecialchars($pacienteData['fecha_nacimiento'] ?? ''); ?>">

        <button type="submit"><?php echo $boton; ?></button>

    </form>

    <br>

    <a href="/clinica-odonto/app/controladores/pacientecontroller.php?accion=listar">Volver a la lista</a>

</body>
</html>
