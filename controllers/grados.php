<?php

class Grados extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $Ngrados = $this->model->getAllGrados();
        $this->view->varTodas = $Ngrados;
        $this->view->render('grados/index');
    }
    
    function saveGrados()
    {
        $datos[0]  = trim($_POST['txt_NomGrado']);

        if ($this->model->insertGrado([
            'txt_NomGrado' => $datos[0]
        ])) {
            error_log('saveGrados::Nuevo grado creado');
            $this->redirect('grados', ['success' => Success::SUCCESS_ADMIN_NEW_GRADO]);
        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarGra($param = null)
    {
        $Dgrado = $param[0];
        if ($this->model->deleteGrado($Dgrado)) {
            error_log('eliminarGra::Grado dado de baja');
            $this->redirect('grados', ['error' => Errors::ERROR_NO_DELATE_GRADO]);
        } else {
            $this->redirect('grados', ['error' => Errors::ERROR_NO_DELATE_GRADO]);
        }
    }
    function verDetalle($param = null)
    {
        $grado_id = $param[0];
        $grados = $this->model->getById($grado_id);
        $this->view->varTodas = $grados;
        $this->view->render('grados/Actualizar');
    }
    function ActGrado()
    {
        //modificar
        $Dgrados[0] = trim($_POST['txt_IdGrado']);
        $Dgrados[1] = trim($_POST['txt_NomGrado']);
        $Dgrados[2]  = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdGrado' => $Dgrados[0], 'txt_NomGrado' =>  $Dgrados[1], 'com_estatus' =>  $Dgrados[2]
        ])) {
            // actualizar grado exito
            $maestros = new varTodas();
            $maestros->grado_id = $Dgrados[0];
            $maestros->nombre_grado =  $Dgrados[1];
            $maestros->estatus_grados_id = $Dgrados[2];
            $this->view->varTodas = $maestros;
            error_log('ActGrado::Datos del grado Actualizados');
            $this->redirect('grados', ['success' => Success::SUCCESS_ADMIN_UPDATE_GRADO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }


}
