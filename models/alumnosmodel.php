<?php
include_once 'models/varTodas.php';

class AlumnosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_alumnos');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_id_alumno = $row['id_alumno'];
                $item->vw_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_Sexo = $row['Sexo'];
                $item->vw_Curp = $row['Curp'];
                $item->vw_Edad = $row['Edad'];
                $item->vw_Foto_alumno = $row['Foto_alumno'];
                $item->vw_id_Estatus = $row['id_Estatus'];
                $item->vw_Estatus_Detalle = $row['Estatus_Detalle'];

    
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function getTutor()
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
    }
    public function insertAlumno($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO alumnos(Nombres,Apellido_Paterno,Apellido_Materno,Sexo,Fecha_nacimiento,Curp,Foto_alumno,id_Estatus,id_Tutor) 
                VALUES (:nom,:ap,:am,:sex,:fn,:cur,:fal,100,:tur)');
                $query->execute([
                'nom' => $datos['txt_nombre'],
                'ap' => $datos['txt_ApPaterno'],
                'am' => $datos['txt_ApMaterno'],
                'sex' => $datos['txt_sexo'],
                'fn' => $datos['txt_FeNacimiento'],
                'cur' => $datos['txt_curp'],
                'fal' => $datos['filename'],
                'tur' => $datos['txt_tutor']

            ]);
            return true;
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            return false;
        }
    }
    public function deleteAlumno($vw_id_alumno)
    {
        $query = $this->db->connect()->prepare("UPDATE alumnos SET id_Estatus = 101 WHERE id_alumno = :id_alum");
        try {
            $query->execute(['id_alum' => $vw_id_alumno]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($id_alumno){
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE id_alumno = :id_al");
        try{
            $query->execute(['id_al' => $id_alumno]);
            while($row = $query->fetch()){
                $item->id_alumno = $row['id_alumno'];
                $item->Nombres = $row['Nombres'];
                $item->Apellido_Paterno = $row['Apellido_Paterno'];
                $item->Apellido_Materno = $row['Apellido_Materno'];
                $item->Sexo = $row['Sexo'];
                $item->Fecha_nacimiento = $row['Fecha_nacimiento'];
                $item->Curp = $row['Curp'];
                $item->Foto_Alumno = $row['Foto_alumno'];
                $item->id_Estatus = $row['id_Estatus'];
                $item->id_Tutor = $row['id_Tutor'];


            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE alumnos SET Nombres = :Nom,Apellido_Paterno = :Ap,Apellido_Materno = :Am,
        Sexo = :Sex,Fecha_nacimiento = :Fn,Curp=:Cur,id_Estatus=:est WHERE id_alumno = :id_al");
        try{
            $query->execute([
                'id_al'=> $item['txt_IdAlumno'],
                'Nom'=> $item['txt_nombre'],
                'Ap'=> $item['txt_ApPaterno'],
                'Am'=> $item['txt_ApMaterno'],
                'Sex'=> $item['txt_sexo'],
                'Fn'=> $item['txt_FeNacimiento'],
                'Cur'=> $item['txt_curp'],
                'est'=> $item['com_estatus']
            ]);
            return true;
        }catch(PDOException $e){
            error_log($e->getMessage());
        
            return false;
        }
        
    }

}
