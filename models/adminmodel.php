
<?php
include_once 'models/varTodas.php';
include_once 'models/varPagos.php';
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


    public function getAllConPago()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT SUM(Pago)as TotalPagos from vw_detalle_pagos WHERE DATE(Fecha_registro)>=CURDATE() AND estatus_id_pago=108; 
            ;
            ');
            while ($row = $query->fetch()) {
                $item = new varPagos();
                $item->vw_pg_TotalPagos = $row['TotalPagos'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
                        error_log($e->getMessage());
            return [];
        }
    }









    
    public function getAllConMat()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT COUNT(materia_id)as NumMaterias from materias where estatus_materias_id=100');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_mat_NumMaterias = $row['NumMaterias'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
                        error_log($e->getMessage());
            return [];
        }
    }




    public function getAllGrafica()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT concepto,sum(Pago)as TotalPagos from vw_detalle_pagos where estatus_id_pago="108" group by concepto 
            ');
            while ($row = $query->fetch()) {
                $item = new varPagos();
                $item->Concepto = $row['Concepto'];
                $item->TotalPagos = $row['TotalPagos'];
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