<?php
class Profesoralumnos extends SessionController
{

    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $detalle_alum = $this->model->getAllDAsig();
        $this->view->varTodas = $detalle_alum; 
        $this->view->render('profesoralumnos/index');
    }

}
