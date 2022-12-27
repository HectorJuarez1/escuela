<?php

class Errors{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation

    const ERROR_ALTA_ALUMNO          = "1f8f0a";
    const ERROR_DELATE               = "1f8f1b";
    const ERROR_DELATE_TUTOR         = "0f0735";
    const ERROR_NO_DELATE            = "1C4f0b";
    const ERROR_NO_DELATE_MATERIA    = "15ef0b";
    const ERROR_NO_DELATE_ALUMNO     = "a5bcd78";
    const ERROR_NO_DELATE_PERIODO    = "85Sef0b";
    const ERROR_NO_DELATE_ACTIVIDAD  = "u4Sgf1b";
    const ERROR_NO_DELATE_GRADO      = "407Cf1b";
    const ERROR_NO_DELATE_MAESTRO    = "4ESCf1b";
    const ERROR_NO_CANCELA_PAGO      = "PxGF74S";
    const ERROR_NO_DELATE_USUARIO    = "7D7CC1H";
    const ERROR_SIGNUP_NEWUSER_EXISTS= "a74accf";
    const ERROR_MATERIA_ASIGNADA     = "83f45e1";
    const ERROR_DELATE_ACTIVIDAD     = "09Ds5r";
    const ERROR_LOGIN_AUTHENTICATE               = "11c37cfa";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY         = "2194ac06";
    const ERROR_LOGIN_AUTHENTICATE_DATA          = "bcbe63ed";
    const ERROR_SIGNUP_NEWUSER                   = "1fdce6bb";
    const ERROR_SIGNUP_NEWUSER_EMPTY             = "a5bcd708";



    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [


            Errors::ERROR_ALTA_ALUMNO               => 'Hubo un error al intentar registrarte los datos.',
            Errors::ERROR_DELATE                    => 'Alumno dado de baja',
            Errors::ERROR_NO_DELATE                 => 'Hubo un error al eliminar el registro.',
            Errors::ERROR_DELATE_TUTOR              => 'Tutor Eliminado',
            Errors::ERROR_NO_DELATE_MATERIA         => 'Materia eliminado',
            Errors::ERROR_NO_DELATE_ALUMNO          => 'Alumno eliminado',
            Errors::ERROR_NO_DELATE_PERIODO         => 'Periodo eliminado',
            Errors::ERROR_NO_DELATE_ACTIVIDAD       => 'Actividad eliminada',
            Errors::ERROR_NO_DELATE_GRADO           => 'Grado desactivado',
            Errors::ERROR_NO_DELATE_MAESTRO         => 'Maestro eliminada',
            Errors::ERROR_NO_CANCELA_PAGO           => 'Pago cancelado',
            Errors::ERROR_NO_DELATE_USUARIO         => 'Usuario eliminada',
            Errors::ERROR_SIGNUP_NEWUSER_EXISTS     => 'El usuario ya esta registrado.',
            Errors::ERROR_MATERIA_ASIGNADA          => 'La materia ya fue asiganada al prosefor.',
            Errors::ERROR_DELATE_ACTIVIDAD          => 'La actividad ha sido eliminada.',
            Errors::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al autenticarse',
            Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los parámetros para autenticar no pueden estar vacíos',
            Errors::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Nombre de usuario y/o password incorrectos',
            Errors::ERROR_SIGNUP_NEWUSER            => 'Hubo un error al intentar registrarte. Intenta de nuevo',
            Errors::ERROR_SIGNUP_NEWUSER_EMPTY      => 'Los campos no pueden estar vacíos',

        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>