<?php
include_once 'models/varTodas.php';
class AulasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllAulas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM aulas');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->aula_id = $row['aula_id'];
                $item->nombre_aula = $row['nombre_aula'];
                $item->estatus_aulas_id = $row['estatus_aulas_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertAula($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO aulas(nombre_aula,estatus_aulas_id) 
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
    public function deleteAula($aula_id)
    {
        $query = $this->db->connect()->prepare("UPDATE aulas SET estatus_aulas_id = 103 WHERE aula_id = :id_au");
        try {
            $query->execute(['id_au' => $aula_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($aula_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM aulas WHERE aula_id = :id_aul");
        try {
            $query->execute(['id_aul' => $aula_id]);
            while ($row = $query->fetch()) {
                $item->aula_id = $row['aula_id'];
                $item->nombre_aula = $row['nombre_aula'];
                $item->estatus_aulas_id = $row['estatus_aulas_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE aulas SET nombre_aula = :Nom,estatus_aulas_id=:est WHERE aula_id = :id_aul");
        try {
            $query->execute([
                'id_aul' => $item['txt_IdAulas'],
                'Nom' => $item['txt_NomGrado'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
}