<?php



class Signup extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('login/signup');
    }

    function newUser(){
        if($this->existPOST(['username', 'password'])){
            
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            
            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_EMPTY]);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole("user");
            
            if($user->exists($username)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
            }else if($user->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_REGISTRO_NEWUSER]);
            }else{
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NO_SAVE]);
            }
        }else{
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }
    }
}

?>