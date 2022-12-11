
<?php

class User extends SessionController
{
    function __construct()
    {
       parent::__construct();
        $this->user = $this->getUserSessionData();
        //error_log("user::constructor() ");
    }
    function render()
    {  
      //  error_log("user::RENDER() ");
        $id = current($this->user);
        $Naulas = $this->model->getAllAulas($id);
        $this->view->varTodas = $Naulas; 
        $this->view->render('user/index', ['user' => $this->user]);
        echo $id;
    }

}

?>