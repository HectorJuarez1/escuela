<?php
class Tutor extends SessionController
{

    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $tutor = $this->model->getAll();
        $this->view->varTodas = $tutor;
        $this->view->render('tutor/index');
    }

    function new()
    {
        $this->view->render('tutor/nuevo');
    }

    function savetur()
    {
        $datos[0]  = trim($_POST['txt_nombre']);
        $datos[1]  = trim($_POST['txt_ApPaterno']);
        $datos[2]  = trim($_POST['txt_ApMaterno']);
        $datos[3]  = trim($_POST['txt_Direccion']);
        $datos[4]  = trim($_POST['txt_tel_casa']);
        $datos[5]  = trim($_POST['txt_celular']);
        $datos[6]  = trim($_POST['txt_correo']);
        $datos[7]  = trim($_POST['txt_sexo']);
        if ($this->model->insertTutor([
            'txt_nombre' => $datos[0], 'txt_ApPaterno' => $datos[1], 'txt_ApMaterno' => $datos[2], 'txt_Direccion' => $datos[3],
            'txt_tel_casa' => $datos[4], 'txt_celular' => $datos[5], 'txt_correo' => $datos[6],'txt_sexo'=>$datos[7]
        ])) {
            error_log('saveAl::Nuevo Padre / Tutor Creado');
            $this->redirect('tutor', ['success' => Success::SUCCESS_ADMIN_NEW_TUTOR]);
        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }

    function eliminarTur($param = null)
    {
        $tutor = $param[0];
        if ($this->model->deleteTutor($tutor)) {
            error_log('eliminarTur::Padre / Tutor dado de baja');
            $this->redirect('tutor', ['error' => Errors::ERROR_DELATE_TUTOR]);
        } else {
            $this->redirect('tutor', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $id_tutor = $param[0];
        $tutor = $this->model->getById($id_tutor);
        $this->view->varTodas = $tutor;
        $this->view->render('tutor/Actualizar');
    }
    function ActualizarT()
    {
        //modificar
        $Dtutor[0] = trim($_POST['id_Tutor']);
        $Dtutor[1]  = trim($_POST['txt_nombre']);
        $Dtutor[2]  = trim($_POST['txt_ApPaterno']);
        $Dtutor[3]  = trim($_POST['txt_ApMaterno']);
        $Dtutor[4]   = trim($_POST['txt_Direccion']);
        $Dtutor[5]   = trim($_POST['txt_tel_casa']);
        $Dtutor[6]   = trim($_POST['txt_celular']);
        $Dtutor[7]   = trim($_POST['txt_correo']);
        $Dtutor[8]   = trim($_POST['txt_sexo']);
        if ($this->model->update([
            'id_Tutor' => $Dtutor[0], 'txt_nombre' =>  $Dtutor[1], 'txt_ApPaterno' =>  $Dtutor[2],
            'txt_ApMaterno' =>  $Dtutor[3], 'txt_Direccion' =>  $Dtutor[4], 'txt_tel_casa' =>  $Dtutor[5],
            'txt_celular' =>  $Dtutor[6],'txt_correo' =>  $Dtutor[7],'txt_sexo' =>  $Dtutor[8]
        ])) {
            // actualizar exito
            $tutor = new varTodas();
            $tutor->id_Tutorr = $Dtutor[0];
            $tutor->Tur_Nombres =  $Dtutor[1];
            $tutor->Tur_Apellido_Paterno = $Dtutor[2];
            $tutor->Tur_Apellido_Materno = $Dtutor[3];
            $tutor->Tur_Direccion =  $Dtutor[4];
            $tutor->Tur_Telefono_Casa =  $Dtutor[5];
            $tutor->Tur_Telefono_Celular =  $Dtutor[6];
            $tutor->Tur_Correo =  $Dtutor[7];
            $tutor->Tur_Sexo =  $Dtutor[8];
            $this->view->varTodas = $tutor;
            error_log('ActualizarT::Datos del tutor Actualizados');
            $this->redirect('tutor', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }
}
