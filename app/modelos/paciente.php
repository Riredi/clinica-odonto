<?php

    require_once __DIR__ . '/../config/database.php';

    class Paciente{
        private $conn;



        public function __construct()
        {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function listar()
        {

            $sql = "SELECT id, dni, nombres, apellidos, telefono, email FROM pacientes ORDER BY id DESC";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
                
            return $stmt;
        }


        public function registrar($datos)
        {
            $sql = "INSERT INTO pacientes (dni, nombres, apellidos, telefono, email, fecha_nacimiento) 
                    VALUES (:dni, :nombres, :apellidos, :telefono, :email, :fecha_nacimiento)";
                

            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($datos);
        }
    }

    
?>