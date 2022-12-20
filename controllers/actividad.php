<?php

class Actividad extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->profesor = $this->getUserSessionData();
    }
    function render()
    {
        $_SESSION['id_profesor'] = current($this->profesor);
        $NMaterias = $this->model->getAllClases($_SESSION['id_profesor']);
        $this->view->varTodas = $NMaterias;
        $this->view->render('actividad/index', ['profesor' => $this->profesor]);
    }
    function new()
    {
        $this->view->render('actividad/trabajos', ['profesor' => $this->profesor]);
    }
    function saveActividad()
    {
        $datos[0]  = trim($_POST['txt_titulo_act']);
        $datos[1]  = trim($_POST['txt_descripcion']);
        $datos[2]  = trim($_POST['date_FInicio']);
        $datos[3]  = trim($_POST['date_FFin']);
        $datos[4]  = $_SESSION['id_materia'];
        $datos[5]  = $_SESSION['id_profesor'];
        if ($this->model->insertActividad([
            'txt_titulo_act' => $datos[0], 'txt_descripcion' => $datos[1], 'date_FInicio' => $datos[2],
            'date_FFin' => $datos[3], 'id_materia' => $datos[4], 'id_profesor' => $datos[5]
        ])) {
            error_log('saveActividad::Nuevo actividad creada');
            $this->redirect('actividad', ['success' => Success::SUCCESS_PROFESOR_NEW]);
        } else {
            // error_log('saveAl::Error al crear alumno');
            // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }


    function verDetalle($param = null)
    {
        $_SESSION['id_materia'] = $param[0];
        $materia = $this->model->getById($_SESSION['id_materia']);
        $this->view->varTodas = $materia;
        $this->view->render('actividad/trabajos', ['profesor' => $this->profesor]);
    }

    function Consultar($param = null)
    {
        $_SESSION['id_materia'] = $param[0];
        $materia = $this->model->getActividad($_SESSION['id_materia']);
        $this->view->varTodas = $materia;
        $this->view->render('actividad/consultar', ['profesor' => $this->profesor]);
    }
    function elimAct($param = null)
    {
        $id_actividad = $param[0];
        if ($this->model->deleteActividad($id_actividad)) {
            error_log('elimAct::Actividad eliminada');
            $this->redirect('actividad', ['error' => Errors::ERROR_DELATE_ACTIVIDAD]);
        } else {
            //   $this->redirect('c', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function Detalle($param = null)
    {
        $actividad_id = $param[0];
        $actividad = $this->model->getUpActividad($actividad_id);
        $this->view->varTodas = $actividad;
        $this->view->render('actividad/Actualizar', ['profesor' => $this->profesor]);
    }

    function ActualizarAct()
    {
        //modificar
        $Dactividad[0] = trim($_POST['txt_IdActividad']);
        $Dactividad[1]  = trim($_POST['txt_titulo_act']);
        $Dactividad[2]  = trim($_POST['txt_descripcion']);
        $Dactividad[3]  = trim($_POST['date_FInicio']);
        $Dactividad[4]   = trim($_POST['date_FFin']);
        $Dactividad[5]   = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdActividad' => $Dactividad[0], 'txt_titulo_act' =>  $Dactividad[1], 'txt_descripcion' =>  $Dactividad[2],
            'date_FInicio' =>  $Dactividad[3], 'date_FFin' =>  $Dactividad[4], 'com_estatus' =>  $Dactividad[5]
        ])) {
            // actualizar alumno exito
            $actividad = new varTodas();
            $actividad->actividad_id = $Dactividad[0];
            $actividad->titulo =  $Dactividad[1];
            $actividad->descripcion = $Dactividad[2];
            $actividad->Activida_fecha_inicio = $Dactividad[3];
            $actividad->Activida_fecha_fin =  $Dactividad[4];
            $actividad->Activida_estatus_actividad_id =  $Dactividad[5];
            $this->view->varTodas = $actividad;
            error_log('ActualizarAct::Datos de la actividad Actualizados');
            $this->redirect('actividad', ['success' => Success::SUCCESS_ADMIN_UPDATE_ACTIVIDAD]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }















}
