<?php

class Actividad extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->profesor=$this->getUserSessionData();
    }
    function render()
    {
        $_SESSION['id_profesor']=current($this->profesor);
        $NMaterias = $this->model->getAllClases($_SESSION['id_profesor']);
        $this->view->varTodas = $NMaterias;  
        $this->view->render('actividad/index',['profesor'=>$this->profesor]);
    }
    function new()
    {
        $this->view->render('actividad/trabajos',['profesor'=>$this->profesor]);
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
            'txt_titulo_act' => $datos[0],'txt_descripcion' => $datos[1],'date_FInicio' => $datos[2],
            'date_FFin' => $datos[3],'id_materia' => $datos[4],'id_profesor' => $datos[5]
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
        $this->view->render('actividad/trabajos',['profesor'=>$this->profesor]);
}

function Consultar($param = null)
{
        $_SESSION['id_materia'] = $param[0];
        $materia = $this->model->getActividad($_SESSION['id_materia']);
        $this->view->varTodas = $materia;
        $this->view->render('actividad/consultar',['profesor'=>$this->profesor]);
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






}
