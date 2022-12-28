<?php
include_once 'models/varTodas.php';

class ActividadAlumnosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaterias($id_alumno)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT materia_id,nombre_materia
            from vw_detalle_alumnosasignados where No_Alumno= :no_alum");
            $query->execute(['no_alum' => $id_alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_daa_materia_id = $row['materia_id'];
                $item->vw_daa_nombre_materia = $row['nombre_materia'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            // error_log($e->getMessage());
            return null;
        }
    }

    public function getById($materia_id)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_actividad WHERE id_materia = :id_mat AND estatus_actividad_id=110");
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_act_id_materia = $row['id_materia'];
                $item->vw_act_nombre_actividad = $row['nombre_actividad'];
                $item->vw_act_titulo = $row['titulo'];
                $item->vw_act_descripcion = $row['descripcion'];
                $item->vw_act_DiasEntrega = $row['DiasEntrega'];
                $item->vw_act_fecha_fin = $row['fecha_fin'];
                $item->vw_act_actividad_id = $row['actividad_id'];
                $item->vw_act_estatus_actividad_id = $row['estatus_actividad_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return null;
        }
    }
    public function getByAct($actividad_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_actividad WHERE actividad_id = :id_act");
        try {
            $query->execute(['id_act' => $actividad_id]);
            while ($row = $query->fetch()) {
                $item->vw_act_actividad_id = $row['actividad_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function insertCalificacion($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO calificaciones(actividad_id,no_alumno,materia_id,actividad_realizada,ruta_archivo,id_estatus) 
                VALUES (:act,:noal,:mat,:actr,:rutaar,111)');
            $query->execute([
                'act' => $datos['id_actividad'],
                'noal' => $datos['id_alumno'],
                'mat' => $datos['id_materia_alum'],
                'actr' => $datos['txt_actividad_realizada'],
                'rutaar' => $datos['filename']
            ]);
            return true;
        } catch (PDOException $e) {
            //  error_log($e->getMessage());
            return false;
        }
    }
    public function ValidarActividad($datos)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT COUNT(*)AS existen  from calificaciones where actividad_id=:idact and no_alumno=:noalum
            ");
            $query->execute([
                'idact' => $datos['id_actividad'],
                'noalum' => $datos['id_alumno']
            ]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            //  echo 'Error en la linea' . $e->getLine();
            return null;
        }
    }
}
