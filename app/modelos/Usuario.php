<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function validar($username, $password) {
    $sql = "SELECT * FROM usuarios WHERE username = :username LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':username' => $username]);
    $usuario = $stmt->fetch();

    if ($usuario && $password === $usuario['password']) {
        return $usuario;
    }
    return false;
}
}
?>
