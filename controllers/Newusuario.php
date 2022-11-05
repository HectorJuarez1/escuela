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
}
?>