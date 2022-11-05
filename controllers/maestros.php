<?php

class Maestros extends SessionController{

    function __construct(){
        
        parent::__construct();
        
    }
    function render(){

        $maestros = $this->model->getAll();
        $this->view->varTodas = $maestros;
        $this->view->render('maestros/index');
    }
    
    function new()
    {
        $this->view->render('maestros/nuevo');
    }
    function saveMa()
    {
        $datos[0] = trim($_POST['txt_NoProfesor']);
        $datos[1] = trim($_POST['txt_nombre']);
        $datos[2]  = trim($_POST['txt_ApPaterno']);
        $datos[3]  = trim($_POST['txt_ApMaterno']);
        $datos[4]  = trim($_POST['txt_direccion']);
        $datos[5]   = trim($_POST['txt_telefono']);
        $datos[6]   = trim($_POST['txt_sexo']);
        $datos[7]   = trim($_POST['txt_correo']);
        $datos[8]   = trim($_POST['txt_FeNacimiento']);
        $datos[9] = trim($_POST['txt_Cedula']);
        if ($this->model->insertMaestro([
            'txt_NoProfesor' => $datos[0], 'txt_nombre' => $datos[1], 'txt_ApPaterno' => $datos[2], 'txt_ApMaterno' => $datos[3],
            'txt_direccion' => $datos[4], 'txt_telefono' => $datos[5], 'txt_sexo' => $datos[6], 'txt_correo' => $datos[7], 'txt_FeNacimiento' => $datos[8],'txt_Cedula' => $datos[9]
        ])) {
            error_log('saveMa::Nuevo MaestroCreado');
            $this->redirect('maestros', ['success' => Success::SUCCESS_ADMIN_ALTAS]);
        } else {
            //validar
        }
    }
    function eliminarMa($param = null)
    {
        $id = $param[0];
        if ($this->model->deleteMaestro($id)) {
            error_log('eliminarAl::Alumno Eliminado');
            $this->redirect('maestros', ['error' => Errors::ERROR_DELATE]);
        } else {
        //   $this->redirect('c', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $NoProfesor = $param[0];
        $maestros = $this->model->getById($NoProfesor);
        $this->view->varTodas = $maestros;
        $this->view->render('maestros/Actualizar');
    }
    function ActualizarM()
    {
        //modificar
        $DMaestros[0] = trim($_POST['txt_nombre']);
        $DMaestros[1]  = trim($_POST['txt_ApPaterno']);
        $DMaestros[2]  = trim($_POST['txt_ApMaterno']);
        $DMaestros[3]  = trim($_POST['txt_direccion']);
        $DMaestros[4]   = trim($_POST['txt_telefono']);
        $DMaestros[5]   = trim($_POST['txt_sexo']);
        $DMaestros[6]   = trim($_POST['txt_correo']);
        $DMaestros[7]   = trim($_POST['txt_FeNacimiento']);
        $DMaestros[8] = trim($_POST['txt_NoProfesor']);
        $DMaestros[9] = trim($_POST['txt_Cedula']);
        if ($this->model->update(['txt_nombre' =>$DMaestros[0],'txt_ApPaterno' =>  $DMaestros[1],'txt_ApMaterno' =>  $DMaestros[2],
        'txt_direccion' =>  $DMaestros[3],'txt_telefono' =>  $DMaestros[4],'txt_sexo' =>  $DMaestros[5],'txt_correo' =>  $DMaestros[6],
        'txt_FeNacimiento' =>  $DMaestros[7],'txt_NoProfesor' =>  $DMaestros[8],'txt_Cedula' =>  $DMaestros[9]])) {
            // actualizar maestro exito
            $maestros = new varTodas();
            $maestros->MNombres = $DMaestros[0];
            $maestros->MApellido_paterno =  $DMaestros[1];
            $maestros->MApellido_Materno = $DMaestros[2];
            $maestros->MDireccion = $DMaestros[3];
            $maestros->MTelefono =  $DMaestros[4];
            $maestros->MSexo =  $DMaestros[5];
            $maestros->MEmail =  $DMaestros[6];
            $maestros->MFecha_nacimiento =  $DMaestros[7];
            $maestros->NoProfesor =  $DMaestros[8];
            $maestros->Cedula =  $DMaestros[9];
            $this->view->varTodas = $maestros;
            error_log('ActualizarM::Datos del Maestro Actualizados');
            $this->redirect('maestros', ['success' => Success::SUCCESS_ADMIN_UPDATE_ALUMNO]);
        } else {
        //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }

    
}

?>