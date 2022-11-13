<?php

class varTodas{
    // users
    public $idUser;
    public $username;
    public $role;

    // alumno vista
    public $vw_a_alumno_id;
    public $vw_a_Nombre_Completo;
    public $vw_a_Nombres;
    public $vw_a_Apellido_Paterno;
    public $vw_a_Apellido_Materno;
    public $vw_a_Sexo;
    public $vw_a_Fecha_nacimiento;
    public $vw_a_Curp;
    public $vw_a_Edad;
    public $vw_a_Foto_alumno;
    public $vw_a_id_Estatus;
    public $vw_a_Estatus_Detalle;

    // maestros
    public $vw_m_profesor_id;
    public $vw_m_Cedula;
    public $vw_m_Nombre_Completo;
    public $vw_m_Nombre;
    public $vw_m_Apellido_paterno;
    public $vw_m_Apellido_Materno;
    public $vw_m_Direccion;
    public $vw_m_Telefono;
    public $vw_m_Sexo;
    public $vw_m_Fecha_nacimiento;
    public $vw_m_Edad;
    public $vw_m_estatus_maestro_id;
    public $vw_m_Estatus_Detalle;

    // grados
    public $grado_id;
    public $nombre_grado;
    public $estatus_grados_id;
    
    // aulas
    public $aula_id;
    public $nombre_aula;
    public $estatus_aulas_id;
        
    // materias
    public $materia_id;
    public $nombre_materia;
    public $estatus_materias_id;

    // periodos
    public $periodo_id;
    public $nombre_periodo;
    public $estatus_periodos_id;

    // actividad
    public $actividad_id;
    public $nombre_actividad;
    public $estatus_actividad_id;

    // profesormateria
    public $vw_pm_proceso_id;
    public $vw_pm_nombre_grado;
    public $vw_pm_nombre_aula;
    public $vw_pm_Nombre_Profesor;
    public $vw_pm_nombre_materia;
    public $vw_pm_nombre_periodo;
    public $vw_pm_Estatus;

    // alumnosAsignanos
    public $vw_as_proceso_id;
    public $vw_as_Nombre_Profesor;
    public $vw_as_NombreAlumno;
    public $vw_as_nombre_grado;
    public $vw_as_nombre_aula;
    public $vw_as_nombre_materia;
    public $vw_as_nombre_periodo;
    public $vw_as_estatus_id;
    public $vw_as_Estatus;

















        //tutor vista combo
        public $vw_id_Tutor;
        public $vw_Nombre_tutor;
    
        //padre  tutor
        public $id_Tutorr;
        public $Tur_Nombres;
        public $Tur_Apellido_Paterno;
        public $Tur_Apellido_Materno;
        public $Tur_Direccion;
        public $Tur_Telefono_Casa;
        public $Tur_Telefono_Celular;
        public $Tur_Correo;
        public $Tur_Sexo;










}

?>