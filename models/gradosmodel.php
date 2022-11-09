<?php
include_once 'models/varTodas.php';

class GradosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllGrados()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM grados');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->grado_id = $row['grado_id'];
                $item->nombre_grado = $row['nombre_grado'];
                $item->estatus_grados_id = $row['estatus_grados_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertGrado($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO grados(nombre_grado,estatus_grados_id) 
                VALUES (:nom,100)');
            $query->execute([
                'nom' => $datos['txt_NomGrado']

            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteGrado($grado_id)
    {
        $query = $this->db->connect()->prepare("UPDATE grados SET estatus_grados_id = 103 WHERE grado_id = :id_gra");
        try {
            $query->execute(['id_gra' => $grado_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($alumno_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_alumnos WHERE alumno_id = :id_al");
        try {
            $query->execute(['id_al' => $alumno_id]);
            while ($row = $query->fetch()) {
                $item->vw_a_alumno_id = $row['alumno_id'];
                $item->vw_a_Nombres = $row['Nombres'];
                $item->vw_a_Apellido_Paterno = $row['Apellido_Paterno'];
                $item->vw_a_Apellido_Materno = $row['Apellido_Materno'];
                $item->vw_a_Sexo = $row['Sexo'];
                $item->vw_a_Fecha_nacimiento = $row['Fecha_nacimiento'];
                $item->vw_a_Curp = $row['Curp'];
                $item->vw_a_id_Estatus = $row['id_Estatus'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE alumnos SET Nombres = :Nom,Apellido_Paterno = :Ap,Apellido_Materno = :Am,
        Sexo = :Sex,Fecha_nacimiento = :Fn,Curp=:Cur,id_Estatus=:est WHERE alumno_id = :id_al");
        try {
            $query->execute([
                'id_al' => $item['txt_IdAlumno'],
                'Nom' => $item['txt_nombre'],
                'Ap' => $item['txt_ApPaterno'],
                'Am' => $item['txt_ApMaterno'],
                'Sex' => $item['txt_sexo'],
                'Fn' => $item['txt_FeNacimiento'],
                'Cur' => $item['txt_curp'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }
}
