<?php
include_once 'models/varTodas.php';

class AlumnosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function ValidarMatricula($No_Alumno)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT COUNT(*) No_Alumno from alumnos WHERE No_Alumno=:no_al");
            $query->execute(['no_al' => $No_Alumno]);
            $numero = $query->fetchColumn();
            return $numero;
        } catch (PDOException $e) {
            echo 'Error en la linea' . $e->getLine();
            return null;
        }
    }



    public function getAllAlumnos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_alumnos');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_a_alumno_id = $row['alumno_id'];
                $item->vw_a_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_a_Sexo = $row['Sexo'];
                $item->vw_a_No_Alumno = $row['No_Alumno'];
                $item->vw_a_Edad = $row['Edad'];
                $item->vw_a_Foto_alumno = $row['Foto_alumno'];
                $item->vw_a_id_Estatus = $row['id_Estatus'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    /*     public function getTutor()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT * FROM vw_com_tutor');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->vw_id_Tutor = $row['id_Tutor'];
                    $item->vw_Nombre_tutor = $row['Nombre_Completo'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } */
    public function insertAlumno($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO alumnos(Nombres,Apellido_Paterno,Apellido_Materno,Sexo,Fecha_nacimiento,Curp,Foto_alumno,No_Alumno,id_Estatus) 
                VALUES (:nom,:ap,:am,:sex,:fn,:cur,:fal,:Noal,100)');
            $query->execute([
                'nom' => $datos['txt_nombre'],
                'ap' => $datos['txt_ApPaterno'],
                'am' => $datos['txt_ApMaterno'],
                'sex' => $datos['txt_sexo'],
                'fn' => $datos['txt_FeNacimiento'],
                'cur' => $datos['txt_curp'],
                'fal' => $datos['filename'],
                'Noal' => $datos['txt_No_Alumno']

            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteAlumno($vw_id_alumno)
    {
        $query = $this->db->connect()->prepare("UPDATE alumnos SET id_Estatus = 101 WHERE alumno_id = :id_alum");
        try {
            $query->execute(['id_alum' => $vw_id_alumno]);
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
