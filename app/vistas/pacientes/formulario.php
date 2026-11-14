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
        <h1>Registrar paciente</h1>
        

        <form method="POST" action="">
            <label for="dni">DNI</label>
            <input type="text" id="dni" name="dni" maxlength="8" required>
            
            <label for="nombres">nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
            
            <label for="apellidos">apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            
            <label for="telefono">telefono</label>
            <input type="text" id="telefono" name="telefono">
            
            <label for="email">email</label>
            <input type="email" id="email" name="email">
            
            <label for="fecha_nacimiento">fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            
            <button type="submit">Guardar paciente</button>
        </form>
        
        <br>
        <a href="tabla.php">← Volver a lista</a>
    </body>
</html>