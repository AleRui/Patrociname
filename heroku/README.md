## Uso de Heroku

Linux (Comienzo con Linux y command line "CLI")

Debes tener creada una cuenta en Heroku

SE necesita:
* Snap (gestor de paquetes)
(https://docs.snapcraft.io/installing-snapd/6735)
Instalar en Debian y Ubuntu:
```
$ sudo apt install snapd
```
Instalar Fedora:
```
$ sudo dnf copr enable zyga/snapcore

$ sudo dnf install snapd
```
Instalar paquete en Arch Linux:
```
$ sudo pacman -S snapd
```
Instalalr gestor de paquetes Snapdm desde el repositorio: (Manjaro)
```
$ git clone https://aur.archlinux.org/snapd.git

$ cd snapd

$ makepkg -si
```
Este comando hace que Snapd empiece a escuchar, habilita el servicio
```
$ sudo systemctl enable --now snapd.socket
```
Aquí podemos ver la ruta de la instalación:
```
$ sudo ln -s /var/lib/snapd/snap/snap
```

* Instalar Composer:
(https://getcomposer.org/download/)
```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

$ php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

$ php composer-setup.php

$ php -r "unlink('composer-setup.php');"
```
Linux php
```
$ sudo apt-get update

$ sudo apt-get install curl php-cli php-mbstring git unzip

$ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```
Para comprobar la instalación de composer:
```
$ composer
```

Instalar Heroku
```
$ sudo snap install heroku --classic
```

Si ahora vamos a consola:
```
$ heroku login
```
Nos mandara a una web para hacer login

#### Windows:

- Debes tener creada una cuenta en Heroku
- Debes tener php instalado en windows
En consola:
```
php -v
```
- Debes tener instalado composer en windows
El instalador está en: https://getcomposer.org/doc/00-intro.md)
```
composer -v
```
Y tener instalado GIT:
```
git --version
```

- Bajar el instalador de Heroku:
https://devcenter.heroku.com/articles/getting-started-with-php#set-up

Si ahora vamos a la consola de Windows:
```
$ heroku login
```
Nos mandara a la web de heroku para hacer login

### Creando el proyecto Heroku

Instalar Heroku:(para usar con consola)

Crear el archivo composer.json
```
$ touch composer.json
```
Y poner tu proyecto en require:
```
{
    "require": {
        "tuProyecto/tuProyecto": "1.0.*"
    }
}
```
Instalar dependencias y actualizar(si son necesarias):
```
$ php composer.phar install

$ php composer.phar update
```

En nuestra raiz del proyecto inicioamos repositorio de git para poder subir los archivos
```
$ git ini
```
añadimos al repositorio los archivos:
```
$ git add .
$ git commit -m"Subida de mi proyecto"
```

Creamos el proyecto en Heroku:
```
$ heroku create
```
Se crea el proyecto heroku: "nombre_aleatorio_heroku"
con las direcciones:

https://nombre_aleatorio_heroku.herokuapp.com/

https://git.heroku.com/nombre_aleatorio_heroku.git

Ahora podemos hacer push de la rama maestra ya creada
```
$ git push heroku master
```
y se comenzará a cargar la aplicación que podremos ver en:
https://git.heroku.com/nombre_aleatorio_heroku.git

Si queremos visitar la web desde consola:
```
$ heroku open
```

### Añadiendo Base de Datos
Heroku te permite usar 3 bases de datos de manera gratuita:

Postgres | Redis | Kafka

Para otras bases de datos tendras que ir a los Add-ons, aquí encontraras más bases de datos pero tendrás que introducir una tarjeta bancaria para poder usarlos, aunque todos tienen programas free de poco espacio.

https://elements.heroku.com/addons/categories/data-stores)

Añadiendo la BD se recomienda tener instalado MySQL y su gestor de comandos por consola CLI

```
$ sudo apt-get install mysql-server mysql-common mysql-client
```
Comenzar mysql:

```
$ sudo systemctl start mysql
```

Para MariaDB (para otra ver Documentación en Add-Ons)

```
$ heroku addons:create jawsdb-maria:kitefin

```
Y se crea: jawsdb-maria-concentric-72216, (nombre creado)

Configurar base de datos:

```
$ heroku config:get JAWSDB_MARIA_URL
```

Da esta respuesta:
(mysql://username:password@hostname:port/default_schema)

```
mysql://nombre_de_usuario:password_de_usuario@direccion_hostname:puerto/nombre_basedatos
```

por lo que:
username: nombre_de_usuario
password: password_de_usuario
hotname: direccion_hostname
port: puerto (normalmente 3306)
default_schema: nombre_basedatos

OPTATIVO configurar backups

```
$ heroku addons create jawsdb-maria --bkpwindowstart 00:30 --bkpwindowend 01:00 --mntwindowstart Tue:23:30 --mntwindowend Wed:00:00
```

OPTATIVO Si queremos ver la configuracion de BD en local:

```
$ heroku config -s | grep JAWSDB_MARIA_URL >>.env

$ more .env)
```

#### Creación o Migración de la BD
Con los datos obtenidos podemos realizar una conexión ya a la BD creada en softwares como MySQL Workbench o Sequel Pro (MAC)

MIGRACION de la base de datos con MySQL por comandos
Debemos tener una copia "copia_bd.sql" de la base de datos (ir a la ruta de esa copia o tener en cuenta su ruta)

($ mysql -h NEWHOST -u NEWUSER -pNEWPASS NEWDATABASE < backup.sql)

("Importante password pegado a p")
NEWDATABASE: es el default_schema ("nombre_basedatos")

```
$ mysql -h direccion_hostname -u jcpiprxx0fxmus3e -ps1a8dbc3tix3utqy rxp1xzjdsgra374w < copia_bd.sql
```

Si queremos ver la base de dtos en nuestro navegador:

```
$ heroku addons:open jawsdb-maria
```

Ahora tenemos que realizar la conexión a la BD en nuestra aplicación:

depende como como tengamos conectada nuestra aplicaciónno rmalmente es en un archivo "database.php"
(https://devcenter.heroku.com/articles/jawsdb)

(Sin añdir la dependecia tb ha funcionado)
Añadimos la dependencia en composer.json

```
{
  "require": {
    "ext-mysql": "*"
  }
}
```

Para finalizar subimos todos los cambios con un commit
```
$ git add .

$ git commit -m"Adding DB"

$ git push heroku master
```

