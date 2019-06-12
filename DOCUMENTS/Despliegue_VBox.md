------------------------------------
Crear RED VIRTUAL
virtualbox -> archivo ->prepferencias -> red
configurar red:
	- Nombre de la red: pfg
	- Red CIDR: 10.0.2.0/24
	- Soporta CHCP

Añadir máquinas a la red:
	- Seleccionar máquina -> botón derecho -> configuración
	- Red:
		- Conectado a: red NAT
		- Nombre pfg
	- Opcional: se suele tener que desabilitar USB
	- Cliente windows pedirá que se actualice driver procesador: Si.
	- Si no está instalado Guest Adition en Cliente, instalar (Resolución Pantalla)

Preferiblemente: Iniciar primero server y después cliente


------------------------------------
SERVER

login: usuario
password: usuario

para mayoría de tareas cambiar a modo root:
$ su
password: usuario

* Buscar gateway:
o $ ip route show -> 10.0.2.1

* Fijar dirección servidor:
$ nano/etc/network/interfaces
comentar linea con "#" -> #iface eth0 inet dhcp
iface eth0 inet static
address 10.0.2.251
netmask 255.255.255.0
broadcast 10.0.2.255
gateway 10.0.2.1

* reiniciar: $ shutdown -r now

* comprobar ip server: $ifconfig

--------------------------------------
CLIENTE
* Si se quiere tener consola en el escritorio:
Inicio -> Programas -> Accesorios -> Símbolo del siestema
Boton derecho -> Crear acceso directo

* Si quiero saber mi ip, en consola: ipconfig

* Comprobar conexion con server con ping en consola:
$ ping 10.0.2.251

* Fijas en conexion de red el DNS
Estado de Conexion de Área Local -> Propiedades-> Protocolo Internet (TCP/IP) -> Propiedades -> Servidor DNS preferido -> 10.0.2.251

--------------------------------------

* Putty:
Host Name: 10.0.2.50
Saved Sessions: Debian 8 - Server
Save
Seleccionar SERVER -> load -> open

--------------------------------------

* Acceder a WEBMIN:
(Navegador Cameleon puedes quitar privacy bar)
navegador: https://10.0.2.251:10000
aceptar excepción
- username: root
- password: usuario
Refresh Modules

--------------------------------------

* Bind9 DNS
Create master zone
- Domain name /Network: pfg
- Master server: debian8 (nombre del servidor)
- poner email! alejandroruizlopez0@gmail.com
Create
Apply Configguration

inf -> Address
- Name: alerui
- Address: 10.0.2.251
Create
Apply Configuration

vaciar cahé WinXP: $ ipconfig /flushdns
$ nslookup alerui.pfg

Alias: BIND DNS -> .pfg -> Alias Name
Name: www.alerui.pfg
Real Name: alerui.pfg

Alias: BIND DNS -> .pfg -> Alias Name
Name: patrociname.alerui.pfg
Real Name: alerui.pfg

Alias: BIND DNS -> .pfg -> Alias Name
Name: www.patrociname.alerui.pfg
Real Name: alerui.pfg

ping / nslookup alerui.pfg
ping / nslookup www.alerui.pfg
ping / nslookup patrociname.alerui.pfg

--------------------------------------

Instalar Git para control de versiones (Debian 8)

$ sudo apt-get update
$ sudo apt-get install git-core

Configurar Git con credenciales personales

Crear carpeta de repositorios:
$ mkdir /home/usuario/my_repositories

descargar repositorio en la carpeta de repositorios:
$ git clone git https://github.com/AleRui/Patrociname_V2.git

crear carpeta en el servidor Apache:
$ mkdir /var/www/html/patrociname

copiar repositorio:
$ cp -r /home/usuario/myrepositorio/Patrociname_V2/*
/var/www/html/patrociname

Agregar carpetas que no están en el repositorio:
config/
video/

Instalar node_modules (debe tener instalado npm)
$ sudo apt-get install nodejs
$ sudo apt-get install npm

ir a la carpeta web y realizar la inatalación de node_modules
$ npm install


--------------------------------------

Servidor ¿Permisos?

--------------------------------------

* Apache: Virtual Host (http 80)
webmin>APACHE Webserver>Create virtual host
- Port 80
- Document root: /var/www/html/patrociname
- server name: patrociname.alerui.pfg
- Create Now
- Apply Changes
- Refrescar Caché en el ordendor

- Port 80
- Document root: /var/www/html/patrociname
- server name: www.patrociname.alerui.pfg
- Create Now
- Apply Changes
- Refrescar Caché en el ordendor

--------------------------------------

* Caracters UTF-8
Webmin -> Others ->PHP Configuration -> Manage -> Other Settings
Default character set UTF-8

* Configurar Apache
Webmin -> Others -> PHP Configration -> Manage -> Resource Limits
- Maximum Memory Allocation: 32MB
- Maximum File Upload Size: 32MB
- Maximum HTTP POST size: 32MB

--------------------------------------

(* Webmin -> MySQL:
- user: root
- pass: rootmysql
-> user permission)

* phpMyAdmin:
(sino se esta seguro si esta en el puerto 80 o 443
ir a Apache Server -> )
- http://10.0.2.251/phpmyadmin
- https://10.0.2.251/phpmyadmin
- user: root
- pass: rootmysql
crear base de datos:
Base de Datos -> Crear base de datos -> Default Server, que será el 80 -> Aliases y comprobar)
- nombre base de datos: patrociname
- cotejamiento: utf8-general-ci

Importar base de datos
- seleccionar base de datos -> importar -> seleccionar archivo.sql -> importar

Crear usuario que use esa base de datos:
index de phpmyadmin -> Cuentas de usuario -> agregar cuenta de usuario
- nombre de usuario: patrociname
- nombre de host: %
- contraseña: patrociname

Dar permisos: patrociname
Cuentas de usuario -> Editar privilegios
Elegir pestaña Base de Datos
elegir especificos: patrociname
Seleccionar Datos y Estructura

--------------------------------------

Añadir usuario y contraseña en la configuración php
de la base de datos

--------------------------------------

HTTPS (Habilitar Modulo y configurar certificado digital)

** En servidor:
( Comprobar paquete de certificados:
$ dpkg --get-selections | grep ssl )

//Creo otro direccionamiento
//* Alias: BIND DNS -> .was -> Alias Name
//Name: www.wis2.daw
//Real Name: wis.daw

* Apache: Virtual Host
webmin>APACHE Webserver>Create virtual host
- Port 443
- Document root: /var/www/html/patrociname
- server name: patrociname.alerui.pfg
- Create Now
- Apply Changes
- Refrescar Caché en el ordendor

webmin>APACHE Webserver>Create virtual host
- Port 443
- Document root: /var/www/html/patrociname
- server name: www.patrociname.alerui.pfg
- Create Now
- Apply Changes
- Refrescar Caché en el ordendor

Habilitar en Webmin -> Apache Webservre | Pestaña Global configuration -> Configure Apache Module -> ssl
Enable Selected Modules

Si escribimos ahora: www.patrociname.alerui.pfg -> No funciona, faltan las claves

Hay que crear un certificado digital
** Servidor

Crear carpeta certificados:
$ mkdir my_certificates
Dentro crear certificados:
$ openssl genrsa -out certificados_wis2.key 1024
Ver certificado:
$ cat certificados_wis2.key

Solicitud de firma
$ openssl req -new -key certificados_wis2.key -out certificados_wis2.csr
Especificar Datos de nuestra web
- ES
- Malaga
- IES Campanillas
- CFGS-DAW
- patrociname
- www.alerui.pfg
- prueba@prueba.pru
- "challange password en blanco"
- "Nombre compañia en blanco"ls

Autofirma
$ openssl x509 -req -days 3650 -in certificados_wis2.csr -signkey certificados_wis2.key -out certificados_wis2.crt

Guardar en /etc/ssl/certs y en /etc/ssl/private
En private: cp /home/usuario/my_certificates/patrociname.key .
En certs: cp /home/usuario/my_certificates/patrociname.crt .


Webmin -> Apache Webservre | Existing virtual host -> Entrar en Virtual Server (pinch en globo tierra) -> aparece SSL Options (Hay dentro hay que introducir certificados)

Ir a webmin y actiavarlos:
Certificado/private key file: patrociname.crt
Private key file: patrociname.key

SAVE
Apply Changes

Refrescar la página (imagen guardia)

Poner enlace blanco a Servidor Virtual 443
En /etc/apache2/sites-enables
$ ln -s ../sites-available/default-ssl.conf 000-default-ssl.conf
Ahora tengo un servidor virtual que no tenia

--------------------------------------

Listado de directorios Mostrar listado de script o carpetas
En Apache, en una virtualhost
Si borramos: Per-Directory.Files (icono carpeta )-> se muesta el listado de directorios
Entrar -> Delete
Se puede vovler a crear
Entramos en Per-Diretorey
Directory-Indexing: opciones de indexacion
Document-options: por defecto Selected-below -> generar indice de directorio

En la primera entrada tenemos las opciones por defecto que sirven para todos los virtualhost que se crean
(hay muchas carpetas de icono...)
Document Options
Pero esta la carpeta Directory /var/www/
Directory index
Document Options: ahi esta marcada Generate directory indexes

Dentro del virtualhost en Directory Indexing podemos
Y especificar omitir archivos que si salen o no
en Files to ignore
Cambiar tmaaño de iconos
Generar tabla html

--------------------------------------

ACCESO Protegido

virtualhost
Per-Directory
Access Control
- Authentication realm name: "Sitio Restringido"
- Authentification type: Basic
- Only these users: usuario1 (que crearé)
- Clients must satissfy: Default
- Text file
- User text file : /etc/htpasswd/.htpasswd
SAVE
Apply Change
Recargamos web y pide usuario y contraseña

Crear usuario y contraseña
$ /etc/htpasswd
$ cd /etc/htpasswd
Comando htpasswd
$ htpasswd -c .htpasswd usuario1
Pide contraseña:usuario1
Repetir
mensaje: 'Adding password for user usuario1'

Aplicar cambios
Refrescar y probar
Loguearse

--------------------------------------

URL Amigables

Activar modulo de apache globla configuration
activar modlu rewrite 

virtualhost
Edit Directives
Cambiar:
- añadir: allowoverride all
- option none -> Option FollowSymLinks
SAVE
Apply Changes

crear en el sitio
el ficheo .htaccess

Crear el formato con patrones

RewriteEngine on

RewriteRule ^sumar/([0-9]+)/([0-9]+)/?$ sumar.php?id1=$1&id2=$2


--------------------------------------

FTP

Comprobar en webmin Servers: ProFTPD
comprobar= ftp.10.0.2.251/
usuario
usuario
va a la raiz del usuario del servidor

FileZilla versión 3.7.3

Config:
Servidor 10.0.2.50
user: usaurio
pass: usuario

--------------------------------------

Servidores virtuales y enjaulado

WebMin -> ProFTPD -> Default serve
Todo lo que haya en Global Configuration será para todos los servidores por defecto.

Crear virtual server -> No funcionan | No se distnitguen por DNS
Sino por puerto
Puerto por defecto: 21

Dirección: 10.0.2.50
Nombre del Swrvidor: Servidor Virtual
Puerto FTP 2121

Probar conectar

--------------------------------------

Enjaulado de usuario solo para su carpeta
en el Servidor por defecto

WebMin -> ProFTPD -> Default serve
Archivos y Directorios

Directorio de Chrood |
	- Limit users to directorioes Directory: Home Directory
	- Grupos de Unix: Todos
SAVE Apply Changes

Si crea una ruta concreta:

Solo a 1 usuario
Marcar directory
Y añadir ruta: /home/usuario/my_repositories

--------------------------------------
Usuario Virtual: profesor

Introducir usuario "profesor" que no es del sistema
que estén enjaulados y "chrooteados"
que pueda acceder a la carpeta /var/www.html/patrociname

**Servidor modificar:
$ nano /etc/proftpd/proftpd.
o por webmin:
ProFTPF Server -> Edit Config Files -> al final del archivo

AuthUserFile /etc/proftpd/ftpd.passwd
AuthGroupFile /etc/proftpd/ftpd.group

Guardar y aplicar cambios (lo cambios no se aplicaran porque no existen los archivos)

Crear usuario virtual | guardar contraseña

$ ftpasswd --passwd --name profesor --home /var/www/html/patrociname --shell /bin/false --uid 2019

toma el gid igual que el uid (identificador unico de los usuario)

pide password: profesor

crea ftpd.passwd

----------

Crear grupo: profesor

$ ftpasswd --group --gid 2019 --name profesor

----------

WebMin -> ProFTPD -> Default serve -> Authentication
Only allow login by users with valid shell: No

----------

Chrootear
WebMin -> ProFTPD -> Default serve -> Files and Directories
Limit users to directories |
	- Directory: Home directory
	- Unix groups: profesor


----------

Dar permisos al usuario virtual
$ chown -R 2019 /var/www/html/patrociname


----------------------------------------




















































 

