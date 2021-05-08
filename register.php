<?php require('core/init.php'); ?>
<?php 
//Create User Object
$user = new User;
//Create validate object
$validate = new Validator;

if(isset($_POST['register'])){
    $data = array();
    $data['name'] = limpiar_Datos($_POST['name']);
    $data['email'] = limpiar_Datos($_POST['email']);
    $data['username'] = limpiar_Datos($_POST['username']);
    $data['password'] = limpiar_Datos($_POST['password']);
    $data['password2'] = limpiar_Datos($_POST['password2']);
    $data['about'] = limpiar_Datos($_POST['about']);
    $data['last_activity'] = date("Y-m-d H:i:s");
    
//Val-Recaptcha
if($validate->isValidReCaptcha()){
    //Required fields
    $field_array = array('name','email','username','password','password2');
    
    if ($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['email'])){
            if($validate->passwordsMatch($data['password'],$data['password2'])){
                //ciframos la clave para guardarla segura.
                $data['password']=$user->cifra_clave($data['password']);
                //Upload Avatar image
                if ($user->uploadAvatar()){
                    $data['avatar'] = $_FILES["avatar"]["name"];
                } else {
                    $data['avatar'] = 'noimage.png';
                }

                //Register User
                if($user->register($data)){
                    redirect('index.php', 'You are registered and can now log in','success');
                } else {
                    redirect('register.php', 'Something went wrong with registration','error');
                }
            } else {
                redirect('register.php',"Your Passwords do not match.",'error');
            }
        } else {
            redirect('register.php',"Use a valid email address.",'error');
        }
    } else {
        redirect('register.php',"Please fill in All required fields",'error');
    }
}else{
    redirect('register.php', 'Error Captcha','error');
}
    

}

//Get Template and Assign Vars
$template = new Template('templates/register.php');

//Assign Vars

//Display template
echo $template;

?>