<?php
include_once 'models/varTodas.php';

class ActividadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllActividad()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM actividad');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->actividad_id = $row['actividad_id'];
                $item->nombre_actividad = $row['nombre_actividad'];
                $item->estatus_actividad_id = $row['estatus_actividad_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertActividad($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO actividad(nombre_actividad,estatus_actividad_id) 
                VALUES (:nom,100)');
            $query->execute([
                'nom' => $datos['txt_NomActividad']
            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteActividad($actividad_id)
    {
        $query = $this->db->connect()->prepare("UPDATE actividad SET estatus_actividad_id = 103 WHERE actividad_id = :id_act");
        try {
            $query->execute(['id_act' => $actividad_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($actividad_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM actividad WHERE actividad_id = :id_act");
        try {
            $query->execute(['id_act' => $actividad_id]);
            while ($row = $query->fetch()) {
                $item->actividad_id = $row['actividad_id'];
                $item->nombre_actividad = $row['nombre_actividad'];
                $item->estatus_actividad_id = $row['estatus_actividad_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE actividad SET nombre_actividad = :Nom,estatus_actividad_id=:est WHERE actividad_id = :id_act");
        try {
            $query->execute([
                'id_act' => $item['txt_IdAct'],
                'Nom' => $item['txt_NomAct'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }
}
