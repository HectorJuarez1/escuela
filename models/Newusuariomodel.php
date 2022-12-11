
<?php
include_once 'models/varTodas.php';
class NewusuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function getAllDNombres($No_Alumno)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT No_Alumno,Nombre_Completo,username  FROM vw_detalle_alumnos WHERE No_Alumno = :no_al");
            $query->execute(['no_al' => $No_Alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_a_No_Alumno = $row['No_Alumno'];
                $item->vw_a_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_a_username = $row['username'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }




    public function getAllDMaestro($No_Maestro)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT No_profesor,Nombre_Completo,username  FROM vw_detalle_maestros WHERE No_profesor = :no_pro");
            $query->execute(['no_pro' => $No_Maestro]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_m_NumProfesores = $row['No_profesor'];
                $item->vw_m_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_m_username = $row['username'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function getAll()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM users');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->idUser = $row['id'];
                $item->username = $row['username'];
                $item->role = $row['role'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }



    public function ValidarIdUsuario($Id_Usuario)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT COUNT(*) id from users WHERE id=:id_usuario");
            $query->execute(['id_usuario' => $Id_Usuario]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            echo 'Error en la linea' . $e->getLine();
            return null;
        }
    }

    public function insertUsuario($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO users(id,username,password,role,name) 
                VALUES (:id,:usse,:pass,"user",:nam)');
                $query->execute([
                    'id' => $datos['txt_no_usuario'],
                'usse' => $datos['txt_usuario'],
                'pass' => $datos['txt_passw'],
                'nam' => $datos['txt_Nom_Completo']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function insertMaestro($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO users(id,username,password,role,name) 
                VALUES (:id,:usse,:pass,"profesor",:nam)');
                $query->execute([
                    'id' => $datos['txt_no_usuario'],
                'usse' => $datos['txt_usuario'],
                'pass' => $datos['txt_passw'],
                'nam' => $datos['txt_Nom_Completo']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function deleteUsuario($id_Usuario)
    {
        $query = $this->db->connect()->prepare("DELETE FROM users WHERE (id = :id_u);");
        try {
            $query->execute(['id_u' => $id_Usuario]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


}



?>