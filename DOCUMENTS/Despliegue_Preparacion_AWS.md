## Documentación
## Despligue de Aplicaciones Web

##### @author Alejandro Ruiz
##### @ Proyecto Fin de Grado de DAW 2018/2019

# Desarrollo de una VPC con los sevidos de Amazon Web Services (AWS)

0. Crear cuenta Free, entrar al Dashboard de AWS y elegir la zona: Irlanda (EU-Irlanda)

1. Crear VPC:
* Services → Networking & Content Delivery → VPC
* Your VPCs → Create VPC
	* Name tag: aleruiz
	* IPv4 CIDR block\*: 10.0.0.0/16
	* IPv6 CIDR block: No
	* IPv6 CIDR Block
	* Tenancy: Default
* Seleccionar vpc y aplicar estos cambios:
	* Edit DNS resolution: enable (check)
	* Edit DNS hostsnames: enable (check)

---

2. Crear Subnets:
* Subnets → Create Subnet
	* Name tag: nombre subnet
	* VPC: vpc a la que pertence
	* Availability Zone: zona
	* IPv4 CIDR block* : bloque elegido
* Cambiar asignación de ips: (Creará la instancia con un IP Pública)
	* Selecionar Subnet → Actions → Modify auto-assign IP settings
	* Marca Auto-assign IPv4
	* Se crean las siguientes subnets:

| Name Tag      | VPC                            | Availability Zone  | IPv4 CIDR block  |
| ------------- |:------------------------------:| :-----------------:|-----------------:|
| projects      | vpc-0d170c57061cb6885_aleruiz  | eu-west-1c         | 10.0.37.0/24     |

---

3. Crear Tablas de Rutas
* Route Table → Create Route Table
	* Name Tag: nombre tabla de rutas
	* VPC: elegir la VPC
* Se crean las siguientes tablas:

| Name Tag             | VPC                            |
| -------------------- |:------------------------------:|
| routeTable_projects  | vpc-0d170c57061cb6885_aleruiz  |

---

4. Asignar Tabla de Rutas de Subnets:
* Route Table → Seleccinar Route Table
	* Subnet Associations → Edit subnet associations
	* Seleccionar subnet
	* Se asociarán las siguiente subnets:

| route table          | Subnets Associations           | IPv4 CIDR block  |
| -------------------- |:------------------------------:| ----------------:|
| routeTable_projects  | vpc-0d170c57061cb6885_aleruiz  | 10.0.37.0/24     |

---

5. Crear Internet Gateways (IG):
* Internet Gateways → Create internet gateway
	* Name tag: nombre Internet Gateway
	* Select IG → Attach to VPC → Seleccionar VPC

---

6. Añadir IG a Tablas de Rutas: (dota de Internet a las tablas)
* Route Tables → Seleccionar tabla
* Routes → Edit Route → Add route:

| Destination  | target       | status  | Propagated  |
| ------------ |:------------:| :------:|------------:|
| 0.0.0.0/0    | igw-aleruiz  | active  | No          |

---

7. Crear Security Groups:
* Security Groups → Create security group
	* Security Group name: nombre de grupo de segurdad
	* Description: Descripción del grupo de seguridad.
	* VPC: fc-vpc
* Crear reglas:
	* Seleccionar grupo de seguridad → Inbound Rules → Edit Rules
* Se crearán los siguientes grupos de seguridad:

| Name         | Inbound Ruel                        |
| ------------ |:-----------------------------------:|
| Patrociname  | HTTP: 80 \| HTTPS \| 443 \| SSH 22  |

---

8. Crear Key-Pairs:
* Services → EC2 → Key-Pairs
	* Create Key Pair
		* Name
		* Descargar pem en local
	* Se crearán los siguientes key-pairs: key-master-aleruiz

---

9. Crear instancias:
* Services → EC2 → Launch Instance
	* Seleccionar OS
	* Seleccionar tipo de instancias
	* Seleccionar VPC: fc-vpc
	* Seleccionar subnet destino
	* Seleccionar EBS (Capacidad discos)
	* Add Tags: Name, Type
	* Añadir Security Group
	* Revisar◦Crear con Key-Pair

| name         | OS             | type      | VPC      | Subnet    | EBS   | Add Tags           | SG           | Key-Pairs           |
| -----------  |:--------------:|:---------:|:--------:|:---------:|:-----:|:------------------:|:------------:|--------------------:|
| Patrociname  | Ubuntu 18 LTS  | T2 micro  | aleruiz  | projects  | 8 GB  | Name: Patrociname  | Patrociname  | key-master-aleruiz  |

---

10. Crear IP Elásctica:
* EC2 → Elastic IPs
	* Seleccionar Amazon pool → Se creará la IP Elástica
	* Seleccionar IP Elástica → Actions → Associate Address
		* Resource Type: Instance
		* Instance: Elegir la instancia
		* Private IP: Elegir la private IP
		* Pulsar Associate (Si esta ip estaba asociada a otra instanca la dejará para irse a la nueva).

---

11. Asociar Dominio a IP Elastica:
* Services → Route 53
	* Create Hosted Zone y configurar la dns
	* Gestionar o Añadir Records dependiendo de dominio, subdominio...

# Instalación y Configuración para Ubuntu 18 LTS de Apache2 MySQL Php y phpMyAdmin:

---

1. Instalación de Apache:
* Instalación:
	```Bash
	$ sudo apt update
	$ sudo apt install apache2
	```
* Configurar cortafuegos ufw (si fuese necesario)
* Comprobar que el motor esta funcionando:
	```Bash
	$ sudo systemctl status apache2
	```
* Comprobar el servicio de páginas: Usando la IP de la instancia
	```
	http://my_ip_or_url
	```
Si todo está correcto se podrá la página de inicion de Apache

---

2. Instalación de MySQL:
* Instalación:
	```Bash
	$ sudo apt install mysql-server
	```
* Comprobar la instalación
	```Bash
	$ sudo apt install mysql-server
	```
* Realizar el setud de seguridad si se desea aumentarla
	```Bash
	$ sudo mysql_secure_installation
	```
* **Importante** Cambiar método de autenticación del usuario root de MySQL:
	* Entrar a mysql
	```Bash
	$ sudo mysql
	```
	* Buscar usuarios:
	```Bash
	SELECT user,authentication_string,plugin,host FROM mysql.user;
	```
	* Modificar usuario:
	```Bash
	ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
	```
	* Refrescar provolegios:
	```Bash
	FLUSH PRIVILEGES;
	```
	* Comprbar los cambios en el usuario root:
	```Bash
	SELECT user,authentication_string,plugin,host FROM mysql.user;
	```
	* Si todo ha ido bien salir
	```Bash
	exit
	```
---

3. Instalar PHP
* Instalar php:
	```Bash
	$ sudo apt install php libapache2-mod-php php-mysql
	```
* Cambiar prioridad de lectura de tipos de archivos en Apache:
	```Bash
	$ sudo nano /etc/apache2/mods-enabled/dir.conf
	```
	**/etc/apache2/mods-enabled/dir.conf**
	```Bash
	<IfModule mod_dir.c>
		DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
	</IfModule>
	```
---

4. Instalar phpMyAdmin
	Permitir repositorio
	```Bash
	$ sudo add-apt-repository universe
	```
	Actualizar
	```Bash
	$ sudo apt update
	```
	Permitir repositorio
	```Bash
	$ sudo apt install phpmyadmin php-mbstring php-gettext
	```
	Realziar la fase de configuración:
	**Importante** primero Seleccionar (*) Apache2 luego Ok |  Ok | Yes | Password | Password
	
	Habilitar extensión de php mbstring
	```bash
	$ sudo phpenmod mbstring
	```
	Reiniciar servidor
	```bash
	$ sudo systemctl restart apache2
	```
	Crear un usuario dedicado para phpmyadmin
	Entrar a MySQL por CLI
	```bash
$ 	$ mysql -u root -p
	```
	Crear usuario
	```bash
$ 	$ CREATE USER 'phpmyadminuser'@'localhost' IDENTIFIED BY 'password';
	```
	Cambiar privilegios de usuario
	```bash
$ 	$ GRANT ALL PRIVILEGES ON *.* TO 'phpmyadminuser'@'localhost' WITH GRANT OPTION;
	```
	```bash
$ 	exit
	```



