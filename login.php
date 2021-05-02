<?php include('core/init.php'); ?>
<?php
//Validar Token CSRF y comprobamos que recibimos el formulario
if ((!empty($_POST['antiCSRF']))&&(isset($_POST['do_login']))) {
    if (hash_equals($_SESSION['token'], $_POST['antiCSRF'])) {
        //get username and password
        $username = limpiar_Datos($_POST['username']);
        $password = limpiar_Datos($_POST['password']);
            
        //Create user object
        $user = new User;
            
        if($user->login($username, $password)){
            redirect('index.php','You have been logged in.', 'success');
        } else {
            redirect('index.php','Invalid login', 'error');
        }
    } else {
        // Posible petición malintencionada
        redirect('index.php');
        // TODO: Se recomienda guardar este acceso en un log
    }
  }//Fin Validar Token
?>