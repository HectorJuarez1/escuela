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
        $alumnos = current($this->user);
        $_SESSION['id_alumno'] = $alumnos;
        $NMaterias = $this->model->getAllMaterias($alumnos);
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
        $datos[0]  = $_SESSION['id_actividad'];
        $datos[1]  = $_SESSION['id_alumno'];
        $materia = $this->model->getById($_SESSION['id_actividad']);
        $this->view->varTodas = $materia;
        $numero = $this->model->ValidarActividad([
            'id_actividad' => $datos[0], 'id_alumno' => $datos[1]
        ]);
        if ($numero >= 1) {
            $this->redirect('actividadAlumnos', ['success' => Success::SUCCESS_ACTIVIDA_REALIZA]);
        } else {
            $this->view->render('actividadAlumnos/trabajos', ['user' => $this->user]);
        }
    }
    function saveActEstatus()
    {
        $datos[0]  = $_SESSION['id_actividad'];
        $datos[1]  = $_SESSION['id_alumno'];
        $datos[2]  = $_SESSION['id_materia_alum'];
        $datos[3]  = trim($_POST['txt_actividad_realizada']);
        $datos[4] = $_FILES['filename']['name']; // obtiene el nombre
        $archivotm = $_FILES['filename']['tmp_name']; // obtiene el archiv
        $ruta = 'actividades/';
        move_uploaded_file($archivotm, $ruta . $datos[4]);
        if ($this->model->insertCalificacion([
            'id_actividad' => $datos[0], 'id_alumno' => $datos[1], 'id_materia_alum' => $datos[2],
            'txt_actividad_realizada' => $datos[3], 'filename' => $datos[4]
        ])) {
            error_log('saveActividad::Actividad enviada para calificar');
            $this->redirect('actividadAlumnos', ['success' => Success::SUCCESS_ACTIVIDA_ENVIADA]);
        } else {
            // error_log('saveAl::Error al crear alumno');
            // $this->redirect('tutor', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    function calificaciones()
    {
        $this->view->render('calificaciones');
    }
}
