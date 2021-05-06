<?php
class Validator{
    //Check Required Fields
    public function isRequired($field_array){
        foreach($field_array as $field){
            if($_POST[''.$field.''] == '' ){
                return false;
            }
        }
        return true;
    }
    
    //Validate Email
    public function isValidEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }
    
    //Check Password Match
    public function passwordsMatch($pw1,$pw2){
        if($pw1==$pw2){
            return true;
        }
        return false;
    }
    //Check ReCaptcha
    public function isValidReCaptcha(){
        $g_recaptcha_res = $_POST["g-recaptcha-response"];

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 
            'secret' => RC_SCR_K,
            'response' => $g_recaptcha_res,
            'remoteip' => $_SERVER['HTTP_CLIENT_IP']
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success){
            return true;
        }else{
            return false;
        }

    }//Fin
}
?>