<?php include('core/init.php'); ?>
<?php
//Create validate object
$validate = new Validator;
$target_destino = 'index.php';

//Validar Token CSRF y comprobamos que recibimos el formulario
if ((!empty($_POST['antiCSRF']))&&(isset($_POST['do_login']))) {
    if (hash_equals($_SESSION['token'], $_POST['antiCSRF'])) {
        //Val-Recaptcha
        if($validate->isValidReCaptcha()){
            //get username and password
            $username = limpiar_Datos($_POST['username']);
            $password = limpiar_Datos($_POST['password']);
        
            //Create user object
            $user = new User;
                
            if($user->login($username, $password)){
                redirect(urlFormat($target_destino),'You have been logged in.', 'success');
            } else {
                redirect(urlFormat($target_destino),'Invalid login', 'error');
            }
        } else {
            redirect(urlFormat($target_destino),'Error en Captcha', 'error');
        }//Fin Val-Recaptcha
    } else {
        // Posible petición malintencionada mitigada
        redirect(urlFormat($target_destino));
        // TODO: Se recomienda guardar este acceso en un log
    }
  }//Fin Validar Token
  ?>