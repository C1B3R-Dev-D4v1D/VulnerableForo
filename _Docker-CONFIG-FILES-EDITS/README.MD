# Directorio temporal que contiene los archivos de configuración del Docker
Esto es inseguro y será eliminado una vez finalice la entrega / evaluación de la práctica.

## Directorio "originales". Contiene los archivos de configuración antes de las modificaciones.
Contiene:
- Los 2 archivos ya han sido modificados.

## Modificaciones. Fuera de la carpeta "originales".
Contiene:
- default.template.conf -> docker-nginx-php-mysql-master/nginx/default.template
- php.ini -> docker-nginx-php-mysql-master/php/php.ini

### Reparaciones:
1. 'Cross-Domain Jscript source file inclusion'
 default.template.conf

2. '.httaccess information Leak'
 default.template.conf

3. 'X-Frame-Options Header No set'
 default.template.conf

4. 'X-Content-Type-Options Header Missing'
 default.template.conf

5. 'Server Leaks Information via "X-Powered-By" HTTP Response Header Field(s)'
 php.ini

6. 'XSS - Cross-Site Scripting'
 default.template.conf

7. Se configura 'SSL / HTTPS'. Pero Aparece nueva vulnerabilidad "Incomplete or No Cache-control and Pragma HTTP Header Set"
 default.template.conf
 config/config.php

 8. Se repara la nueva Vulnerabilidad "Incomplete or No Cache-control and Pragma HTTP Header Set"
 default.template.conf

 9. Se añade cabecera de seguridad recomendada "HTTP Strict Transport Secure"
 default.template.conf

 10. Se añade mitigación de "Path Traversal".
 default.template.conf

 11. Se añade "session.cookie_httponly" para corregir "Hotspot: Cross-Site Scripting (XSS)" (Sonarcloud).
  ../etc/php/php.ini

 12. Se añade "session.cookie_secure" para corregir "Hotspot: Insecure Configuration" (Sonarcloud).
  ../etc/php/php.ini

 13. Se añade 'Referrer-Policy' y 'Content-Security-Policy'.
 default.tempale.conf