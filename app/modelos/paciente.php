<?php
require_once __DIR__ . '/../config/Database.php';

class Paciente {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function listar() {
        $sql = "SELECT id, dni, nombres, apellidos, telefono, email, fecha_nacimiento
                FROM pacientes
                ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function registrar($datos) {
        $sql = "INSERT INTO pacientes (dni, nombres, apellidos, telefono, email, fecha_nacimiento)
                VALUES (:dni, :nombres, :apellidos, :telefono, :email, :fecha_nacimiento)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($datos);
    }

    public function obtener($id) {
        $sql = "SELECT id, dni, nombres, apellidos, telefono, email, fecha_nacimiento
                FROM pacientes
                WHERE id = :id
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function actualizar($datos) {
        $sql = "UPDATE pacientes
                SET dni = :dni, nombres = :nombres, apellidos = :apellidos,
                    telefono = :telefono, email = :email, fecha_nacimiento = :fecha_nacimiento
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($datos);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM pacientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>