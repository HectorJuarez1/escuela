<?php
include_once 'models/varTodas.php';

class PagosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
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
            $query = $this->db->connect()->prepare('INSERT INTO pagos(No_alumno,Nombre_Alumno,Pago,Detalle_mes,concepto_id_concepto) 
                VALUES (:no_al,:nombreC,:pago,:mes,:id_conc)');
                $query->execute([
                'no_al' => $datos['txt_no_usuario'],
                'nombreC' => $datos['txt_Nom_Completo'],
                'pago' => $datos['txt_Pago'],
                'mes' => $datos['com_concepto'],
                'id_conc' => $datos['com_Mes']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }



}
