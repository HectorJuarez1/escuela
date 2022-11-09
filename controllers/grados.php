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
            $this->redirect('grados', ['success' => Success::SUCCESS_ADMIN_NEW_MAESTRO]);
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
            $this->redirect('grados', ['error' => Errors::ERROR_DELATE_TUTOR]);
        } else {
            $this->redirect('grados', ['error' => Errors::ERROR_NO_DELATE]);
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
            'txt_FeNacimiento' =>  $Dmaestros[6],'txt_telefono' =>  $Dmaestros[7],'txt_sexo' =>  $Dmaestros[8],'com_estatus' =>  $Dmaestros[9]
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
            $this->redirect('maestros', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }


}
