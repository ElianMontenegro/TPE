<?php 

class SuccessMessages{

    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = "3c3d1cc155ef8d6c4950db8d629a71cd";
    const SUCCESS_REGISTRO_NEWUSER = "3dhjswhshshshef8d6c4950db8d629a71cd";
   
    private $successList = [];    

    function __construct()
    {
        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => 'La categoria fue creada Correctamente!',
            SuccessMessages::SUCCESS_REGISTRO_NEWUSER => 'nuevo usuario registrado correctamente'
        ];
    }

    public function get($hash){
        //para recuperar la costate
        return $this->successList[$hash];
    }

    public function existsKey($key){
        //para combrobar si esxites la costanten
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }


}



?>