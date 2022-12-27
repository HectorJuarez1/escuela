<?php
class varTodas{
    
    // alumno vista
    public $vw_a_alumno_id;
    public $vw_a_No_Alumno;
    public $vw_a_Nombre_Completo;
    public $vw_a_username;
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
    public $vw_a_NumAlumnos;

    // users
    public $idUser;
    public $username;
    public $role;
    public $name;


    // maestros
    public $vw_m_profesor_id;
    public $vw_m_Cedula;
    public $vw_m_NumProfesores;
    public $vw_m_Nombre_Completo;
    public $vw_m_Nombre;
    public $vw_m_username;
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
        
    // vw_detalle_materias
    public $vw_mat_materia_id;
    public $vw_mat_nombre_materia;
    public $vw_mat_dia_semana;
    public $vw_mat_HoraInicio;
    public $vw_mat_HoraFin;
    public $vw_mat_Horas;
    public $vw_mat_estatus_materias_id;
    public $vw_mat_Estatus;
    public $vw_mat_grados_grado_id;
    public $vw_mat_Grado;
    public $vw_mat_NumMaterias;

    // hora
    public $id_horas;
    public $Horas;

    // periodos
    public $periodo_id;
    public $nombre_periodo;
    public $estatus_periodos_id;



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
    
    //vw_detalle_alumnosasignados
    public $vw_daa_proceso_id;
    public $vw_daa_No_profesor;
    public $vw_daa_No_Alumno;
    public $vw_daa_NombreAlumno;
    public $vw_daa_Nombre_Profesor;
    public $vw_daa_nombre_grado;
    public $vw_daa_nombre_aula;
    public $vw_daa_materia_id;
    public $vw_daa_nombre_materia;
    public $vw_daa_dia_semana;
    public $vw_daa_Hora_Inicio;
    public $vw_daa_Hora_Fin;
    public $vw_daa_Horas;
    public $vw_daa_estatus_id;
    public $vw_daa_Descripcion;

    //vw_detalle_profesormateria
    public $vw_dfm_proceso_id;
    public $vw_dfm_No_profesor;
    public $vw_dfm_Nombre_Profesor;
    public $vw_dfm_nombre_grado;
    public $vw_dfm_nombre_aula;
    public $vw_dfm_id_materia;
    public $vw_dfm_nombre_materia;
    public $vw_dfm_Hora_Inicio;
    public $vw_dfm_Hora_Fin;
    public $vw_dfm_Horas;
    public $vw_dfm_dia_semana;


    //actividad
    public $actividad_id;
    public $nombre_actividad;
    public $titulo;
    public $descripcion;
    public $Activida_fecha_inicio;
    public $Activida_fecha_fin;
    public $Activida_id_materia;
    public $Activida_no_profesor;
    public $Activida_estatus_actividad_id;

    // vw_detalle_actividad
    public $vw_act_actividad_id;
    public $vw_act_nombre_actividad;
    public $vw_act_titulo;
    public $vw_act_descripcion;
    public $vw_act_DiasEntrega;
    public $vw_act_fecha_fin;
    public $vw_act_id_materia;
    public $vw_act_estatus_actividad_id;


    //vw_detalle_calificacion
    public $vw_ca_calificacion_id;
    public $vw_ca_nombre_actividad;
    public $vw_ca_nombre_materia;
    public $vw_ca_Nombre_Completo;
    public $vw_ca_actividad_realizada;
    public $vw_ca_ruta_archivo;
    public $vw_ca_no_profesor;
    public $vw_ca_id_estatus;

    public $vw_ca_calificacion_actividad;
    public $vw_ca_comentario;

    public $vw_ca_calificacion;

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