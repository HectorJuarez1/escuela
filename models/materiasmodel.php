<?php
include_once 'models/varTodas.php';

class MateriasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaterias()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_materias');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_mat_materia_id = $row['materia_id'];
                $item->vw_mat_nombre_materia = $row['nombre_materia'];
                $item->vw_mat_dia_semana = $row['dia_semana'];
                $item->vw_mat_HoraInicio = $row['HoraInicio'];
                $item->vw_mat_HoraFin = $row['HoraFin'];
                $item->vw_mat_Horas = $row['Horas'];
                $item->vw_mat_Grado = $row['Grado'];
                $item->vw_mat_estatus_materias_id = $row['estatus_materias_id'];
                $item->vw_mat_Estatus = $row['Estatus'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getGrados()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM grados where estatus_grados_id=100');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->grado_id = $row['grado_id'];
                $item->nombre_grado = $row['nombre_grado'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function getHoras()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT id_horas,DATE_FORMAT(Detalle, "%H:%i %p")as Horas from horas');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->id_horas = $row['id_horas'];
                $item->Horas = $row['Horas'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insertMateria($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO materias(nombre_materia,dia_semana,hora_inicia,hora_fin,estatus_materias_id,grados_grado_id) 
                VALUES (:nom,:dia,:hin,:hfi,100,:gra)');
            $query->execute([
                'nom' => $datos['txt_NomMaterias'],
                'dia' => $datos['com_DiaSemana'],
                'hin' => $datos['com_horainicio'],
                'hfi' => $datos['com_horafin'],
                'gra' => $datos['com_grados']

            ]);
            return true;
        } catch (PDOException $e) {
            //  error_log($e->getMessage());
            return false;
        }
    }
    public function deleteMateria($materia_id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM materias WHERE materia_id = :id_ma");
        try {
            $query->execute(['id_ma' => $materia_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getById($materia_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM materias WHERE materia_id = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item->materia_id = $row['materia_id'];
                $item->nombre_materia = $row['nombre_materia'];
                $item->estatus_materias_id = $row['estatus_materias_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE materias SET nombre_materia = :Nom,estatus_materias_id=:est WHERE materia_id = :id_mat");
        try {
            $query->execute([
                'id_mat' => $item['txt_IdMaterias'],
                'Nom' => $item['txt_NomMaterias'],
                'est' => $item['com_estatus']
            ]);
            return true;
        } catch (PDOException $e) {
            // error_log($e->getMessage());
            return false;
        }
    }
}
