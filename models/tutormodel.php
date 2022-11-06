<?php
include_once 'models/varTodas.php';

class TutorModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT id_Tutor,concat_ws(' ',Nombres,Apellido_Paterno,Apellido_Materno)as Nombre_Completo ,Direccion,Telefono_Celular,Correo FROM tutor");
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->id_Tutorr = $row['id_Tutor'];
                $item->Nombre_Completo = $row['Nombre_Completo'];
                $item->Direccion = $row['Direccion'];
                $item->Telefono_Celular = $row['Telefono_Celular'];
                $item->Correo = $row['Correo'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertTutor($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO tutor(Nombres,Apellido_Paterno,Apellido_Materno,Direccion,Telefono_Casa,Telefono_Celular,Correo,Sexo) 
                VALUES (:nom,:ap,:am,:dir,:telcasa,:telcel,:correo,:sex)');
                $query->execute([
                'nom' => $datos['txt_nombre'],
                'ap' => $datos['txt_ApPaterno'],
                'am' => $datos['txt_ApMaterno'],
                'dir' => $datos['txt_Direccion'],
                'telcasa' => $datos['txt_tel_casa'],
                'telcel' => $datos['txt_celular'],
                'correo' => $datos['txt_correo'],
                'sex' => $datos['txt_sexo']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function deleteTutor($id_Tutor)
    {
        $query = $this->db->connect()->prepare("DELETE FROM tutor WHERE (id_Tutor = :id_t);");
        try {
            $query->execute(['id_t' => $id_Tutor]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function getById($id_Tutor){
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM tutor WHERE id_Tutor = :id_t");
        try{
            $query->execute(['id_t' => $id_Tutor]);
            while($row = $query->fetch()){
                $item->id_Tutorr = $row['id_Tutor'];
                $item->Tur_Nombres = $row['Nombres'];
                $item->Tur_Apellido_Paterno = $row['Apellido_Paterno'];
                $item->Tur_Apellido_Materno = $row['Apellido_Materno'];
                $item->Tur_Direccion = $row['Direccion'];
                $item->Tur_Telefono_Casa = $row['Telefono_Casa'];
                $item->Tur_Telefono_Celular = $row['Telefono_Celular'];
                $item->Tur_Correo = $row['Correo'];
                $item->Tur_Sexo = $row['Sexo'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE tutor SET Nombres = :Nom,Apellido_Paterno = :Ap,Apellido_Materno = :Am,
        Direccion = :Dir,Telefono_Casa = :Tca,Telefono_Celular=:Tce,Correo=:Cor,Sexo=:Sex WHERE id_Tutor = :id_T");
        try{
            $query->execute([
                'id_T'=> $item['id_Tutor'],
                'Nom'=> $item['txt_nombre'],
                'Ap'=> $item['txt_ApPaterno'],
                'Am'=> $item['txt_ApMaterno'],
                'Dir'=> $item['txt_Direccion'],
                'Tca'=> $item['txt_tel_casa'],
                'Tce'=> $item['txt_celular'],
                'Cor'=> $item['txt_correo'],
                'Sex'=> $item['txt_sexo']
            ]);
            return true;
        }catch(PDOException $e){
            error_log($e->getMessage());
        
            return false;
        }
        
    }

}
