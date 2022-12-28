
<?php

class materiasAlumno extends SessionController
{
  function __construct()
  {
    parent::__construct();
    $this->user = $this->getUserSessionData();
    //  error_log("user::constructor() ");
  }

  function render()
  {
    // error_log("user::RENDER() ");
    $id_alumno = current($this->user);
    $Naulas = $this->model->getAllMaterias($id_alumno);
    $this->view->varTodas = $Naulas;
    $this->view->render('materiasAlumnos/index', ['user' => $this->user]);
  }
}

?>