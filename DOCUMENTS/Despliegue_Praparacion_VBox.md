## Documentación
## Despligue de Aplicaciones Web

##### @author Alejandro Ruiz
##### @ Proyecto Fin de Grado de DAW 2018/2019

---

## Virtual Box Crear RED VIRTUAL

0 Virtualbox -> archivo ->prepferencias -> red

Configurar red:
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

(Preferiblemente: Iniciar primero server y después cliente)

---

## Configuración previa del SERVIDOR (Debian 8)

login: usuario
password: usuario

Para mayoría de tareas cambiar a modo root:

```bash
$ su
```
password: usuario

* Buscar gateway:
```bash
$ ip route show
```
Para esta red es el: 10.0.2.1

* Fijar IP del servidor:
```bash
$ nano/etc/network/interfaces
```
Comentar linea con "#" -> #iface eth0 inet dhcp
Añadir:
```bash
iface eth0 inet static
address 10.0.2.251
netmask 255.255.255.0
broadcast 10.0.2.255
gateway 10.0.2.1
```

* Reiniciar:
```bash
$ shutdown -r now
```

* Comprobar ip server:
```bash
$ ifconfig
```
---

## Configuración del CLIENTE (Windows XP)

* Si se quiere tener consola en el escritorio:
Inicio -> Programas -> Accesorios -> Símbolo del siestema
Boton derecho -> Crear acceso directo

* Si quiero saber mi ip, en consola:
```bash
$ ipconfig
```

* Comprobar conexion con server con ping en consola:
```bash
$ ping 10.0.2.251
```

* Fijar en conexion de red el DNS
Estado de Conexion de Área Local -> Propiedades-> Protocolo Internet (TCP/IP) -> Propiedades -> Servidor DNS preferido -> 10.0.2.251

---

* Cliente Putty para conexión con el servidor:
  - Host Name: 10.0.2.50
  - Saved Sessions: Debian 8 - Server
  - Save
  - Seleccionar SERVER -> load -> open

---

* Acceder a WEBMIN del servidor:
(Navegador Cameleon puedes quitar privacy bar)
- url navegador:
```bash
https://10.0.2.251:10000
```
(aceptar excepción)
- username: root
- password: usuario

**Importante** Refresh Modules

--------------------------------------

## Configuración DNS Bind9

* Create master zone
  - Domain name /Network: pfg
  - Master server: debian8 (nombre del servidor)
  - poner email! alejandroruizlopez0@gmail.com
Create
Apply Configguration

* Nueva reoslución DNS:
inf -> Address
  - Name: alerui
  - Address: 10.0.2.251
Create
Apply Configuration

* Comprobar nueva resolución DNS
Vaciar cahé WinXP: $ ipconfig /flushdns
```bash
$ nslookup alerui.pfg
```

* Creación de alias:
  - Alias: BIND DNS -> .pfg -> Alias Name
  - Name: www.alerui.pfg
  - Real Name: alerui.pfg

  - Alias: BIND DNS -> .pfg -> Alias Name
  - Name: patrociname.alerui.pfg
  - Real Name: alerui.pfg

  - Alias: BIND DNS -> .pfg -> Alias Name
  - Name: www.patrociname.alerui.pfg
  - Real Name: alerui.pfg

```bash
$ ping / nslookup alerui.pfg
```
```bash
$ ping / nslookup www.alerui.pfg
```
```bash
$ ping / nslookup patrociname.alerui.pfg
```

---

## Configuaración Apache: Virtual Host (http 80)

Webmin>APACHE Webserver>Create virtual host
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

---

* Caractéres UTF-8
Webmin -> Others ->PHP Configuration -> Manage -> Other Settings
- Default character set UTF-8

* Configurar Apache Limites
Webmin -> Others -> PHP Configration -> Manage -> Resource Limits
- Maximum Memory Allocation: 32MB
- Maximum File Upload Size: 32MB
- Maximum HTTP POST size: 32MB

---

## Base de Datos | Webmin -> MySQL:
- user: root
- pass: rootmysql
 Comprobar: user permission (Si fuese necesario)

* phpMyAdmin:
(sino se esta seguro si esta en el puerto 80 o 443 ir a Apache Server )
  - http://10.0.2.251/phpmyadmin
  - https://10.0.2.251/phpmyadmin
  - user: root
  - pass: rootmysql

* Creear base de datos:
Base de Datos -> Crear base de datos -> Default Server, que será el 80 -> Aliases y comprobar)
- nombre base de datos: patrociname
- cotejamiento: utf8-general-ci

* Importar base de datos:
- Seleccionar base de datos -> importar -> seleccionar dump archivo.sql -> importar

* Crear usuario que use esa base de datos:
index de phpmyadmin -> Cuentas de usuario -> agregar cuenta de usuario
  - nombre de usuario: patrociname
  - nombre de host: %
  - contraseña: patrociname

* Dar permisos al usuario: patrociname
  - Cuentas de usuario -> Editar privilegios
  - Elegir pestaña Base de Datos
  - elegir especificos: patrociname
  - Seleccionar Datos y Estructura

---

## Configurar HTTPS 443 (Habilitar Modulo y configurar certificado digital)

* En servidor:
( Comprobar paquete de certificados:
$ dpkg --get-selections | grep ssl )

* Crear los Virtual Host en Apache para 443
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

Habilitar en Webmin -> Apache Webserver | Pestaña Global configuration -> Configure Apache Module -> ssl
- Enable Selected Modules

Si escribimos ahora: www.patrociname.alerui.pfg -> No funciona, faltan las claves

#### Crear un certificado digital (En servidor)

* Crear carpeta certificados:
```bash
$ mkdir my_certificates
```
* Dentro de la carpeta crear certificados:
```bash
$ openssl genrsa -out patrociname.key 1024
```
* Ver certificado:
```bash
$ cat patrociname.key

* Solicitud de firma
```bash
$ openssl req -new -key patrociname.key -out patrociname.csr
```
- Especificar Datos de nuestra web
  - ES
  - Malaga
  - IES Campanillas
  - CFGS-DAW
  - patrociname
  - www.alerui.pfg
  - prueba@prueba.pru
  - "challange password en blanco"
  - "Nombre compañia en blanco"ls

* Autofirma
```bash
$ openssl x509 -req -days 3650 -in patrociname.csr -signkey patrociname.key -out patrociname.crt
```
* Guardar en /etc/ssl/certs y en /etc/ssl/private
  - En private: cp /home/usuario/my_certificates/patrociname.key .
  - En certs: cp /home/usuario/my_certificates/patrociname.crt .

* En Webmin cargar certificados:
Webmin -> Apache Webservre | Existing virtual host -> Entrar en Virtual Server (pinchar en globo tierra) -> aparece SSL Options (Hay dentro hay que introducir certificados)

  - Enable SSL: yes
  - Certificado/private key file: patrociname.crt
  - Private key file: patrociname.key

SAVE
Apply Changes

Refrescar la página (imagen guardia)

Poner enlace blando a Servidor Virtual 443
En /etc/apache2/sites-enables
$ ln -s ../sites-available/default-ssl.conf 000-default-ssl.conf

---

#### Trick Apache

Listado de directorios Mostrar listado de script o carpetas:
En Apache, en una virtualhost si borramos:
Per-Directory.Files (icono carpeta )-> se muesta el listado de directorios
Entrar -> Delete

* Se puede vovler a crear
  - Entramos en Per-Diretorey
  - Directory-Indexing: opciones de indexacion
Document-options: por defecto Selected-below -> generar indice de directorio

* En la primera entrada tenemos las opciones por defecto que sirven para todos los virtualhost que se crean
(hay muchas carpetas de icono...)
Document Options
Pero esta la carpeta Directory /var/www/
Directory index
Document Options: ahi esta marcada Generate directory indexes

* Dentro del virtualhost en Directory Indexing podemos
Y especificar omitir archivos que si salen o no
en Files to ignore
Cambiar tmaaño de iconos
Generar tabla html

---

### Proteger ACCESO

Virtualhost -> Per-Directory
Access Control
- Authentication real name: "Sitio Restringido"
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

---

### URL Amigables

Activar modulo de apache globla configuration
activar modlu rewrite 

En Virtualhost
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


---

## Configuración FTP

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

---

#### FTP Servidores virtuales y enjaulado

WebMin -> ProFTPD -> Default serve
Todo lo que haya en Global Configuration será para todos los servidores por defecto.

Crear virtual server -> No funcionan | No se distnitguen por DNS
Sino por puerto
Puerto por defecto: 21

Dirección: 10.0.2.50
Nombre del Swrvidor: Servidor Virtual
Puerto FTP 2121

Probar conectar

---

#### Enjaulado de usuario solo para su carpeta
En el Servidor por defecto

WebMin -> ProFTPD -> Default serve
Archivos y Directorios

Directorio de Chrood |
  - Limit users to directorioes Directory: Home Directory
  - Grupos de Unix: Todos
SAVE Apply Changes

Crea una ruta concreta:

Solo a 1 usuario
Marcar directory
Y añadir ruta: /home/usuario/my_repositories

---

#### Crear Usuario Virtual: profesor

Introducir usuario "profesor" que no es del sistema
que estén enjaulados y "chrooteados"
que pueda acceder a la carpeta /var/www.html/patrociname

* En servidor modificar: proftpd
```bash
$ nano /etc/proftpd/proftpd
```
o por webmin:
ProFTPF Server -> Edit Config Files -> al final del archivo ñadir

```bash
AuthUserFile /etc/proftpd/ftpd.passwd
AuthGroupFile /etc/proftpd/ftpd.group
```

Guardar y aplicar cambios (lo cambios no se aplicaran porque no existen los archivos)

* Crear usuario virtual | guardar contraseña

```bash
$ ftpasswd --passwd --name profesor --home /var/www/html/patrociname --shell /bin/false --uid 2019
```

- Toma el gid igual que el uid (identificador unico de los usuario)

- pide password: profesor

crea ftpd.passwd

* Crear grupo: profesor

```bash
$ ftpasswd --group --gid 2019 --name profesor
```

* WebMin -> ProFTPD -> Default serve -> Authentication
Only allow login by users with valid shell: No

* Chrootear
WebMin -> ProFTPD -> Default serve -> Files and Directories
Limit users to directories |
	- Directory: Home directory
	- Unix groups: profesor

Dar permisos al usuario virtual
```bash
$ chown -R 2019 /var/www/html/patrociname
```

---




















































 

