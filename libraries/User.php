<?php

class User {
    //Initialize DB Variable
    private $db;
    
    //Opciones Contraseña
    const HHASH = PASSWORD_DEFAULT;
    const HCOST = 14;

    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    
    //Register User
    public function register($data){
        //Query
        $this->db->query('insert into users (name, email, avatar, username, password, about, last_activity) values (:name, :email, :avatar, :username, :password, :about, :last_activity)');
        //Bind Values
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':avatar',$data['avatar']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':about',$data['about']);
        $this->db->bind(':last_activity',$data['last_activity']);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    //Upload User Avatar
    public function uploadAvatar(){
        $temp = explode(".",$_FILES['avatar']['name']);
        $extension = end($temp);

        if( $_FILES['avatar']['size'] < 500000 ) {
                if ($_FILES['avatar']['error'] > 0){
                    redirect('register.php', $_FILES['avatar']['error'],'error');
                } else {
                    if (file_exists("images/avatars/" . $_FILES['avatar']['name'])){
                        redirect('register.php', 'File already exists','error');
                    } else {
                        move_uploaded_file(realpath($_FILES['avatar']['tmp_name']), realpath("images/avatars/".$_FILES['avatar']['name']));
                        return true;
                    }
                }
        } else {
            redirect('register.php', 'Invalid File Type!','error');
        }

    }

    //Cifrar Clave
    public function cifra_clave($mipassword){
        return password_hash($mipassword, self::HHASH, ['cost' => self::HCOST]);
    }
   
    //funcion GetHashclave
    public function getHashclave($username){
        $this->db->query('select password as hashClave, id FROM users WHERE username = :username');
        $this->db->bind(':username',$username);
        
        $row = $this->db->single();
        
        return $row;
    }

    //funcion Actualiza Hash de Clave
    public function reHashMe($data){
        //Query
        $this->db->query('update users set password = :newHash WHERE id = :id');
        //Bind Values
        $this->db->bind(':newHash',$data['hashClave']);
        $this->db->bind(':id',$data['id']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    //User login 
    public function login($username,$password){
        //obtenemos Hash Almacenado del usuario
        $miClaveHash=$this->getHashclave($username);
        //Verificamos la clave introducida y el hash
        if(password_verify($password,$miClaveHash['hashClave'])){
            //Comprobamos si el hash necesita un rehash, actualizacion de seguridad
            if (password_needs_rehash($this->data->passwordHash, self::HHASH, ['cost' => self::HCOST])) {
                    //reHasheamos la clave
                    $miClaveHash['hashClave']=$this->cifra_clave($password);
                    //actualizamos el nuevo Hash en la BD
                    $this->reHashMe($miClaveHash);
            }
            //nos quedamos con el Hash de la clave introducida
            $password = $miClaveHash['hashClave'];
        }else{
            return false;
        }

        //Reparada SQL Injection - Authentication Bypass
        $this->db->query('select * from users where username = :username and password = :password');
        $this->db->bind(':username',$username);
        $this->db->bind(':password',$password);
        $result = $this->db->single();
        //check result
        if($this->db->rowCount()>0){
            $this->setUserData($result);
            return true;
        } else {
            return false;
        }
    }
    
    //Set User data
    private function setUserData($result){
        $_SESSION['is_logged_in']=true;
        $_SESSION['user_id']=$result['id'];
        $_SESSION['username']=$result['username'];
        $_SESSION['name']=$result['name'];
        $_SESSION['profile']= (int) $result['idprofile'];
    }
    
    //User Logout
    public function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        unset($_SESSION['token']);
        $_SESSION['profile']= (int) PRF_VISIT;
        return true;
    }
    
    //Get total number of users
    public function getTotalUsers(){
        $this->db->query('select * from users');
        $result = $this->db->resultset();
        return $this->db->rowCount();
    }

    //Perfil de Usuario
    public function getProfile($iduser){
        $this->db->query('select u.idprofile as idperfil, p.name as perfil FROM users u, profiles p WHERE u.idprofile=p.idprofile AND u.id = :iduser');
        $this->db->bind(':iduser',$iduser);

        $row = $this->db->single();
        return $row;
    }
}
?>
