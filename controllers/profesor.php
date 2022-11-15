<?php

class Profesor extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->profesor = $this->getUserSessionData();
        error_log("user::constructor() ");
    }
    function render()
    {

        $this->view->render('profesor/index', ['profesor' => $this->profesor]);

      //  $this->view->render('profesor/index');
    }
}
