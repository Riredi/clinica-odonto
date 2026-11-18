<!DOCTYPE html>
<html>
<body>
    <h1>Iniciar Sesión</h1>
    
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="POST" action="">
        <label for="username">Usuario:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
