# Foro Vulnerable PHP
CEC2020/21 - PPS-T4P3
David LV

## Vulnerabilidades Corregidas:
1. 'Cross-Domain Jscript source file inclusion' - Corregida.
2. '.htaccess information Leak' - Corregida.
3. 'X-Frame-Options Header No Set' - Corregida.

***

Es recomendable utilizar el proyecto de NGINX/PHP/MySQL de nanoninja disponible en https://github.com/nanoninja/docker-nginx-php-mysql. 

* Crea una base de datos llamada "forum" por medio de phpMyAdmin. Para ello debes utilizar el usuario root y posteriormente dar privilegios sobre el uso de la tabla a otro usuario llamado dev.

* Ejecuta las sentencias SQL contenidas en el fichero DatabaseSentences.sql que se encuentra en la carpeta raiz del proyecto.
* Copia el contenido de Vulnerable Forum a una carpeta llamada foro dentro de tu servidor web. Ej. http://nombredeservidor/foro
 

