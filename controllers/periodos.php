<?php

class Periodos extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
         $Nperiodos = $this->model->getAllPeriodos();
        $this->view->varTodas = $Nperiodos; 
        $this->view->render('periodos/index');
    }
    
    function savePeridos()
    {
        $datos[0]  = trim($_POST['txt_NomPeriodo']);

        if ($this->model->insertPeriodo([
            'txt_NomPeriodo' => $datos[0]
        ])) {
            error_log('savePeridos::Nuevo periodo creado');
            $this->redirect('periodos', ['success' => Success::SUCCESS_ADMIN_NEW_PERIODO]);
        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarPer($param = null)
    {
        $Dperiodos = $param[0];
        if ($this->model->deletePeriodos($Dperiodos)) {
            error_log('eliminarPeriodo::Periodo dado de baja');
            $this->redirect('periodos', ['error' => Errors::ERROR_NO_DELATE_PERIODO]);
        } else {
            $this->redirect('periodos', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $periodo_id = $param[0];
        $grados = $this->model->getById($periodo_id);
        $this->view->varTodas = $grados;
        $this->view->render('periodos/Actualizar');
    }
    function ActPeriodos()
    {
        //modificar
        $Dperiodos[0] = trim($_POST['txt_IdPeriodo']);
        $Dperiodos[1] = trim($_POST['txt_NomPeriodo']);
        $Dperiodos[2]  = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdPeriodo' => $Dperiodos[0], 'txt_NomPeriodo' =>  $Dperiodos[1], 'com_estatus' =>  $Dperiodos[2]
        ])) {
            // actualizar maestro exito
            $periodos = new varTodas();
            $periodos->periodo_id = $Dperiodos[0];
            $periodos->nombre_periodo =  $Dperiodos[1];
            $periodos->estatus_periodos_id = $Dperiodos[2];
            $this->view->varTodas = $periodos;
            error_log('ActPeriodos::Datos del periodo actualizados');
            $this->redirect('periodos', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }


}
