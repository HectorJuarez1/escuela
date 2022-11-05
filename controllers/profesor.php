<?php

class Profesor extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $this->view->render('profesor/index');
    }
}
