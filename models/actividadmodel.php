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
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->Activida_id_materia = $row['id_materia'];
                $item->Activida_estatus_actividad_id = $row['estatus_actividad_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }


    public function insertActividad($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO actividad(titulo,descripcion,fecha_inicio,fecha_fin,id_materia,no_profesor,estatus_actividad_id) 
                VALUES (:tit,:descr,:fini,:ffin,:idm,:idp,110)');
            $query->execute([
                'tit' => $datos['txt_titulo_act'],
                'descr' => $datos['txt_descripcion'],
                'fini' => $datos['date_FInicio'],
                'ffin' => $datos['date_FFin'],
                'idm' => $datos['id_materia'],
                'idp' => $datos['id_profesor']
                
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }



    public function getActividad($materia_id)
    {
        $items = [];
        $query = $this->db->connect()->prepare("SELECT actividad_id,titulo,descripcion,id_materia,estatus_actividad_id FROM  actividad WHERE id_materia = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->actividad_id = $row['actividad_id'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->Activida_id_materia = $row['id_materia'];
                $item->Activida_estatus_actividad_id = $row['estatus_actividad_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }


    public function deleteActividad($actividad_id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM actividad WHERE actividad_id = :id_act");
        try {
            $query->execute(['id_act' => $actividad_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }






}
