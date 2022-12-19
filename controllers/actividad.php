<?php

class Actividad extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->profesor=$this->getUserSessionData();
    }
    function render()
    {
        $id_maestro = current($this->profesor);
        $NMaterias = $this->model->getAllClases($id_maestro);
        $this->view->varTodas = $NMaterias;  
        $this->view->render('actividad/index',['profesor'=>$this->profesor]);
    }

    function verDetalle($param = null)
    {
        $materia_id = $param[0];
        $materia = $this->model->getById($materia_id);
        $this->view->varTodas = $materia;
        $this->view->render('actividad/trabajos',['profesor'=>$this->profesor]);
    }
    



}
