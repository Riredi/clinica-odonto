
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

    <form method="POST" action="/clinica-odonto/app/controladores/doctorcontroller.php?accion=<?php echo $accion; ?>">

        <input type="hidden" name="id" value="<?php echo $doctorData['id'] ?? ''; ?>">

        <label>CMP:</label>
        <input type="text" name="cmp" maxlength="10" required
               value="<?php echo htmlspecialchars($doctorData['cmp'] ?? ''); ?>">

        <label>Nombres:</label>
        <input type="text" name="nombres" required
               value="<?php echo htmlspecialchars($doctorData['nombres'] ?? ''); ?>">

        <label>Apellidos:</label>
        <input type="text" name="apellidos" required
               value="<?php echo htmlspecialchars($doctorData['apellidos'] ?? ''); ?>">

        <label>Especialidad:</label>
        <input type="text" name="especialidad" required
               value="<?php echo htmlspecialchars($doctorData['especialidad'] ?? ''); ?>">

        <label>Teléfono:</label>
        <input type="text" name="telefono"
               value="<?php echo htmlspecialchars($doctorData['telefono'] ?? ''); ?>">

        <label>Email:</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($doctorData['email'] ?? ''); ?>">

        <button type="submit"><?php echo $boton; ?></button>

    </form>

    <br>

    <a href="/clinica-odonto/app/controladores/doctorcontroller.php?accion=listar">Volver a la lista</a>

</body>
</html>
