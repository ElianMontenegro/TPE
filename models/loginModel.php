<?php
include_once 'models/userModel.php';
class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        try{
            $query = $this->prepare('SELECT * FROM user WHERE username = :username');
            $query->execute(['username' => $username]);
            error_log("login: inicio aasa" . $query->rowCount());
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC); 
                $user = new UserModel();
                $user->setId($item['id']); 
                $user->setUsername($item['username']); 
                $user->setPassword($item['password']); 
                $user->setRole($item['role']); 
                if(password_verify($password, $user->getPassword())){
                    error_log('login: success');
                    return $user;
                }else{
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }
}

?>