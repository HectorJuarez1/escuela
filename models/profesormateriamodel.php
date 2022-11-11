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

    public function insertProfesorMateria($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare('INSERT INTO profesor_materia(grado_id,aula_id,profesor_id,materias_id,periodos_id,estatus_procesoprofesor_id) 
                VALUES (:grad,:aul,:prof,:mat,:per,100)');
            $query->execute([
                'grad' => $datos['com_grados'],
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
