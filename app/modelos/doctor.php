<?php

    require_once __DIR__ . '/../config/database.php';

    class Doctor{
        private $conn;



        public function __construct()
        {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function listar()
        {

            $sql = "SELECT id, cmp, nombres, apellidos, especialidad, telefono, email FROM doctores ORDER BY id DESC";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
                
            return $stmt;
        }


        public function registrar($datos)
        {
            $sql = "INSERT INTO doctores (cmp, nombres, apellidos, especialidad, telefono, email) 
                VALUES (:cmp, :nombres, :apellidos, :especialidad, :telefono, :email)";
                

            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($datos);
        }

        public function obtener($id)
        
        {
            $sql = "SELECT * FROM doctores WHERE id = :id";

            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        }


        public function actualizar($datos)
        {
            $sql =  "UPDATE doctores SET cmp=:cmp, nombres=:nombres, apellidos=:apellidos, 
                    especialidad=:especialidad, telefono=:telefono, email=:email WHERE id=:id";


            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($datos);

        }

        public function eliminar($id)
        {
            $sql = "DELETE FROM doctores WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([':id' => $id]);
        }
    }

    
?>