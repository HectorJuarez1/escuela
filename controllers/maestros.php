<?php

class Maestros extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $Nmaestros = $this->model->getAllMaestro();
        $this->view->varTodas = $Nmaestros;
        $this->view->render('maestros/index');
    }

    function new()
    {
        $this->view->render('maestros/nuevo');
    }

    function saveMaestro()
    {
        $datos[0]  = trim($_POST['txt_cedula']);
        $datos[1]  = trim($_POST['txt_nombre']);
        $datos[2]  = trim($_POST['txt_ApPaterno']);
        $datos[3]  = trim($_POST['txt_ApMaterno']);
        $datos[4]  = trim($_POST['txt_direccion']);
        $datos[5]  = trim($_POST['txt_telefono']);
        $datos[6]  = trim($_POST['txt_FeNacimiento']);
        $datos[7]  = trim($_POST['txt_sexo']);
        $datos[8]  = trim($_POST['txt_No_Profesor']);
        if ($this->model->insertMaestro([
            'txt_cedula' => $datos[0], 'txt_nombre' => $datos[1], 'txt_ApPaterno' => $datos[2], 'txt_ApMaterno' => $datos[3],
            'txt_direccion' => $datos[4], 'txt_telefono' => $datos[5], 'txt_FeNacimiento' => $datos[6], 'txt_sexo' => $datos[7], 'txt_No_Profesor' => $datos[8]
        ])) {
            error_log('saveUs::Nuevo maestro creado');
            $this->redirect('maestros', ['success' => Success::SUCCESS_ADMIN_NEW_MAESTRO]);
        } else {
            // error_log('saveAl::Error al crear alumno');
            // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarMa($param = null)
    {
        $Dmaestro = $param[0];
        if ($this->model->deleteMaestros($Dmaestro)) {
            error_log('eliminarMa::Maestro dado de baja');
            $this->redirect('maestros', ['error' => Errors::ERROR_NO_DELATE_MAESTRO]);
        } else {
            $this->redirect('maestros', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $profesor_id = $param[0];
        $maestros = $this->model->getById($profesor_id);
        $this->view->varTodas = $maestros;
        $this->view->render('maestros/Actualizar');
    }
    function ActMaestro()
    {
        //modificar
        $Dmaestros[0] = trim($_POST['txt_idprofesor']);
        $Dmaestros[1] = trim($_POST['txt_cedula']);
        $Dmaestros[2]  = trim($_POST['txt_nombre']);
        $Dmaestros[3]  = trim($_POST['txt_ApPaterno']);
        $Dmaestros[4]  = trim($_POST['txt_ApMaterno']);
        $Dmaestros[5]   = trim($_POST['txt_direccion']);
        $Dmaestros[6]   = trim($_POST['txt_FeNacimiento']);
        $Dmaestros[7]   = trim($_POST['txt_telefono']);
        $Dmaestros[8]   = trim($_POST['txt_sexo']);
        $Dmaestros[9]   = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_idprofesor' => $Dmaestros[0], 'txt_cedula' =>  $Dmaestros[1], 'txt_nombre' =>  $Dmaestros[2],
            'txt_ApPaterno' =>  $Dmaestros[3], 'txt_ApMaterno' =>  $Dmaestros[4], 'txt_direccion' =>  $Dmaestros[5],
            'txt_FeNacimiento' =>  $Dmaestros[6], 'txt_telefono' =>  $Dmaestros[7], 'txt_sexo' =>  $Dmaestros[8], 'com_estatus' =>  $Dmaestros[9]
        ])) {
            // actualizar maestro exito
            $maestros = new varTodas();
            $maestros->vw_m_profesor_id = $Dmaestros[0];
            $maestros->vw_m_Cedula =  $Dmaestros[1];
            $maestros->vw_m_Nombre = $Dmaestros[2];
            $maestros->vw_m_Apellido_paterno = $Dmaestros[3];
            $maestros->vw_m_Apellido_Materno =  $Dmaestros[4];
            $maestros->vw_m_Direccion =  $Dmaestros[5];
            $maestros->vw_m_Fecha_nacimiento =  $Dmaestros[6];
            $maestros->vw_m_Telefono =  $Dmaestros[7];
            $maestros->vw_m_Sexo =  $Dmaestros[8];
            $maestros->vw_m_estatus_maestro_id =  $Dmaestros[9];
            $this->view->varTodas = $maestros;
            error_log('ActualizarR::Datos del maestros Actualizados');
            $this->redirect('maestros', ['success' => Success::SUCCESS_ADMIN_UPDATE_MAESTRO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }
}
