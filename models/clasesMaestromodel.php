<?php
include_once 'models/varTodas.php';
class ClasesMaestroModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllClases($id_maestro)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT proceso_id,No_profesor,nombre_materia,nombre_grado,nombre_aula,dia_semana,Hora_Inicio,Hora_Fin,Horas 
            from vw_detalle_profesormateria where No_profesor= :no_pro ORDER BY dia_semana");
            $query->execute(['no_pro' => $id_maestro]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_dfm_proceso_id = $row['proceso_id'];
                $item->vw_dfm_No_profesor = $row['No_profesor'];
                $item->vw_dfm_nombre_materia = $row['nombre_materia'];
                $item->vw_dfm_nombre_grado = $row['nombre_grado'];
                $item->vw_dfm_nombre_aula = $row['nombre_aula'];
                $item->vw_dfm_nombre_materia = $row['nombre_materia'];
                $item->vw_dfm_dia_semana = $row['dia_semana'];
                $item->vw_dfm_Hora_Inicio = $row['Hora_Inicio'];
                $item->vw_dfm_Hora_Fin = $row['Hora_Fin'];
                $item->vw_dfm_Horas = $row['Horas'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function getAllId($proceso_id)
    {
        $items = [];
        $query = $this->db->connect()->prepare("SELECT proceso_id,No_Alumno,NombreAlumno from vw_detalle_alumnosasignados where proceso_id= :id_pro");
        try {
            $query->execute(['id_pro' => $proceso_id]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_daa_proceso_id = $row['proceso_id'];
                $item->vw_daa_No_Alumno = $row['No_Alumno'];
                $item->vw_daa_NombreAlumno = $row['NombreAlumno'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            // error_log($e->getMessage());
            return null;
        }
    }
}
