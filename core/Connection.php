<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 31/10/2018
 * Time: 12:12
 */

//define("JAWSDB_MARIA_URL", "mysql://jcpiprxx0fxmus3e:s1a8dbc3tix3utqy@gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/rxp1xzjdsgra374w");

class Connection // Singleton
{
    private static $instance = null;
    private static $connectionDB;

    /**
     * Connection constructor.
     */
    private function __construct() // Singleton private | protected
    {
        $this->connection_PDO();
    }

    /**
     * @return Connection|null
     */
    public static function getInstance() //Singleton Instancia public static
    {
        if (is_null(self::$instance)) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    /**
     * @return PDO | Error
     */
    public function connection_PDO() // Singleton public static
    {
        //$dataBaseConfig = require 'config/dB_hp.php';
        $dataBaseConfig = require 'config/db_ws.php';

        $driver = $dataBaseConfig["driver"];
        $host = $dataBaseConfig["host"];
        $port = $dataBaseConfig["port"];
        $user = $dataBaseConfig["user"];
        $pass = $dataBaseConfig["pass"];
        $database = $dataBaseConfig["database"];
        $charset = $dataBaseConfig['charset'];
        //
        try {
            self::$connectionDB = new PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset", $user, $pass
            );
            return self::$connectionDB;
        } catch (PDOException $error) {
            die(
                "**Error en la conexión: " . $error->getMessage()
            );
        }

    }

    /**
     * @throws null
     */
    public function __destruct() // Singleton private
    {
        Connection::$connectionDB = null;
    }

    /**
     * @throws Exception
     */
    public function __clone() // Singleton
    {
        throw new Exception('Feature disabled.');
    }

    /**
     * @throws Exception
     */
    public function __wakeup() //Singleton
    {
        throw new Exception('Feature disabled.');
    }

    /*public function static connection_PDO() { //Heroku
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
