<?php
include_once 'models/varTodas.php';

class ActividadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllClases($id_maestro)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT proceso_id,No_profesor,materia_id,nombre_materia,nombre_grado,nombre_aula 
            from vw_detalle_profesormateria where No_profesor= :no_pro");
            $query->execute(['no_pro' => $id_maestro]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_dfm_proceso_id = $row['proceso_id'];
                $item->vw_dfm_No_profesor = $row['No_profesor'];
                $item->vw_dfm_id_materia = $row['materia_id'];
                $item->vw_dfm_nombre_materia = $row['nombre_materia'];
                $item->vw_dfm_nombre_grado = $row['nombre_grado'];
                $item->vw_dfm_nombre_aula = $row['nombre_aula'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getById($materia_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_profesormateria WHERE materia_id = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item->vw_mat_materia_id = $row['materia_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
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
