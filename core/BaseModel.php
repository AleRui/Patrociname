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
        return Connection::getInstance();
    }


    /**
     * @param $query
     * @return null
     */
    public function getObject($query)
    {
        echo $this->table.'<br>';
        return is_object($query) ? $obj = $query->fetchAll(PDO::FETCH_CLASS, $this->table) : null;
    }

    /**
     * @return mixed
     */
    public function minIdAvailable()
    {
        $id = 'id' . $this->table;
        //
        $sql = "SELECT MIN(t1.$id) + 1 AS minId
          FROM $this->table t1
          LEFT JOIN $this->table t2
          ON t1.$id + 1 = t2.$id
          WHERE t2.$id IS NULL
                ";
        //
        $query = $this::getConnection()->doQuery($sql);
        //
        return $this->getObject($query)[0];
    }


}