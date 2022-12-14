<?php
include_once 'models/varTodas.php';
class MateriasAlumnoModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getAllMaterias($id_alumno)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_alumnosasignados WHERE No_Alumno = :no_al  ORDER BY dia_semana");
            $query->execute(['no_al' => $id_alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_daa_No_Alumno = $row['No_Alumno'];
                $item->vw_daa_Nombre_Profesor = $row['Nombre_Profesor'];
                $item->vw_daa_nombre_grado = $row['nombre_grado'];
                $item->vw_daa_nombre_aula = $row['nombre_aula'];
                $item->vw_daa_nombre_materia = $row['nombre_materia'];
                $item->vw_daa_dia_semana = $row['dia_semana'];
                $item->vw_daa_Hora_Inicio = $row['Hora_Inicio'];
                $item->vw_daa_Hora_Fin = $row['Hora_Fin'];
                $item->vw_daa_Horas = $row['Horas'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }
}
