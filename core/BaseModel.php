<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 18:53
 */

require_once 'core/Connection.php';

class BaseModel
{

    private $table;

    public function __construct($child_table)
    {
        $this->table = (string)$child_table;
    }

    /**
     * @return Error|PDO
     */
    public static function getConnection()
    {
        return Connection::getInstance()->connection_PDO();
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|PDOStatement
     */
    public function doQuery($sql, $params = array())
    {
        $prp = self::getConnection()->prepare($sql);
        $prp->execute($params);
        return $prp;
    }

    /**
     * @param $query
     * @return null
     */
    public function getObject($query)
    {
        return is_object($query) ? $obj = $query->fetchAll(PDO::FETCH_CLASS, $this->table) : null;
    }

    public function mostrarTabla()
    {
        return $this->table;
    }


}