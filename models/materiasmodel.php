<?php
include_once 'models/varTodas.php';

class MateriasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaterias()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM materias');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->materia_id = $row['materia_id'];
                $item->nombre_materia = $row['nombre_materia'];
                $item->estatus_materias_id = $row['estatus_materias_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertMateria($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO materias(nombre_materia,estatus_materias_id) 
                VALUES (:nom,100)');
            $query->execute([
                'nom' => $datos['txt_NomMaterias']

            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteMateria($materia_id)
    {
        $query = $this->db->connect()->prepare("UPDATE materias SET estatus_materias_id = 103 WHERE materia_id = :id_ma");
        try {
            $query->execute(['id_ma' => $materia_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($materia_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM materias WHERE materia_id = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item->materia_id = $row['materia_id'];
                $item->nombre_materia = $row['nombre_materia'];
                $item->estatus_materias_id = $row['estatus_materias_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE materias SET nombre_materia = :Nom,estatus_materias_id=:est WHERE materia_id = :id_mat");
        try {
            $query->execute([
                'id_mat' => $item['txt_IdMaterias'],
                'Nom' => $item['txt_NomMaterias'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }
}
