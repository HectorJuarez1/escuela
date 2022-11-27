<?php

class Materias extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {

        
      $Nmaterias = $this->model->getAllMaterias();
        $this->view->varTodas = $Nmaterias;  


        $Grados = $this->model->getGrados();
        $this->view->ComboGrados = $Grados;

        $Horas = $this->model->getHoras();
        $this->view->ComboHoras = $Horas;



        $this->view->render('materias/index');
       
    }
    
    function saveMaterias()
    {
        $datos[0]  = trim($_POST['txt_NomMaterias']);
        $datos[1]  = trim($_POST['com_DiaSemana']);
        $datos[2]  = trim($_POST['com_horainicio']);
        $datos[3]  = trim($_POST['com_horafin']);
        $datos[4]  = trim($_POST['com_grados']);


        if ($this->model->insertMateria([
            'txt_NomMaterias' => $datos[0], 'com_DiaSemana' => $datos[1], 'com_horainicio' => $datos[2], 'com_horafin' => $datos[3],
            'com_grados' => $datos[4]
        ])) {
            error_log('saveMaterias::Nueva Materia creada');
            $this->redirect('materias', ['success' => Success::SUCCESS_ADMIN_NEW_MATERIA]);


        } else {
           // error_log('saveAl::Error al crear alumno');
           // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function eliminarMat($param = null)
    {
        $Dmaterias = $param[0];
        if ($this->model->deleteMateria($Dmaterias)) {
            error_log('eliminarMat::Materia dado de baja');
            $this->redirect('materias', ['error' => Errors::ERROR_NO_DELATE_MATERIA]);
        } else {
            $this->redirect('materias', ['error' => Errors::ERROR_NO_DELATE]);
        }
    }
    function verDetalle($param = null)
    {
        $materia_id = $param[0];
        $materias = $this->model->getById($materia_id);
        $this->view->varTodas = $materias;
        $this->view->render('materias/Actualizar');
    }
    function ActMaterias()
    {
        //modificar
        $Dmaterias[0] = trim($_POST['txt_IdMaterias']);
        $Dmaterias[1] = trim($_POST['txt_NomMaterias']);
        $Dmaterias[2]  = trim($_POST['com_estatus']);
        if ($this->model->update([
            'txt_IdMaterias' => $Dmaterias[0], 'txt_NomMaterias' =>  $Dmaterias[1], 'com_estatus' =>  $Dmaterias[2]
        ])) {
            // actualizar maestro exito
            $materias = new varTodas();
            $materias->materia_id = $Dmaterias[0];
            $materias->nombre_materia =  $Dmaterias[1];
            $materias->estatus_materias_id = $Dmaterias[2];
            $this->view->varTodas = $materias;
            error_log('ActMaterias::Datos de la materia actualizados');
            $this->redirect('materias', ['success' => Success::SUCCESS_ADMIN_UPDATE_MATERIA]);
        } else {
            //    $this->redirect('consultarMarca', ['warning' => WarningMessages::ADVERTENCIA_NOREGISTRADO]);
        }
    }


}
