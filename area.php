<?php
class Area
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "Empleados";
    private $conn;
    private $tabla = 'areas';

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->server;dbname=$this->db",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo "conexion fallida" . $e->getMessage();
        }
    }

    public function fetch(){
        $data = null;
        $stmt = $this->conn->prepare("
            SELECT *
            FROM
                $this->tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
