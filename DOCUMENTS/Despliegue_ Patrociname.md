## Documentación
## Despligue de Aplicaciones Web

##### @author Alejandro Ruiz
##### @ Proyecto Fin de Grado de DAW 2018/2019

# Despliegue de la aplicación Patrociname:

0 Necesario para el desplgiegue:
	* Motor de Páginas Web: Apache2
	* Motor de Base de Datos: MySQL
	* Software de control de versiones: GitHub
	* Instalador de paquetes javascript: node + npm

1 Realizar copia del repositorio:
```bash
$ git clone https://github.com/AleRui/Patrociname.git
```

2 Configurar la base de datos
	*  Crear base de datos:
		- Nombre: patrociname
		- Codifcicación: Utf8-general-ci
	* Ir a la base de datos e importar el aqchivo el útlimo dump sql creado:  	dump_patrociname_20160607.sql

3 Para que funcione la conexión a la base de datos hay crear carpeta en la raiz del proyecto una carpeta config/ y dentro un fichero de configuración llamado: db_ws.php (Se puede crear con otro nombre, pero habría que llamarlo correctamente en el método connection_PDO(), del archivo /core/Connection.php).
	* Crear carpeta:
	```bash
	$ mkdir config/
	```
	* Crear archivo db_ws.php
	```bash
	$ nano db_ws.php
	```
	* Configuración del archivo:
	```bash
	return array(
	    "driver"    =>"mysql",
	    "host"      =>"localhost",
	    "port"      =>"3306",
	    "user"      =>"usuario",
	    "pass"      =>"contraseña",
	    "database"  =>"patrociname",
	    "charset"   =>"utf8"
	);
```

4 Por cuestión de peso el video de background del proyecto no se ha subido al repositorio, si se quiere insertar un video con formato: mpg, ogg, web... Debe crearse en web la carpeta video/ e insertar los archivos llamandolos video.mp4, video.ogg, video.web...

5 Para que funcionen los gráficos del administrador hay que realizar la instalación de paquetes de ChartJS de Javascript, con el gestor de paquetes NPM.
	- Ir a la carpeta web/
	- Instalar Chart.JS
	```bash
	$ npm install
	```
