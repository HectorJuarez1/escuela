
<?php
class Asistencias extends SessionController
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
        $NmateriasAsig = $this->model->getAllMateriasA($id_maestro);
        $this->view->varTodas = $NmateriasAsig; 
        $this->view->render('asistencias/index', ['profesor' => $this->profesor]);
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