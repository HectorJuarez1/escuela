<?php

class Newusuario extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $this->view->render('Newusuario/index');
    }
}
?>