
<?php
include_once 'models/varTodas.php';
class NewusuarioModel extends Model{

    public function __construct(){
        parent::__construct();
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

    public function insertUsuario($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO users(username,password,role,name) 
                VALUES (:usse,:pass,:rol,:nam)');
                $query->execute([
                'usse' => $datos['txt_usuario'],
                'pass' => $datos['txt_passw'],
                'rol' => $datos['txt_rol'],
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