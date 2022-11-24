<?php

class Pagos extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $this->view->render('Pagos/index');
    }
    function newPago()
    {
        $this->view->render('Pagos/nuevo');
    }

 

}
