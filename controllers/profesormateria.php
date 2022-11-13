<?php
class Profesormateria extends SessionController
{

    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $detalle_profesormateria = $this->model->getAllDprofesor();
        $this->view->varTodas = $detalle_profesormateria; 
        $this->view->render('profesormateria/index');
    }

    function new()
    {
        $profesor = $this->model->getProfesor();
        $this->view->ProfesorCom = $profesor;

        $Grados = $this->model->getGrados();
        $this->view->ComboGrados = $Grados;

        $Aulas = $this->model->getAulas();
        $this->view->ComboAulas = $Aulas;

        $Materias = $this->model->getMaterias();
        $this->view->ComboMaterias = $Materias;

        $Periodos = $this->model->getPeriodos();
        $this->view->ComboPeriodos = $Periodos;

        $this->view->render('profesormateria/nuevo');
    }

    function saveProfesorMateria()
    {
    
        $datos[0]  = trim($_POST['com_grados']);
        $datos[1]  = trim($_POST['com_aulas']);
        $datos[2] = trim($_POST['com_profesor']);
        $datos[3]   = trim($_POST['com_materias']);
        $datos[4]   = trim($_POST['com_periodos']);
        if ($this->model->insertProfesorMateria([
            'com_grados' => $datos[0], 'com_aulas' => $datos[1], 'com_profesor' => $datos[2], 'com_materias' => $datos[3],
            'com_periodos' => $datos[4]
        ])) {
            error_log('saveProfesorMateria::Nuevo materias asignadas al profesor');
            $this->redirect('profesormateria', ['success' => Success::SUCCESS_ADMIN_NEW_ALUMNO]);
        } else {
            error_log('saveProfesorMateria::Error al asignadas materias al profesor');
            $this->redirect('profesormateria', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }

    function verDetalle($param = null)
    {
        $alumnos = $this->model->getAlumnos();
        $this->view->Comboalumnos = $alumnos;
        $proceso_id = $param[0];
        $proceso = $this->model->getById($proceso_id);
        $this->view->varTodas = $proceso;
        $this->view->render('profesormateria/agregarAlumnos');
    }
    function saveAlumnoProfesor()
    {
        $datos[0]  = trim($_POST['txt_idproceso']);
        $datos[1]  = trim($_POST['com_alumnos']);
        if ($this->model->insertAlumnosProfesor([
            'txt_idproceso' => $datos[0], 'com_alumnos' => $datos[1]
        ])) {
            error_log('saveAlumnoProfesor::Nuevo AlumnoProfesor asignadas');
            $this->redirect('profesoralumnos', ['success' => Success::SUCCESS_ADMIN_NEW_ALUMNO]);
        } else {
            error_log('saveProfesorMateria::Error al asignadas materias al profesor');
            $this->redirect('profesoralumnos', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }






    function ActualizarR()
    {
        //modificar
        $Dalumnos[0] = trim($_POST['txt_IdAlumno']);
        $Dalumnos[1]  = trim($_POST['txt_nombre']);
        $Dalumnos[2]  = trim($_POST['txt_ApPaterno']);
        $Dalumnos[3]  = trim($_POST['txt_ApMaterno']);
        $Dalumnos[4]   = trim($_POST['txt_FeNacimiento']);
        $Dalumnos[5]   = trim($_POST['txt_sexo']);
        $Dalumnos[6]   = trim($_POST['txt_curp']);
        $Dalumnos[7]   = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdAlumno' => $Dalumnos[0], 'txt_nombre' =>  $Dalumnos[1], 'txt_ApPaterno' =>  $Dalumnos[2],
            'txt_ApMaterno' =>  $Dalumnos[3], 'txt_FeNacimiento' =>  $Dalumnos[4], 'txt_sexo' =>  $Dalumnos[5],
            'txt_curp' =>  $Dalumnos[6],'com_estatus' =>  $Dalumnos[7]
        ])) {
            // actualizar alumno exito
            $alumnos = new varTodas();
            $alumnos->id_alumno = $Dalumnos[0];
            $alumnos->Nombres =  $Dalumnos[1];
            $alumnos->Apellido_Paterno = $Dalumnos[2];
            $alumnos->Apellido_Materno = $Dalumnos[3];
            $alumnos->Fecha_nacimiento =  $Dalumnos[4];
            $alumnos->Sexo =  $Dalumnos[5];
            $alumnos->Curp =  $Dalumnos[6];
            $alumnos->id_Estatus =  $Dalumnos[7];
            $this->view->varTodas = $alumnos;
            error_log('ActualizarR::Datos del Alumnos Actualizados');
            $this->redirect('alumnos', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }
}
