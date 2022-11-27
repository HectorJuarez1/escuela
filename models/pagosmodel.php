<?php
include_once 'models/varTodas.php';
include_once 'models/varPagos.php';
class PagosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPagos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * from vw_detalle_pagos;');
            while ($row = $query->fetch()) {
                $item = new varPagos();
                $item->vw_pg_id_pagos = $row['id_pagos'];
                $item->vw_pg_No_alumno = $row['No_alumno'];
                $item->vw_pg_Nombre_Alumno = $row['Nombre_Alumno'];
                $item->vw_pg_Pago = $row['Pago'];
                $item->vw_pg_Detalle_mes = $row['Detalle_mes'];
                $item->vw_pg_Concepto = $row['Concepto'];
                $item->vw_pg_estatus_id_pago = $row['estatus_id_pago'];
                $item->vw_pg_estatus = $row['estatus'];
                $item->vw_pg_Fecha_creacion = $row['Fecha_registro'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function getAllDNombres($No_Alumno)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT No_Alumno,Nombre_Completo  FROM vw_detalle_alumnos WHERE No_Alumno = :no_al");
            $query->execute(['no_al' => $No_Alumno]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_a_No_Alumno = $row['No_Alumno'];
                $item->vw_a_Nombre_Completo = $row['Nombre_Completo'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
    public function insertPago($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO pagos(No_alumno,Nombre_Alumno,Pago,Detalle_mes,estatus_id_pago,concepto_id_pago) 
                VALUES (:no_al,:nombreC,:pago,:mes,108,:id_conc)');
                $query->execute([
                'no_al' => $datos['txt_no_usuario'],
                'nombreC' => $datos['txt_Nom_Completo'],
                'pago' => $datos['txt_Pago'],
                'mes' => $datos['com_Mes'],
                'id_conc' => $datos['com_concepto']
            ]);
            return true;
        } catch (PDOException $e) {
           // error_log($e->getMessage());
            return false;
        }
    }
    public function Cancelapago($vw_pg_id_pagos)
    {
        $query = $this->db->connect()->prepare("UPDATE pagos SET estatus_id_pago = 109 WHERE id_pagos = :id_p");
        try {
            $query->execute(['id_p' => $vw_pg_id_pagos]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }



}
