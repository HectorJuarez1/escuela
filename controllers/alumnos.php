<?php
class Alumnos extends SessionController
{

    function __construct()
    {
        parent::__construct();
    }
    function render()
    {

        $alumnos = $this->model->getAll();
        $this->view->varTodas = $alumnos;

       
        $this->view->render('alumnos/index');
    }

    function new()
    {
        $tutor = $this->model->getTutor();
        $this->view->TutorCom = $tutor;
        $this->view->render('alumnos/nuevo');
    }

    function saveAl()
    {
        $datos[0] = trim($_POST['txt_nombre']);
        $datos[1]  = trim($_POST['txt_ApPaterno']);
        $datos[2]  = trim($_POST['txt_ApMaterno']);
        $datos[3]   = trim($_POST['txt_FeNacimiento']);
        $datos[4]   = trim($_POST['txt_sexo']);
        $datos[5]   = trim($_POST['txt_curp']);
        $datos[6]   = trim($_POST['txt_tutor']);
        $datos[7]=$_FILES['filename']['name']; // obtiene el nombre
        $archivotm=$_FILES['filename']['tmp_name']; // obtiene el archiv
        $ruta ='public/images/Alumnos/';
        move_uploaded_file($archivotm,$ruta.$datos[7]);
        if ($this->model->insertAlumno([
            'txt_nombre' => $datos[0], 'txt_ApPaterno' => $datos[1], 'txt_ApMaterno' => $datos[2],'txt_FeNacimiento' => $datos[3],
            'txt_sexo' => $datos[4],'txt_curp'=> $datos[5],'txt_tutor'=> $datos[6],'filename' => $datos[7]
        ])) {
            error_log('saveAl::Nuevo AlumnoCreado');
            $this->redirect('alumnos', ['success' => Success::SUCCESS_ADMIN_NEW_ALUMNO]);
        } else {
            error_log('saveAl::Error al crear alumno');
            $this->redirect('alumnos', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }

    function eliminarAl($param = null)
    {
        $alumnos = $param[0];
        if ($this->model->deleteAlumno($alumnos)) {
            error_log('eliminarAl::Alumno dado de baja');
            $this->redirect('alumnos', ['error' => Errors::ERROR_DELATE]);
        } else {
        //   $this->redirect('c', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $id_alumno = $param[0];
        $alumnos = $this->model->getById($id_alumno);
        $this->view->varTodas = $alumnos;
        $this->view->render('alumnos/Actualizar');
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
        if ($this->model->update(['txt_IdAlumno' =>$Dalumnos[0],'txt_nombre' =>  $Dalumnos[1],'txt_ApPaterno' =>  $Dalumnos[2],
        'txt_ApMaterno' =>  $Dalumnos[3],'txt_FeNacimiento' =>  $Dalumnos[4],'txt_sexo' =>  $Dalumnos[5],'txt_curp' =>  $Dalumnos[6]])) {
            // actualizar alumno exito
            $alumnos = new varTodas();
            $alumnos->id_alumno = $Dalumnos[0];
            $alumnos->Nombres =  $Dalumnos[1];
            $alumnos->Apellido_Paterno = $Dalumnos[2];
            $alumnos->Apellido_Materno = $Dalumnos[3];
            $alumnos->Fecha_nacimiento =  $Dalumnos[4];
            $alumnos->Sexo =  $Dalumnos[5];
            $alumnos->Curp =  $Dalumnos[6];
            $this->view->varTodas = $alumnos;
            error_log('ActualizarR::Datos del Alumnos Actualizados');
            $this->redirect('alumnos', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
        //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }
}
