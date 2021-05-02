<?php

//Helper Functions for Formatting

//URL FORMAT
function urlFormat($str){
    //Strip out all whitespaces
    $str = preg_replace('/\s*/','', $str);
    //Convert the string to lowercase
    $str = strtolower($str);
    //URL Encode
    $str = urlencode ($str);
    return $str;
}

//limpiar Datos
  function limpiar_Datos($midata) {
    $midata = trim($midata); //eliminar espacios en blanco a ambos lados.
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
        '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
    );
    $midata = preg_replace($search, '', $midata);
    $midata = stripslashes($midata);//elimina barras invertidas.
    $midata = htmlspecialchars($midata);//convierte algunos caracteres predefinidos en entidades HTML
    return $midata;
  } 

//Format date
function formatDate($date) {
    $date = date("F j, Y, g:i a",strtotime($date));
    return $date;
}

//Add classname active if the category is active
function is_active($category){
    if(isset($_GET['category'])){
        if($_GET['category'] == $category){
            return 'active';
        } else {
            return '';
        }
    } else {
        if($category == null){
        return 'active';
        }
    }
}

?>