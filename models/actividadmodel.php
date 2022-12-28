<?php
include_once 'models/varTodas.php';

class ActividadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllClases($id_maestro)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT proceso_id,No_profesor,materia_id,nombre_materia,nombre_grado,nombre_aula 
            from vw_detalle_profesormateria where No_profesor= :no_pro");
            $query->execute(['no_pro' => $id_maestro]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_dfm_proceso_id = $row['proceso_id'];
                $item->vw_dfm_No_profesor = $row['No_profesor'];
                $item->vw_dfm_id_materia = $row['materia_id'];
                $item->vw_dfm_nombre_materia = $row['nombre_materia'];
                $item->vw_dfm_nombre_grado = $row['nombre_grado'];
                $item->vw_dfm_nombre_aula = $row['nombre_aula'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getById($materia_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_profesormateria WHERE materia_id = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item->vw_mat_materia_id = $row['materia_id'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }




    public function getAllActividad()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM actividad');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->actividad_id = $row['actividad_id'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->Activida_id_materia = $row['id_materia'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }


    public function insertActividad($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO actividad(nombre_actividad,titulo,descripcion,fecha_inicio,fecha_fin,id_materia,no_profesor,estatus_actividad_id) 
                VALUES (:nomact,:tit,:descr,:fini,:ffin,:idm,:idp,110)');
            $query->execute([
                'nomact' => $datos['txt_nombre_act'],
                'tit' => $datos['txt_titulo_act'],
                'descr' => $datos['txt_descripcion'],
                'fini' => $datos['date_FInicio'],
                'ffin' => $datos['date_FFin'],
                'idm' => $datos['id_materia'],
                'idp' => $datos['id_profesor']
                
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }



    public function getActividad($materia_id)
    {
        $items = [];
        $query = $this->db->connect()->prepare("SELECT nombre_actividad,actividad_id,titulo,descripcion,id_materia,estatus_actividad_id FROM  actividad WHERE id_materia = :id_mat");
        try {
            $query->execute(['id_mat' => $materia_id]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->actividad_id = $row['actividad_id'];
                $item->nombre_actividad = $row['nombre_actividad'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->Activida_id_materia = $row['id_materia'];
                $item->Activida_estatus_actividad_id = $row['estatus_actividad_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }


    public function deleteActividad($actividad_id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM actividad WHERE actividad_id = :id_act");
        try {
            $query->execute(['id_act' => $actividad_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function getUpActividad($actividad_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * FROM actividad WHERE actividad_id = :id_acti");
        try {
            $query->execute(['id_acti' => $actividad_id]);
            while ($row = $query->fetch()) {
                $item->actividad_id = $row['actividad_id'];
                $item->titulo = $row['titulo'];
                $item->descripcion = $row['descripcion'];
                $item->Activida_fecha_inicio = $row['fecha_inicio'];
                $item->Activida_fecha_fin = $row['fecha_fin'];
                $item->Activida_estatus_actividad_id = $row['estatus_actividad_id'];
            }
            return $item;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE actividad SET titulo = :tit,descripcion = :descri,fecha_inicio = :fein,
        fecha_fin = :fef WHERE actividad_id = :id_act");
        try {
            $query->execute([
                'id_act' => $item['txt_IdActividad'],
                'tit' => $item['txt_titulo_act'],
                'descri' => $item['txt_descripcion'],
                'fein' => $item['date_FInicio'],
                'fef' => $item['date_FFin']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }



    public function getCalificarAct($no_profesor)
    {
    $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT * FROM vw_detalle_calificacion WHERE no_profesor = :no_pro AND id_estatus=111 ");
            $query->execute(['no_pro' => $no_profesor]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_ca_calificacion_id = $row['calificacion_id'];
                $item->vw_ca_nombre_actividad = $row['nombre_actividad'];
                $item->vw_ca_nombre_materia = $row['nombre_materia'];
                $item->vw_ca_Nombre_Completo = $row['Nombre_Completo'];
                $item->vw_ca_actividad_realizada = $row['actividad_realizada'];
                $item->vw_ca_ruta_archivo = $row['ruta_archivo'];
                $item->vw_ca_no_profesor = $row['no_profesor'];
                $item->vw_ca_id_estatus = $row['id_estatus'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
                        error_log($e->getMessage());
            return null;
        }
    }

    public function updateAct($item)
    {
        $query = $this->db->connect()->prepare("UPDATE calificaciones SET calificacion_actividad = :cal,comentario = :com,id_estatus = 112
        WHERE calificacion_id = :id_cal");
        try {
            $query->execute([
                'id_cal' => $item['txt_Idcalif'],
                'cal' => $item['com_calificacion'],
                'com' => $item['txt_retroalimentacion']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }
    }


    public function getUpActividad2($actividad_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT calificacion_id FROM calificaciones WHERE calificacion_id = :id_acti");
        try {
            $query->execute(['id_acti' => $actividad_id]);
            while ($row = $query->fetch()) {
                $item->vw_ca_calificacion = $row['calificacion_id'];
            }
            return $item;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
    
}
