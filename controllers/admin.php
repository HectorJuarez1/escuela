<?php

class Admin extends SessionController{

    function __construct(){
        
        parent::__construct();
        
    }
    function render(){

        $Alumnos = $this->model->getAllConAlum();
        $this->view->TotalAlumnos = $Alumnos;
        $Profesores = $this->model->getAllConProf();
        $this->view->TotalProfesores = $Profesores;
        $this->view->render('admin/index');

    }

    
}

?>