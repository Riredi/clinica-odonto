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
        <h1>Registrar Nuevo Doctor</h1>
        
        <form method="POST" action="">
            <label for="cmp">CMP:</label>
            <input type="text" id="cmp" name="cmp" maxlength="10" required>
            
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            
            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" required>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            
            <button type="submit">Guardar Doctor</button>
        </form>
        
        <br>
        <a href="../../controladores/DoctorController.php?accion=listar">← Volver a lista</a>
    </body>
</html>