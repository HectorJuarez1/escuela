<?php
include_once 'models/varTodas.php';
class ClasesMaestroModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllClases($id_maestro)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT No_profesor,nombre_materia,nombre_grado,nombre_aula,dia_semana,Hora_Inicio,Hora_Fin,Horas from vw_detalle_alumnosasignados where No_profesor= :no_pro");
            $query->execute(['no_pro' => $id_maestro]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_daa_No_profesor = $row['No_profesor'];
                $item->vw_daa_nombre_materia = $row['nombre_materia'];
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
