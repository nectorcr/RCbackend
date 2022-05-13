<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"><a href="https://redcapital.cl" target="_blank"><img src="https://www.paymentmedia.com/gallery/59b6ecdbce3a4red_capita_dfgfgf_623.jpg" width="400"></a></p>

Proyecto desarrollado por [Nector Cortés R.](https://github.com/nector95/) para la solución de la prueba técnica [Red Capital CL](https://redcapital.cl).

## INTRODUCCIÓN

El propósito de la siguiente evaluación es validar el conocimiento específico y técnico
requerido para el cargo mencionado. Los conocimientos a evaluar son:    

- [Laravel 6+.](https://laravel.com).
- [PHP-UNIT.](https://www.php.net).
- [Eloquent.](https://laravel.com/docs/8.x/eloquent).
- [GIT.](https://github.com).
- [Docker | Docker-container.](https://www.docker.com).


## REQUERIMIENTOS

**1-** Crear un login de usuario, el cual permitirá identificar el usuario según su **ROL y PERMISOS**.


*Validaciones y/o reglas de negocio:*

  ● Utilizar buenas prácticas para mostrar errores ocurridos dentro del sistema.

  ● Se deberá crear un modelo que permita gestionar menú, sub-menú y vista para cualquier usuario del sistema, independiente de su rol, la cual mediante un middleware controlar el acceso de un usuario a la vista.

  ● Generar Seeders de carga inicial, con los menús y submenús

**2-** El usuario podrá subir documentos **PDF, XML, WORD, ETC.**, los cuales serán almacenados en Laravel, y que luego el usuario podrá revisar históricamente todos los archivos que están asociados a él y descargarlos.



*Validaciones y/o reglas de negocio:*

  ● Si un usuario administrador posee permisos para visitar esta vista, podrá revisar todo los archivos históricos.

  ● El usuario administrador podrá subir archivos y asociar a qué persona se creará el nuevo registro.

  ● Un usuario normal solo podrá ver sus archivos históricos.


## PLUS

  ● Utilizar algún cliente de git como Github, Gitlab o Bitbucket para visualizar el
proyecto.

  ● Crear un Readme para seguir los pasos para la ejecución de Seeders y migraciones.

  ● Crear imagen de Proyecto Laravel mediante un Dockerfile.

  ● Crear contenedor con el Proyecto Laravel y MySql 8.0.16 o superior a 8.

  ● Uso del Framework UI Bootstrap.

  ● Uso Eloquent o QueryBuilder.
  
## EJECUCIÓN DEL PROYECTO

Tener en cuenta los siguientes programas instalados:

    ● Composer.
    ● XAMPP.
    ● IDE.

Consideraciones dentro del proyecto para la ejecución de comandos necesarios, seeders y migraciones:

  ● Configurar el archivo ".env": dentro del directorio principal del proyecto, según el nombre de la base de datos que se utilice.
    
  ● En la terminal ejecutar los siguientes comandos paso a paso:
    
    - npm install
    - npm run dev
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed
    - php artisan migrate:fresh --sedd

  ● Para la ejecución del proyecto en la terminal utilice el siguiente comando: php artisan serve

## DOCUMENTACIÓN DE SEEDERS


Usuarios (email): 
    - admin.user@test.com (Encargado del manejo de usuarios y roles).
    - admin.file@test.com (Encargado del manejo de archivos).
    - user1@test.com (Cliente).
    - user2@test.com (Cliente).

Contraseña: capital1234 (para todos los usuarios indicados anteriormente).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
