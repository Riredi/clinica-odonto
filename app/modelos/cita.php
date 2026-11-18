<?php

    require_once __DIR__ . '/../config/database.php';

    class Cita{
        private $conn;



        public function __construct()
        {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function listar()
        {

            $sql = "SELECT c.id, p.nombres as paciente, d.nombres as doctor, 
                d.especialidad, c.fecha_cita, c.hora_cita, c.motivo, c.estado 
                FROM citas c 
                JOIN pacientes p ON c.paciente_id = p.id 
                JOIN doctores d ON c.doctor_id = d.id 
                ORDER BY c.fecha_cita DESC";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
                
            return $stmt;
        }


        public function registrar($datos)
        {
            $sql =  "INSERT INTO citas (paciente_id, doctor_id, fecha_cita, hora_cita, motivo, estado) 
                    VALUES (:paciente_id, :doctor_id, :fecha_cita, :hora_cita, :motivo, :estado)";
                

            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($datos);
        }

        
        public function obtener($id)
        
        {
            $sql = "SELECT * FROM citas WHERE id = :id";

            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } 


        public function actualizar($datos)
        {
            $sql =  "UPDATE citas SET paciente_id=:paciente_id, doctor_id=:doctor_id, 
                    fecha_cita=:fecha_cita, hora_cita=:hora_cita, motivo=:motivo, estado=:estado 
                    WHERE id=:id";


            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($datos);

        }

        public function eliminar($id)
        {
            $sql = "DELETE FROM citas WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([':id' => $id]);
        }
    }

    
?>