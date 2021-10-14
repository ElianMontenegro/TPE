<?php 

class ErrorMessages{
    // ERROR_CONTROLLER_METHODS_ACTION
    const ERROR_ADMIN_NEWBLOG_EXISTS = "3c3d1cc155ef8d6c4950db8d629a71cd";
    const ERROR_LOGIN_AUTHRNTICATE_EMPTY = "fawgagwatt5dkhjkjhkhjk7070707";
    const ERROR_LOGIN_AUTHRNTICATE_DATA = "qwertyu642324pñgfjdjnsd999wadaw";
    const ERROR_LOGIN_AUTHRNTICATE = "qwerty121234556753djnsd999wadaw";
    const ERROR_SIGNUP_NEWUSER = "3c3d1casasaasd6c4950db8d629a71cd";
    const ERROR_SIGNUP_NO_SAVE = "1111111casasaasd6c4950db8d629a71cd";
    const ERROR_SIGNUP_NEWUSER_EXISTS = "adwadawdaw433255236326262623";
    const ERROR_SIGNUP_EMPTY = "111111dawdawdasaasd6c4950db8d629a71cd";
    private $errorList = [];    
    
    function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWBLOG_EXISTS => 'este blog ya existe',
            ErrorMessages::ERROR_LOGIN_AUTHRNTICATE_EMPTY => 'Llena los campos de usuario y password',
            ErrorMessages::ERROR_LOGIN_AUTHRNTICATE_DATA => 'Nombre de usuario y/o contraseña incorrecto',
            ErrorMessages::ERROR_LOGIN_AUTHRNTICATE => 'No se pudo procesar la solicitud. ingreda usuario y password',
            ErrorMessages::ERROR_SIGNUP_NEWUSER => 'hubo un error',
            ErrorMessages::ERROR_SIGNUP_EMPTY => 'Llena los campos de usuario y password',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS => 'ese username ya existe',
            ErrorMessages::ERROR_SIGNUP_NO_SAVE => 'Hubo un error al intentar registrar el usuario',
        ];
    }

    public function get($hash){
        //para recuperar la costate
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        //para combrobar si esxites la costanten
        if(array_key_exists($key, $this->errorList)){
            return true;
        }else{
            return false;
        }
    }
}



?>