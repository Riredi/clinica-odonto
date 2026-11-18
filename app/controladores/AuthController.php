<?php
session_start();
require_once __DIR__ . '/../modelos/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuario = new Usuario();
    $resultado = $usuario->validar($username, $password);

    if ($resultado) {
        $_SESSION['admin'] = $resultado['nombre_completo'];
        header('Location: /clinica/index.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
        require_once __DIR__ . '/../vistas/login.php';
    }
} else {
    require_once __DIR__ . '/../vistas/login.php';
}
?>
