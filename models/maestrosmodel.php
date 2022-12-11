<?php
include_once 'models/varTodas.php';

class MaestrosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaestro()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_maestros');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_m_profesor_id = $row['profesor_id'];
                $item->vw_m_Cedula = $row['Cedula'];
                $item->vw_m_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_m_Direccion = $row['Direccion'];
                $item->vw_m_Telefono = $row['Telefono'];
                $item->vw_m_Sexo = $row['Sexo'];
                $item->vw_m_Edad = $row['Edad'];
                $item->vw_m_estatus_maestro_id = $row['estatus_maestro_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertMaestro($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO profesor(Cedula,Nombre,Apellido_Paterno,Apellido_Materno,Direccion,Sexo,Telefono,Fecha_nacimiento,estatus_maestro_id,No_profesor) 
                VALUES (:ced,:nom,:ap,:am,:dir,:sex,:tel,:fech,100,:Nopro)');
            $query->execute([
                'ced' => $datos['txt_cedula'],
                'nom' => $datos['txt_nombre'],
                'ap' => $datos['txt_ApPaterno'],
                'am' => $datos['txt_ApMaterno'],
                'dir' => $datos['txt_direccion'],
                'sex' => $datos['txt_sexo'],
                'tel' => $datos['txt_telefono'],
                'fech' => $datos['txt_FeNacimiento'],
                'Nopro' => $datos['txt_No_Profesor']
            ]);
            return true;
        } catch (PDOException $e) {
          //  error_log($e->getMessage());
            return false;
        }
    }
    public function deleteMaestros($vw_m_profesor_id)
    {
        $query = $this->db->connect()->prepare("UPDATE profesor SET estatus_maestro_id = 101 WHERE profesor_id = :id_pro");
        try {
            $query->execute(['id_pro' => $vw_m_profesor_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($profesor_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_maestros WHERE profesor_id = :id_pro");
        try {
            $query->execute(['id_pro' => $profesor_id]);
            while ($row = $query->fetch()) {
                $item->vw_m_profesor_id = $row['profesor_id'];
                $item->vw_m_Cedula = $row['Cedula'];
                $item->vw_m_Nombre = $row['Nombre'];
                $item->vw_m_Apellido_paterno = $row['Apellido_Materno'];
                $item->vw_m_Apellido_Materno = $row['Apellido_Materno'];
                $item->vw_m_Direccion = $row['Direccion'];
                $item->vw_m_Telefono = $row['Telefono'];
                $item->vw_m_Sexo = $row['Sexo'];
                $item->vw_m_Fecha_nacimiento = $row['Fecha_nacimiento'];
                $item->vw_m_estatus_maestro_id = $row['estatus_maestro_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE profesor SET Cedula = :Ced,Nombre = :Nom,Apellido_Paterno = :Ap,Apellido_Materno = :Am,
        Direccion = :Dir,Telefono=:Tel,Sexo = :Sex,Fecha_nacimiento = :Fn,estatus_maestro_id=:est WHERE profesor_id = :id_pro");
        try {
            $query->execute([
                'id_pro' => $item['txt_idprofesor'],
                'Ced' => $item['txt_cedula'],
                'Nom' => $item['txt_nombre'],
                'Ap' => $item['txt_ApPaterno'],
                'Am' => $item['txt_ApMaterno'],
                'Dir' => $item['txt_direccion'],
                'Tel' => $item['txt_telefono'],
                'Sex' => $item['txt_sexo'],
                'Fn' => $item['txt_FeNacimiento'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
          //  error_log($e->getMessage());
            return false;
        }
    }
}
