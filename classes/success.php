<?php

class Success{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation

    const SUCCESS_ADMIN_ALTAS            = "fcd919";
    const SUCCESS_ADMIN_NEW_TUTOR        = "8281e0";
    const SUCCESS_ADMIN_NEW_ALUMNO       = "al1235";
    const SUCCESS_ADMIN_UPDATE_ALUMNO    = "6fb34a";
    const SUCCESS_ADMIN_NEW_AULA         = "f52245";
    const SUCCESS_ADMIN_UPDATE_AULA      = "52ccR4";
    const SUCCESS_ADMIN_NEW_MATERIA      = "eSYaic9e";
    const SUCCESS_ADMIN_UPDATE_MATERIA   = "deYauc9o";
    const SUCCESS_ADMIN_NEW_PERIODO      = "RqYair9e";
    const SUCCESS_ADMIN_UPDATE_PERIODO   = "yeYxsc9o";
    const SUCCESS_ADMIN_NEW_ACTIVIDAD    = "s3Yaid9e";
    const SUCCESS_ADMIN_UPDATE_ACTIVIDAD = "jt3636c";
    const SUCCESS_ADMIN_NEW_GRADO        = "tR3dz9e";
    const SUCCESS_ADMIN_UPDATE_GRADO     = "jtD83Vc";
    const SUCCESS_ADMIN_NEW_MAESTRO      = "edabc9e";
    const SUCCESS_ADMIN_UPDATE_MAESTRO   = "T4sD8cVc";
    const SUCCESS_ADMIN_NEW_PAGO         = "PdaDDc9e";
    const SUCCESS_ADMIN_NEW_USUARIO      = "8281e0";
    const SUCCESS_PROFESOR_NEW           = "Gi51e4";
    const SUCCESS_ACTIVIDA_REALIZA       = "f6acb0";
    const SUCCESS_ACTIVIDA_ENVIADA       = "a901d2";
    const SUCCESS_ACTIVIDA_CALIFICADA    = "2ccfc138";
    const SUCCESS_SIGNUP_NEWUSER         = "d52ccf";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_ADMIN_ALTAS => "Alta Realizada",
            Success::SUCCESS_ADMIN_NEW_ALUMNO => "Alta Realizada",
            Success::SUCCESS_ADMIN_NEW_AULA => "Nueva aula creada",
            Success::SUCCESS_ADMIN_UPDATE_ACTIVIDAD => "Datos de la aula actualizados",
            Success::SUCCESS_ADMIN_UPDATE_ALUMNO => "Datos del alumno actualizados",
            Success::SUCCESS_ADMIN_NEW_TUTOR => "Nuevo tutor creado",
            Success::SUCCESS_ADMIN_NEW_MAESTRO => "Nuevo maestro creado.",
            Success::SUCCESS_ADMIN_UPDATE_MAESTRO => "Datos del maestro actualizados.",
            Success::SUCCESS_ADMIN_NEW_MATERIA => "Nueva materia creado.",
            Success::SUCCESS_ADMIN_UPDATE_MATERIA => "Datos de la materia actualizados.",
            Success::SUCCESS_ADMIN_NEW_PERIODO => "Nueva periodo creado.",
            Success::SUCCESS_ADMIN_UPDATE_PERIODO => "Datos del periodo actualizados.",
            Success::SUCCESS_ADMIN_NEW_ACTIVIDAD => "Nueva actividad creado.",
            Success::SUCCESS_ADMIN_UPDATE_ACTIVIDAD => "Datos de la actividad actualizados.",
            Success::SUCCESS_ADMIN_NEW_GRADO => "Nuevo grado creado.",
            Success::SUCCESS_ADMIN_UPDATE_GRADO => "Datos del grado actualizados.",
            Success::SUCCESS_ADMIN_NEW_PAGO => "Pago registrado con exito.",
            Success::SUCCESS_ADMIN_NEW_USUARIO => "Nuevo usuario creado con exito.",
            Success::SUCCESS_PROFESOR_NEW => "Nueva actividad creada.",
            Success::SUCCESS_ACTIVIDA_REALIZA => "Esta actividad ya fue realiza.",
            Success::SUCCESS_ACTIVIDA_ENVIADA => "Actividad enviada al maestro.",
            Success::SUCCESS_ACTIVIDA_CALIFICADA => "Actividad calificada.",
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