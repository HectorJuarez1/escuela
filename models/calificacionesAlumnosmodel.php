<?php
include_once 'models/varTodas.php';

class CalificacionesAlumnosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCalificaciones($id_alumno)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT nombre_materia,nombre_actividad,calificacion_actividad,comentario,id_estatus from vw_detalle_calificacion
            where No_Alumno=:no_alum AND id_estatus=112");
            $query->execute(['no_alum' => $id_alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_ca_nombre_materia = $row['nombre_materia'];
                $item->vw_ca_nombre_actividad = $row['nombre_actividad'];
                $item->vw_ca_calificacion_actividad = $row['calificacion_actividad'];
                $item->vw_ca_comentario = $row['comentario'];
                $item->vw_ca_id_estatus = $row['id_estatus'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

 
}
