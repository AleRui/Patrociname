<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 31/10/2018
 * Time: 12:12
 */

//define("JAWSDB_MARIA_URL", "mysql://ba6ioarno5fp2ax4:xl34w0m8l05ikuib@u615qyjzybll9lrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/nxn0xaecucxucceu");

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
        //$dataBaseConfig = require 'config/db_ws.php';
        $dataBaseConfig = require 'config/db_jawsdb.php';

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

    /*public function connection_PDO() // Heroku - JawsDB
    {
        //

        //$host = 'u615qyjzybll9lrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
        //$user = 'ba6ioarno5fp2ax4';
        //$pass = 'xl34w0m8l05ikuib';
        //$port = '3306';
        //$dbname = ltrim('nxn0xaecucxucceu', '/');

        $host = 'eu-cdbr-west-02.cleardb.net';
        $user = 'ba8c9ee6447c32';
        $pass = '9a0bc3d5';
        $port = '3306';
        $dbname = ltrim('heroku_85fd84de8efcc68', '/');

        try {
            self::$connectionDB = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass );
            self::$connectionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$connectionDB;
        } catch (PDOException $e) {
            die("**Error en la conexión: " . $e->getMessage());
        }

    }*/

}
