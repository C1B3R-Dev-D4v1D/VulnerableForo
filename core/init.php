<?php 
//Start Session
session_start([
'cookie_secure' => true,
'cache_expire' => 1500,
'cookie_lifetime' =>  1500,
'cookie_samesite' => 'strict',
'cookie_httponly' => 'true'
]);

//Creamos el Token Anti CSRF
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

//Include Configuration
require_once('config/config.php');

//Helper Function Files
require_once('helpers/system_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');

//Autoload Classes
function __autoload($class_name){
    require_once('libraries/'.$class_name.'.php');
}
