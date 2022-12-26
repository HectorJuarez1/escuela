<?php

class CalificacionesAlumnos extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $alumnos = current($this->user);
        $_SESSION['id_alumno'] = $alumnos;
        $Califi = $this->model->getAllCalificaciones($alumnos);
        $this->view->varTodas = $Califi;
        $this->view->render('calificacionesAlumnos/index', ['user' => $this->user]);
    }

}
