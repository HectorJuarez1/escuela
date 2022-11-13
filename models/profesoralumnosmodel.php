<?php
include_once 'models/varTodas.php';

class ProfesoralumnosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDAsig()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_alumnosasignados');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_as_proceso_id = $row['proceso_id'];
                $item->vw_as_Nombre_Profesor = $row['Nombre_Profesor'];
                $item->vw_as_NombreAlumno = $row['NombreAlumno'];
                $item->vw_as_nombre_grado = $row['nombre_grado'];
                $item->vw_as_nombre_aula = $row['nombre_aula'];
                $item->vw_as_nombre_materia = $row['nombre_materia'];
                $item->vw_as_nombre_periodo = $row['nombre_periodo'];
                $item->vw_as_estatus_id = $row['estatus_id'];
                $item->vw_as_Estatus = $row['Descripcion'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];

        }
    }

}
