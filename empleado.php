<?php
class Empleado
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "Empleados";
    private $conn;
    private $tabla = 'empleados';

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

    public function insert()
    {
        if (isset($_POST['submit'])) {
          if ($_POST['nombre'] != '' && $_POST['email'] != '') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $sexo = $_POST['sexo'];
            $area_id = $_POST['area_id'];
            $descripcion = $_POST['descripcion'];
            $boletin = $_POST['boletin'];

            $query = "INSERT INTO $this->tabla (
              nombre,
              email,
              sexo,
              area_id,
              boletin,
              descripcion
            ) VALUES(
              '$nombre',
              '$email',
              '$sexo',
              '$area_id',
              $boletin,
              '$descripcion'
            )";

            if ($sql = $this->conn->exec($query)) { 
            
              return 'Datos almacenados correctamente';    
        }       
            } else {
                return 'Datos no validos para guardar empleado';
            }
        }
    }

    public function fetch(){
        $data = null;
        $stmt = $this->conn->prepare("
            SELECT
                e.*,
                a.nombre AS nombre_area
            FROM
                $this->tabla e,
                areas a
            WHERE
                e.area_id = a.id");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function del($del_id){
        $query = "DELETE FROM $this->tabla WHERE id = '$del_id' ";
        if ($sql = $this->conn->exec($query)) {
            return 'Empleado eliminado!';
        }else {
            return 'Error al borrar empleado!';
        }
    }

    // public function read($read_id){
    //   $data = null;

    //   $stmt = $this->conn->prepare("SELECT * FROM records WHERE id='$read_id' ");

    //   $stmt->execute();

    //   $data = $stmt->fetch();

    //   return $data;
    // }

    public function edit($edit_id){
      $data = null;

      $stmt = $this->conn->prepare("SELECT * FROM $this->tabla WHERE id='$edit_id'");

      $stmt->execute();

      $data = $stmt->fetch();

      return $data;
    }

    public function update($data){
      $query = "UPDATE $this->tabla
        SET nombre = '" . $data['edit_nombre'] . "',
            email = '" . $data['edit_email']. "',
             sexo = '" . $data['edit_sexo'] . "',
             area_id = " . $data['edit_area_id'] . "
        WHERE id=" . $data['edit_id'];

      if ($this->conn->exec($query)) {
        return 'Empleado actualizado!';
      }else {
        return 'Error al actualizar empleado!';
      }
    }
}
