# Directorio temporal que contiene los archivos de configuración del Docker
Esto es inseguro y será eliminado una vez finalice la entrega / evaluación de la práctica.

## Directorio "originales". Contiene los archivos de configuración antes de las modificaciones.
Contiene:
- default.template.conf -> Se elimina de este directorio.
- php.ini -> docker-nginx-php-mysql-master/php/php.ini

## Modificaciones. Fuera de la carpeta "originales".
Contiene:
- default.template.conf -> docker-nginx-php-mysql-master/nginx/default.template

### Reparaciones:
1. 'Cross-Domain Jscript source file inclusion'
 default.template.conf

2. '.httaccess information Leak'
 default.template.conf

3. 'X-Frame-Options Header No set'
 default.template.conf
