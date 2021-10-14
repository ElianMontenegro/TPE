<?php
class UserModel extends Model {

    private $id;
    private $username;
    private $password;
    private $role;

    public function __construct(){
        parent::__construct();
        $this->username = '';
        $this->password = '';
        $this->role = '';
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE user SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM USERS WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO user (username, password, role ) VALUES(:username, :password, :role)');
            $query->execute([
                'username'  => $this->username, 
                'password'  => $this->password,
                'role'      => $this->role,
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    public function getAll(){
        $items = [];
        try{
            $query = $this->query('SELECT * FROM user');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setRole($p['role']);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM user WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->role = $user['role'];

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM user WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE user SET username = :username, password = :password WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username' => $this->username, 
                'password' => $this->password,
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($username){
        try{
            $query = $this->prepare('SELECT username FROM user WHERE username = :username');
            $query->execute( ['username' => $username]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function setUsername($username){ $this->username = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}


    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getRole(){      return $this->role;}
}
?>