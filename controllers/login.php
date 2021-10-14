<?php 

class Login extends Sessioncontroller{

    function __construct()
    {
        parent::__construct(); //llamamos al constructor de su padre (controller)
        error_log('Login::constructor -> inicio de login');
    }

    function render(){
        $this->view->render('login/index'); 
        error_log('Login::render -> index login cargado');
    }

    function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password)){
                error_log('Login::authenticate() empty');
                $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHRNTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario
            $loginModel = new loginModel();
            $user = $loginModel->login($username, $password);
            
            if($user != NULL){
                // inicializa el proceso de las sesiones
                error_log('Login::authenticate() passed');    
                $this->initialize($user);
                $this->redirect('admin');
            }else{
                //error al registrar, que intente de nuevo
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHRNTICATE_DATA]);
                return;
            }
        }else{
            // error, cargar vista con errores
            error_log('Login::authenticate() error with params');
            $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHRNTICATE]);
        }
    }

}



?>