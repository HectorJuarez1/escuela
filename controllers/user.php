
<?php

class User extends SessionController{

    private $user;


    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        error_log("user::constructor() ");
       
    }

     function render(){
        error_log("user::RENDER() ");
        $this->view->render('user/index',[
            'user'=> $this->user]);
    }
    


    
}

?>