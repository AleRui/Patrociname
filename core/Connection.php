<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 31/10/2018
 * Time: 12:12
 */


class Connection // Singleton
{
    private static $instance = null;
    private static $connectionDB;

    /**
     * Connection constructor.
     */
    private function __construct() // Singleton private | protected
    {
        return self::connection_PDO();
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
    private function connection_PDO() // Singleton public static
    {
        $dataBaseConfig = require 'config/db_hp.php';
        //$dataBaseConfig = require 'config/db_ws.php';
        //$dataBaseConfig = require 'config/db_jawsdb.php';

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


    /**
     * @param $sql
     * @param array $params
     * @return bool|PDOStatement
     */
    public function doQuery($sql, $params = array())
    {
        //
        $prp = self::$connectionDB->prepare($sql);
        //
        $prp->execute($params);
        //
        return $prp;
    }

}
