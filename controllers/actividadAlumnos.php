<?php

class ActividadAlumnos extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $_SESSION['id_alumno'] = current($this->user);
        $NMaterias = $this->model->getAllMaterias($_SESSION['id_alumno']);
        $this->view->varTodas = $NMaterias;
        $this->view->render('actividadAlumnos/index', ['user' => $this->user]);
    }

    function verDetalle($param = null)
    {
        $_SESSION['id_materia_alum'] = $param[0];
        $materia = $this->model->getById($_SESSION['id_materia_alum']);
        $this->view->varTodas = $materia;
        $this->view->render('actividadAlumnos/consultar', ['user' => $this->user]);
    }
    function Detalle($param = null)
    {
        $_SESSION['id_actividad'] = $param[0];
        $materia = $this->model->getById($_SESSION['id_actividad']);
        var_dump( $_SESSION['id_actividad'] );
        var_dump( $_SESSION['id_alumno'] );
        var_dump( $_SESSION['id_materia_alum'] );
        $this->view->varTodas = $materia;
        $this->view->render('actividadAlumnos/trabajos', ['user' => $this->user]);
    }














}
