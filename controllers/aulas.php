<?php

class Aulas extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $Naulas = $this->model->getAllAulas();
        $this->view->varTodas = $Naulas;
        $this->view->render('aulas/index');
    }

    function saveAulas()
    {
        $datos[0]  = trim($_POST['txt_NomGrado']);
        if ($this->model->insertAula([
            'txt_NomGrado' => $datos[0]
        ])) {
            error_log('saveAulas::Nuevo Aula creado');
            $this->redirect('aulas', ['success' => Success::SUCCESS_ADMIN_NEW_AULA]);
        } else {
            // error_log('saveAl::Error al crear alumno');
            // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarAul($param = null)
    {
        $Daulas = $param[0];
        if ($this->model->deleteAula($Daulas)) {
            error_log('eliminarAul::Aula dado de baja');
            $this->redirect('aulas', ['error' => Errors::ERROR_DELATE_AULA]);
        } else {
            $this->redirect('aulas', ['error' => Errors::ERROR_DELATE_AULA]);
        }
    }
    function verDetalle($param = null)
    {
        $aula_id = $param[0];
        $grados = $this->model->getById($aula_id);
        $this->view->varTodas = $grados;
        $this->view->render('aulas/Actualizar');
    }
    function ActAulas()
    {
        //modificar
        $Daulas[0] = trim($_POST['txt_IdAulas']);
        $Daulas[1] = trim($_POST['txt_NomGrado']);
        $Daulas[2]  = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdAulas' => $Daulas[0], 'txt_NomGrado' =>  $Daulas[1], 'com_estatus' =>  $Daulas[2]
        ])) {
            // actualizar con exito
            $aulas = new varTodas();
            $aulas->aula_id = $Daulas[0];
            $aulas->nombre_aula =  $Daulas[1];
            $aulas->estatus_aulas_id = $Daulas[2];
            $this->view->varTodas = $aulas;
            error_log('ActAulas::Datos de la aula Actualizados');
            $this->redirect('aulas', ['success' => Success::SUCCESS_ADMIN_UPDATE_AULA]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }
}
