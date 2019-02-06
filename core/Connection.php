<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 31/10/2018
 * Time: 12:12
 */

//define("JAWSDB_MARIA_URL", "mysql://jcpiprxx0fxmus3e:s1a8dbc3tix3utqy@gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/rxp1xzjdsgra374w");

class Connection {
  //
  private static $instance = null;
  private static $connectionDB;
  //
  private function __construct() {//Singleton
    $this->connection_PDO();
  }

  //
  public function __destroy() {
    Connection::$connectionDB->close();
  }

  //
  private function __clone() {//Singleton
  } //Singleton: necesario que no se pueda clonar

  //
  public function __wakeup() {//Singleton
    $this->connection_PDO();
  }

  //
  public static function getInstance() {//Singleton Instancia
    if (is_null(self::$instance)) {
      self::$instance = new Connection();
    }
    return self::$instance;
  }

  //
  public function connection_PDO() {
    $dataBaseConfig = require 'config/database_laptop.php';
    //
    $host = $dataBaseConfig["host"];
    $user = $dataBaseConfig["user"];
    $pass = $dataBaseConfig["pass"];
    $database = $dataBaseConfig["database"];
    //
    try {
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8");
      self::$connectionDB = new PDO(
        "mysql:host=" . $host . "; dbname=" . $database, $user, $pass, $options
      );
      return self::$connectionDB;
    } catch (PDOException $error) {
      die(
        "**Error en la conexión: " . $error->getMessage()
      );
    }

  }

  /*public function connection_PDO() { //Heroku
    //
    $hostname = 'gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $username = 'jcpiprxx0fxmus3e';
    $password = 's1a8dbc3tix3utqy';
    $database = ltrim('rxp1xzjdsgra374w', '/');
    //
    try {
      self::$connectionDB = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      self::$connectionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return self::$connectionDB;
    } catch (PDOException $e) {
      die("**Error en la conexión: " . $e->getMessage());
    }

  }*/

}
