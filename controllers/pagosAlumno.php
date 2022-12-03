
<?php

class  pagosAlumno extends SessionController
{


    function __construct()
    {
        parent::__construct();

        $this->user = $this->getUserSessionData();
    }

    function render()
    {  


        $id_alumno = current($this->user);
        $Npagos = $this->model->getAllPagos($id_alumno);
        $this->view->varPagos = $Npagos; 
        $this->view->render('pagosAlumnos/index', ['user' => $this->user]);


    }







}

?>