<?php
include_once 'models/varTodas.php';

class ProfesormateriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDprofesor()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM vw_detalle_profesormateria');
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_pm_proceso_id = $row['proceso_id'];
                $item->vw_pm_nombre_grado = $row['nombre_grado'];
                $item->vw_pm_nombre_aula = $row['nombre_aula'];
                $item->vw_pm_Nombre_Profesor = $row['Nombre_Profesor'];
                $item->vw_pm_nombre_materia = $row['nombre_materia'];
                $item->vw_pm_nombre_periodo = $row['nombre_periodo'];
                $item->vw_pm_Estatus = $row['Estatus'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
        public function getProfesor()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT profesor_id,Nombre_Completo FROM vw_detalle_maestros where estatus_maestro_id=100');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->vw_m_profesor_id = $row['profesor_id'];
                    $item->vw_m_Nombre_Completo = $row['Nombre_Completo'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } 
        public function getAulas()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT * FROM aulas where estatus_aulas_id=100');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->aula_id = $row['aula_id'];
                    $item->nombre_aula = $row['nombre_aula'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } 

        public function getPeriodos()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT * FROM periodos where estatus_periodos_id=100');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->periodo_id = $row['periodo_id'];
                    $item->nombre_periodo = $row['nombre_periodo'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } 
        public function getMaterias()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT * FROM materias where estatus_materias_id=100');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->materia_id = $row['materia_id'];
                    $item->nombre_materia = $row['nombre_materia'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } 

            public function getAllGrados()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM grados where estatus_grados_id=100');
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

    

    public function getAgregaGrados($grados_grado_id)
    {
        $items = [];

        try {
            $query = $this->db->connect()->prepare("SELECT materia_id,nombre_materia,grados_grado_id from vw_detalle_materias where grados_grado_id=:id_grado;
            ");
            $query->execute(['id_grado' => $grados_grado_id]);
            while ($row = $query->fetch()) {
                $item = new varTodas();
                $item->vw_mat_materia_id = $row['materia_id'];
                $item->vw_mat_nombre_materia = $row['nombre_materia'];
                $item->vw_mat_grados_grado_id = $row['grados_grado_id'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return null;
        }
    }

        public function getAlumnos()
        {
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT alumno_id,Nombre_Completo from vw_detalle_alumnos where id_Estatus=100;');
                while ($row = $query->fetch()) {
                    $item = new varTodas();
                    $item->vw_a_alumno_id = $row['alumno_id'];
                    $item->vw_a_Nombre_Completo = $row['Nombre_Completo'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        } 
    public function insertProfesorMateria($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO profesor_materia(grado_id,aula_id,profesor_id,materias_id,periodos_id,estatus_procesoprofesor_id) 
                VALUES (:grad,:aul,:prof,:mat,:per,100)');
            $query->execute([
                'grad' => $datos['id_grado'],
                'aul' => $datos['com_aulas'],
                'prof' => $datos['com_profesor'],
                'mat' => $datos['com_materias'],
                'per' => $datos['com_periodos']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function insertAlumnosProfesor($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO alumnos_profesor(proceso_id,alumnos_id,estatus_id) 
                VALUES (:procc,:alum,100)');
            $query->execute([
                'procc' => $datos['txt_idproceso'],
                'alum' => $datos['com_alumnos']
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function getById($proceso_id)
    {
        $item = new varTodas();
        $query = $this->db->connect()->prepare("SELECT * from vw_detalle_profesormateria where proceso_id = :id_pro");
        try {
            $query->execute(['id_pro' => $proceso_id]);
            while ($row = $query->fetch()) {
                $item->vw_pm_proceso_id = $row['proceso_id'];
                $item->vw_pm_nombre_grado = $row['nombre_grado'];
                $item->vw_pm_nombre_aula = $row['nombre_aula'];
                $item->vw_pm_Nombre_Profesor = $row['Nombre_Profesor'];
                $item->vw_pm_nombre_materia = $row['nombre_materia'];
                $item->vw_pm_nombre_periodo = $row['nombre_periodo'];
                $item->vw_pm_Estatus = $row['Estatus'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

}
