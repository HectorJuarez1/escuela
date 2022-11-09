<?php

class Actividad extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $Nactividad = $this->model->getAllActividad();
        $this->view->varTodas = $Nactividad;  
        $this->view->render('actividad/index');
    }
    
    function saveActividad()
    {
        $datos[0]  = trim($_POST['txt_NomActividad']);

        if ($this->model->insertActividad([
            'txt_NomActividad' => $datos[0]
        ])) {
            error_log('saveActividad::Nueva actividad creada');
            $this->redirect('actividad', ['success' => Success::SUCCESS_ADMIN_NEW_ACTIVIDAD]);
        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarAct($param = null)
    {
        $Dactividad = $param[0];
        if ($this->model->deleteActividad($Dactividad)) {
            error_log('eliminarAct::Actividad dado de baja');
            $this->redirect('actividad', ['error' => Errors::ERROR_NO_DELATE_ACTIVIDAD]);
        } else {
            $this->redirect('actividad', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $actividad_id = $param[0];
        $actividad = $this->model->getById($actividad_id);
        $this->view->varTodas = $actividad;
        $this->view->render('actividad/Actualizar');
    }
    function Actactividad()
    {
        //modificar
        $Dactividad[0] = trim($_POST['txt_IdAct']);
        $Dactividad[1] = trim($_POST['txt_NomAct']);
        $Dactividad[2]  = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdAct' => $Dactividad[0], 'txt_NomAct' =>  $Dactividad[1], 'com_estatus' =>  $Dactividad[2]
        ])) {
            // actualizar maestro exito
            $actividad = new varTodas();
            $actividad->actividad_id = $Dactividad[0];
            $actividad->nombre_actividad =  $Dactividad[1];
            $actividad->estatus_actividad_id = $Dactividad[2];
            $this->view->varTodas = $actividad;
            error_log('Actactividad::Datos de la actividad Actualizados');
            $this->redirect('actividad', ['success' => Success::SUCCESS_ADMIN_UPDATE_ACTIVIDAD]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }


}
