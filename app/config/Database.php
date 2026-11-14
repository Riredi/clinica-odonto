<?php

class Database {
    private $host = "localhost";
    private $db_name = "dbclinica";
    private $username = "root";
    private $password = "";
    private  $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

                ]
            );

        }catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
        }

        return $this->conn;
    }

}
?>