<?php
include_once 'models/varTodas.php';

class PeriodosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPeriodos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM periodos');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->periodo_id = $row['periodo_id'];
                $item->nombre_periodo = $row['nombre_periodo'];
                $item->estatus_periodos_id = $row['estatus_periodos_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertPeriodo($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO periodos(nombre_periodo,estatus_periodos_id) 
                VALUES (:nom,100)');
            $query->execute([
                'nom' => $datos['txt_NomPeriodo']
            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deletePeriodos($periodo_id)
    {
        $query = $this->db->connect()->prepare("UPDATE periodos SET estatus_periodos_id = 103 WHERE periodo_id = :id_per");
        try {
            $query->execute(['id_per' => $periodo_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($periodo_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM periodos WHERE periodo_id = :id_per");
        try {
            $query->execute(['id_per' => $periodo_id]);
            while ($row = $query->fetch()) {
                $item->periodo_id = $row['periodo_id'];
                $item->nombre_periodo = $row['nombre_periodo'];
                $item->estatus_periodos_id = $row['estatus_periodos_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE periodos SET nombre_periodo = :Nom,estatus_periodos_id=:est WHERE periodo_id = :id_per");
        try {
            $query->execute([
                'id_per' => $item['txt_IdPeriodo'],
                'Nom' => $item['txt_NomPeriodo'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
}
