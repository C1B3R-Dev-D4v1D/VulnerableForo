# Foro Vulnerable PHP
CEC2020/21 - PPS-T4P3
David LV

## Vulnerabilidades Zap Corregidas:
1. 'Cross-Domain Jscript source file inclusion' - Corregida.
2. '.htaccess information Leak' - Corregida.
3. 'X-Frame-Options Header No Set' - Corregida.
4. 'X-Content-Type-Options Header Missing' - Corregida.
5. 'Cookie no HttpOnly Flag' - Corregida.
6. 'Cookie Without SameSite Attribute' - Corregida.
7. 'Server Leaks Information via "X-Powered-By" HTTP Response Header Field(s)' - Corregida.
8. 'XSS - Cross-Site Scripting' - Corregida.
9. 'SQL Injection - MySQL' - Corregida.
10. 'Se configura HTTPS/SSL' - Hecho.
11. 'Incomplete or No Cache-control and Pragma HTTP Header Set' - Corregida.
12. 'Absense of Anti-CSRF Tokens' - Corregida.
13. 'HTTP Strict Transport Secure' - Añadimos cabecera de seguridad recomendada.
14. 'Path Traversal' - Corregida. (sonarcloud) - Corregida.
15. 'SQL Injection - Authentication Bypass' - Corregida.
16. 'Open Redirect / A5 - Broken Access' (Sonarcloud) - Corregida.
17. 'Cross-Site Scripting (XSS) / A7 Cross-Site Scripting' reflected (XSS) / Hotspot XSS - (Sonarcloud) - Corregida.
18. 'Hotspot: Insecure Configuration' - (Sonarcloud) - Corregida.
19. 'Topics de un usuario no funciona' - Corregido / Funcionalidad Completada.
20. 'Topics no muestra Nº Total de Usuarios en (Estadisticas del Foro)' - Corregido.

***

Es recomendable utilizar el proyecto de NGINX/PHP/MySQL de nanoninja disponible en https://github.com/nanoninja/docker-nginx-php-mysql. 

* Crea una base de datos llamada "forum" por medio de phpMyAdmin. Para ello debes utilizar el usuario root y posteriormente dar privilegios sobre el uso de la tabla a otro usuario llamado dev.

* Ejecuta las sentencias SQL contenidas en el fichero DatabaseSentences.sql que se encuentra en la carpeta raiz del proyecto.
* Copia el contenido de Vulnerable Forum a una carpeta llamada foro dentro de tu servidor web. Ej. http://nombredeservidor/foro
 

