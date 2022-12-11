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

    function rol()
    {
        $this->view->render('Newusuario/rol');
    }
    function new()
    {
        $this->view->render('Newusuario/nuevo');
    }
    function newM()
    {
        $this->view->render('Newusuario/nuevoMaestro');
    }
    function verDetalle()
    {
            $Nalumno[0]  = trim($_POST['txt_buscar']);
            if ($Nalumno[0]  == '') {
                $this->view->render('Newusuario/nuevo');
            } else {
                $Alumnos = $this->model->getAllDNombres($Nalumno[0]);
                $this->view->DatosUsuario = $Alumnos;
                $this->view->render('Newusuario/nuevo');
            } 
    }
    function verDetalleM()
    {
            $Nmaestro[0]  = trim($_POST['txt_buscarM']);
            if ($Nmaestro[0]  == '') {
                $this->view->render('Newusuario/nuevoMaestro');
            } else {
                $Maestros = $this->model->getAllDMaestro($Nmaestro[0]);
                $this->view->DatosMaestro = $Maestros;
                $this->view->render('Newusuario/nuevoMaestro');
            } 
    }
    function saveUs()
    {
        $datos[0]  = trim($_POST['txt_no_usuario']);
        $datos[1]  = trim($_POST['txt_usuario']);
        $datos[2]  = trim($_POST['txt_passw']);
        $pass_cifrado = password_hash($datos[2], PASSWORD_DEFAULT, array("cost" => 10));
        $datos[3]  = trim($_POST['txt_Nom_Completo']);
        //validar id de usuario
        $numero =$this->model->ValidarIdUsuario($datos[0]);
        if ($numero >=1) {
            $this->redirect('Newusuario', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }else{
            if ($this->model->insertUsuario([
                'txt_no_usuario' => $datos[0], 'txt_usuario' => $datos[1], 'txt_passw' => $pass_cifrado, 'txt_Nom_Completo' => $datos[3]
            ])) {
                error_log('saveUs::Nuevo usuarios creado');
                $this->redirect('Newusuario', ['success' => Success::SUCCESS_ADMIN_NEW_USUARIO]);
            } else {
                // error_log('saveAl::Error al crear alumno');
                // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
            }
        }
    }


    function saveUsMa()
    {
        $datos[0]  = trim($_POST['txt_no_maestro']);
        $datos[1]  = trim($_POST['txt_usuario']);
        $datos[2]  = trim($_POST['txt_passw']);
        $pass_cifrado = password_hash($datos[2], PASSWORD_DEFAULT, array("cost" => 10));
        $datos[3]  = trim($_POST['txt_Nom_Completo']);
          //validar id de usuario
            $numero =$this->model->ValidarIdUsuario($datos[0]);
            if ($numero >=1) {
                $this->redirect('Newusuario', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }else
        {
            if ($this->model->insertMaestro([
                'txt_no_usuario' => $datos[0], 'txt_usuario' => $datos[1], 'txt_passw' => $pass_cifrado, 'txt_Nom_Completo' => $datos[3]
            ])) {
                error_log('saveUs::Nuevo usuarios creado');
                $this->redirect('Newusuario', ['success' => Success::SUCCESS_ADMIN_NEW_USUARIO]);
            } else {
                // error_log('saveAl::Error al crear alumno');
                // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
            }
        }
    }

    function eliminarUser($param = null)
    {
        $Duser = $param[0];
        if ($this->model->deleteUsuario($Duser)) {
            error_log('eliminarTur::Usuario Eliminado');
            $this->redirect('Newusuario', ['error' => Errors::ERROR_NO_DELATE_USUARIO]);
        } else {
            $this->redirect('Newusuario', ['error' => Errors::ERROR_NO_DELATE_USUARIO]);
        }
    }
}
