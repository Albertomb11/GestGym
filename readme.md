## Proyecto final de curso: GestGym

*Instalacion del proyecto*

* Una vez tengas clonado o descargado el proyecto, debes ejecutar "composer install" y "npm install".

* Tienes crearte una maquina virtual para utulizarla como servidor.
Una vez creada tienes que modificar el archivo "homestead.yaml" que esta dentro de la carpeta Homestead del directorio raiz.

* Añades las rutas:
    -  sites:
         - map: gestgym.test
         
           to: /home/vagrant/code/gestgym/public
           
    - databases:
        - gestgym
    
* Luego tienes que modificar el archivo host que esta en la ruta " /etc/hosts" y añadir esta linea "192.168.10.10 gestgym.test"


* Luego al descargarte o clonar el proyecto vendra un archivo .env.example que le tienes que cambiar el nombre a => .env
Y luego cambiar estos datos:

    - DB_HOST=192.168.10.10

    - DB_PORT=3306

    - DB_DATABASE=gestgym

    - DB_USERNAME=homestead

    - DB_PASSWORD=secret

* Luego tienes que ejecutar el comando "php artisan key:generate"

* Luego tienes que crearte un enlace blando en tu maquina virtual para poder subir archivos a la aplicación

* Tienes que crear la base de datos de la siguiente manera:
    -   En el IDE, a la derecha hay una pestaña que pone "database" -> "+" -> DataSource -> MySQL y poner los mismos datos que has cambiado antes en el archivo .env

* Y por ultimo ejecutas "php artisan migrate --seed" y ya tienes la aplicación funcionando.


