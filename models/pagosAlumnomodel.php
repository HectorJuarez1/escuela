<?php
include_once 'models/varPagos.php';
class pagosAlumnoModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getAllPagos($id_alumno)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT Nombre_Alumno,Pago,Concepto,Fecha_registro FROM vw_detalle_pagos WHERE No_alumno=:no_al AND estatus_id_pago=108");
            $query->execute(['no_al' => $id_alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_pg_Concepto = $row['Concepto'];
                $item->vw_pg_Pago = $row['Pago'];
                $item->vw_pg_Fecha_creacion = $row['Fecha_registro'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
}
