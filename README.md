# Proyecto Fin de Grado para el Ciclo de Grado formativo Susperior de Desarrollo de Aplicaciones Web

##### @author: Alejandro Ruiz López
##### @Curso: 2º DAW 2018/2019

# Patrociname
<br>
## https://patrociname.alerui.com/
<br>
Patrociname es una aplicación que pone en contacto a  _**"Buscadores"**_ ('Searchers'): personas, clubes, organizaciones... busquen patrocinadores, pudiendo definir la manera, precio, duración... en la que pueden gestionar una publicidad, con  _**"Sponsors"**_: entidades, empresas... que quieran patrocinarse y busquen con quien o donde hacerlo.
<br><br>
   
## Zonas de la Aplicación

### Index

<table>
	<tr>
		<td style="width: 48%;">
			<ul>En la zona de index podras:
				<li>- Registrarse como buscador</li>
				<li>- Registrarse como ponsor</li>
				<li>- Entrar mediante "login" a la zona de usuario usuario. </li>
				<li>- Entrar mediante "login" a la zona de sponsor.</li>
				<li>- Consultar mediante un Api los paquetes de patrocinio disponibles.</li>
				<li>- Entrar a una zona de administrador para ver estadíticas.</li>
			</ul>
			<ul>Para usar la aplicación sin registrarse hay creado los usuarios: 
				 <li>Buscador: prueba@prueba.com | Pass: 123</li>
				 <li>Sponsor: prueba@prueba.com | Pass: 123</li>
		</td>
		<td style="width: 48%;">
			<img src="screenshot/patrociname_01.png">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="screenshot/patrociname_02.png">
		</td>
	</tr>
</table>

---

### Zona de Buscador / Searcher

En esta zona el buscador podrá crear sus paquetes de patrocinio ("SposnsorBundles").
Para ello usará el formulario superior para crear el paquete.
Y en la zona de abajo podrár ver los paquetes creados, editarlos o borrarlos.

<table>
	<tr>
		<td style="width: 48%;">
			En esta zona el buscador podrá crear sus paquetes de patrocinio ("SposnsorBundles").
			Para ello usará el formulario superior para crear el paquete.
			Y en la zona de abajo podrár ver los paquetes creados, editarlos o borrarlos.

			<ul>Cada paquete consta de:
			<li>Texto sobre como va a ser la manera de publicitar.</li>
			<li>Coste de la publicidad.</li>
			<li>Periodo de tiempo por el que se genera la publicidad.</li>
			<li>La fecha en la que se creó.</li>

			Además arriba a la izquierda de la barra de header se habilitar un boton de "Logout" para salir de la zona de buscador y 				acabar la sesión.
		</td>
		<td style="width: 48%;">
			<img src="screenshot/patrociname_03.png">
		</td>
	</tr>
</table>

### Zona de Buscador / Searcher

En esta zona el buscador podrá crear sus paquetes de patrocinio ("SposnsorBundles").
Para ello usará el formulario superior para crear el paquete.
Y en la zona de abajo podrár ver los paquetes creados, editarlos o borrarlos.

Cada paquete consta de:
- Texto sobre como va a ser la manera de publicitar.
- Coste de la publicidad.
- Periodo de tiempo por el que se genera la publicidad.
- La fecha en la que se creó.

Además arriba a la izquierda de la barra de header se habilitar un boton de "Logout" para salir de la zona de buscador y acabar la sesión.


![Index](screenshot/patrociname_04.png)

### Zona de Sponsor
En la zona de Sponsor podemos realizar las siguientes acciones:
- Comprobar mediante una Api externa un CIF de Empresa.
La API es la de einforma: https://www.einforma.com/marketing/api-empresas
Si el CIF esta en su base de datos trerá la información de la empresa.

A continuación se mostraran los paquetes de patrocinio comprados.
Que incluyen la fecha de cuando fueron comprados.

En la zona inferior podrá usar un boton para buscar más paquetes.
Estos se mostrarán paginados con fecha de más reciente hasta el ultimo.

### Zona de Administrador

Para entrar a esta zona habra que introducir:
```html
https://patrociname.alerui.com/admin.php
```

![Index_2](screenshot/patrociname_03.png)

![Index_2](screenshot/patrociname_02.png)

## Resumen de Tecnologías Usadas:

* Sistemas Informáticos:
	- SO Desarrollo: Ubuntu LTS Desktop
	- Despligegue AWS:  Ubuntu 18.10 LTS
	- Despligue VirtualBox: Debian 8

* Entorno de Desarrollo:
	- IDE phpstorm
	- Editorde Texto: Sublime Text
	- Navegadores: Firefox y Chrome
	- Servidor páginas web: Apache 2
	- Servidor base de datos: MariaDB

* Desarrollo Web en Entorno Servidor:
	- Lenguaje servidor: PHP 7.2
	- Patrones usados: MVC, Singleton
	- conexión con Base de datos: PDO

* Desarrollo Web en Entorno Cliente:
	- Lenguaje de Marcas: HTML 5
	- Editor de estilos: CSS 3
	- Lenguaje cliente: Javascript
	- Framework cliente: JQuery
	- Conexiones con servidor: Ajax

* Base de Datos:
	- Base de datos relacional: MySQL
	- Gestor de base de datos: phpmyadmin y mysql-cli

* Diseño de interfaces:
	- Iconos: Font Awesome
	- Gráficas: Chart.JS
	- Imágenes vectoriales: SVG
	- Video web: mp4, ogg

