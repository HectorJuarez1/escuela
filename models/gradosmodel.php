<?php
include_once 'models/varTodas.php';

class GradosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllGrados()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM grados');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->grado_id = $row['grado_id'];
                $item->nombre_grado = $row['nombre_grado'];
                $item->estatus_grados_id = $row['estatus_grados_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertGrado($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO grados(nombre_grado,estatus_grados_id) 
                VALUES (:nom,100)');
            $query->execute([
                'nom' => $datos['txt_NomGrado']

            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteGrado($grado_id)
    {
        $query = $this->db->connect()->prepare("UPDATE grados SET estatus_grados_id = 103 WHERE grado_id = :id_gra");
        try {
            $query->execute(['id_gra' => $grado_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($grado_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM grados WHERE grado_id = :id_gra");
        try {
            $query->execute(['id_gra' => $grado_id]);
            while ($row = $query->fetch()) {
                $item->grado_id = $row['grado_id'];
                $item->nombre_grado = $row['nombre_grado'];
                $item->estatus_grados_id = $row['estatus_grados_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE grados SET nombre_grado = :Nom,estatus_grados_id=:est WHERE grado_id = :id_gra");
        try {
            $query->execute([
                'id_gra' => $item['txt_IdGrado'],
                'Nom' => $item['txt_NomGrado'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }
}
