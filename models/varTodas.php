<?php

class varTodas{
    // users
    public $username;
    public $role;



    //alumno
    public $id_alumno;
    public $Nombres;
    public $Apellido_Paterno;
    public $Apellido_Materno;
    public $Sexo;
    public $Fecha_nacimiento;
    public $Curp;
    public $Foto_Alumno;
    public $id_Estatus;
    public $id_Tutor;

    // alumno vista
    public $vw_id_alumno;
    public $vw_Nombre_Completo;
    public $vw_Sexo;
    public $vw_Curp;
    public $vw_Edad;
    public $vw_Foto_alumno;
    public $vw_Estatus_Detalle;
    public $vw_id_Estatus;

    //tutor vista combo
    public $vw_id_Tutor;
    public $vw_Nombre_tutor;




    //Maestro
    public $id_profesor;
    public $NoProfesor;
    public $Cedula;
    public $MNombres;
    public $MApellido_paterno;
    public $MApellido_Materno;
    public $MDireccion;
    public $MTelefono;
    public $MSexo;
    public $MEmail;
    public $MFecha_nacimiento;

    //Grupos
    public $id_grupo;
    public $NombreGrupo;
    public $CapacidadGrupo;

    //Carreras
    public $id_carrera;
    public $Clave;
    public $CNombre;
    public $CNo_semestres;

    //Materias
    public $id_materias;
    public $MClave;
    public $MNombre;

    //Aulas
    public $id_aula;
    public $APiso;
    public $ANombreP;
    public $AAforro;
    public $AEstado;
    public $Agrupo;






}

?>