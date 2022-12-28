
<?php
class ClasesMaestro extends SessionController
{
  function __construct()
  {
    parent::__construct();
    $this->profesor = $this->getUserSessionData();
    //  error_log("user::constructor() ");
  }
  function render()
  {
    // error_log("user::RENDER() ");
    $id_maestro = current($this->profesor);
    $Nclases = $this->model->getAllClases($id_maestro);
    $this->view->varTodas = $Nclases;
    $this->view->render('clasesMaestro/index', ['profesor' => $this->profesor]);
  }
  function verDetalle($param = null)
  {
    $proceso_id = $param[0];
    $asistenciaN = $this->model->getAllId($proceso_id);
    $this->view->varTodas = $asistenciaN;
    $this->view->render('asistencias/nuevo', ['profesor' => $this->profesor]);
  }
}



?>