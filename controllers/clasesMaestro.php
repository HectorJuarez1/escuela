
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







}



?>