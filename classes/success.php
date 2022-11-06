<?php

class Success{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    const SUCCESS_ADMIN_NEW_ALUMNO    = "al1235";
    const SUCCESS_ADMIN_NEW_AULA    = "f52245";
    const SUCCESS_ADMIN_UPDATE_ALUMNO    = "6fb34a";
    const SUCCESS_ADMIN_ALTAS      = "fcd919";
    const SUCCESS_ADMIN_NEW_TUTOR    = "8281e0";

    const SUCCESS_EXPENSES_DELETE       = "fcd919285d5759328b143801573ec47d";
    const SUCCESS_EXPENSES_NEWEXPENSE   = "fbbd0f23184e820e1df466abe6102955";
    const SUCCESS_USER_UPDATEBUDGET     = "2ee085ac8828407f4908e4d134195e5c";
    const SUCCESS_USER_UPDATENAME       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPASSWORD       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPHOTO       = "edabc9e4581fee3f0056fff4685ee9a8";
    const SUCCESS_SIGNUP_NEWUSER       = "8281e04ed52ccfc13820d0f6acb0985a";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_ADMIN_ALTAS => "Alta Realizada",
            Success::SUCCESS_ADMIN_NEW_ALUMNO => "Alta Realizada",
            Success::SUCCESS_ADMIN_NEW_AULA => "Nueva aula creada",
            Success::SUCCESS_ADMIN_UPDATE_ALUMNO => "Datos del alumno Actualizados",
            Success::SUCCESS_ADMIN_NEW_TUTOR => "Nuevo tutor creado",
            Success::SUCCESS_USER_UPDATEBUDGET => "Presupuesto actualizado correctamente",
            Success::SUCCESS_USER_UPDATENAME => "Nombre actualizado correctamente",
            Success::SUCCESS_USER_UPDATEPASSWORD => "Contraseña actualizado correctamente",
            Success::SUCCESS_USER_UPDATEPHOTO => "Imagen de usuario actualizada correctamente",
            Success::SUCCESS_SIGNUP_NEWUSER => "Dato registrado correctamente"
        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>