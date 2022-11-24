<?php

class Pagos extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $this->view->render('Pagos/index');
    }
    function newPago()
    {
        $this->view->render('Pagos/nuevo');
    }

 
    function verDetalle()
    {
            $Nalumno[0]  = trim($_POST['txt_buscar']);
            if ($Nalumno[0]  == '') {
                $this->view->render('Pagos/nuevo');
            } else {
                $Alumnos = $this->model->getAllDNombres($Nalumno[0]);
                $this->view->DatosUsuario = $Alumnos;
                $this->view->render('Pagos/nuevo');
            } 
    }


    function savePa()
    {
        $datos[0]  = trim($_POST['txt_no_usuario']);
        $datos[1]  = trim($_POST['txt_Nom_Completo']);
        $datos[2]  = trim($_POST['txt_Pago']);
        $datos[3]  = trim($_POST['com_concepto']);
        $datos[4]  = trim($_POST['com_Mes']);
     
        if ($this->model->insertPago([
            'txt_no_usuario' => $datos[0], 'txt_Nom_Completo' => $datos[1], 'txt_Pago' => $datos[2], 'com_concepto' => $datos[3], 'com_Mes' => $datos[4]
            
        ])) {
            error_log('saveUs::Nuevo pago registrado');
            $this->redirect('Pagos', ['success' => Success::SUCCESS_ADMIN_NEW_PAGO]);
        } else {
            // error_log('saveAl::Error al crear alumno');
            // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }



}
