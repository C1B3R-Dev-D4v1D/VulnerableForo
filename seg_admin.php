<?php
require('core/init.php');
if (empty($_SESSION["profile"])){
	echo "No tiene permisos para acceder a esta página.";
	die();
}else if ($_SESSION["profile"] != PRF_ADMIN){
    echo "No tiene privilegios para acceder a esta página.";
	die();
}
?>