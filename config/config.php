<?php
//DB Params
define ("DB_HOST", "mysqldb");
define ("DB_USER", "dev");
define ("DB_PASS", "dev");
define ("DB_NAME", "forum");

define("SITE_TITLE", "Bienvenido al foro!");

//Paths
define('BASE_URI','https://'.$_SERVER['SERVER_NAME'].':10002/VulnerableForo/');
//rC
define("RC_STE_W",'AQUI-LA-KEY-WEB');
define("RC_SCR_K",'AQUI-LA-SECRET-KEY');
//perfiles
define("PRF_ADMIN",1);
define("PRF_USER",2);
define("PRF_VISIT",0);