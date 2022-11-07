<?php

class Newusuario extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $Nusuarios = $this->model->getAll();
        $this->view->varTodas = $Nusuarios;

        $this->view->render('Newusuario/index');
    }
    
    function new()
    {
        $this->view->render('Newusuario/nuevo');
    }
    
    function saveUs()
    {
        $datos[0]  = trim($_POST['txt_usuario']);
        $datos[1]  = trim($_POST['txt_passw']);
        $pass_cifrado = password_hash($datos[1], PASSWORD_DEFAULT, array("cost" => 10));
        $datos[2]  = trim($_POST['txt_rol']);
        $datos[3]  = trim($_POST['txt_Nom_Completo']);
        if ($this->model->insertUsuario([
            'txt_usuario' => $datos[0], 'txt_passw' => $pass_cifrado, 'txt_rol' => $datos[2], 'txt_Nom_Completo' => $datos[3]
        ])) {
            error_log('saveUs::Nuevo usuarios creado');
            $this->redirect('Newusuario', ['success' => Success::SUCCESS_ADMIN_NEW_TUTOR]);
        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarUser($param = null)
    {
        $Duser = $param[0];
        if ($this->model->deleteUsuario($Duser)) {
            error_log('eliminarTur::Padre / Tutor dado de baja');
            $this->redirect('tutor', ['error' => Errors::ERROR_DELATE_TUTOR]);
        } else {
            $this->redirect('tutor', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }


}
?>