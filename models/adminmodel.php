
<?php
include_once 'models/varTodas.php';
class AdminModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAllConAlum()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT COUNT(alumno_id)as NumAlumnos from vw_detalle_alumnos where id_Estatus=100');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_a_NumAlumnos = $row['NumAlumnos'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
                        error_log($e->getMessage());
            return [];
        }
    }

    public function getAllConProf()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT COUNT(profesor_id)as NumProfesores from vw_detalle_maestros where estatus_maestro_id=100');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_m_NumProfesores = $row['NumProfesores'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
                        error_log($e->getMessage());
            return [];
        }
    }





}

?>