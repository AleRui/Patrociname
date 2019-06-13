<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once 'core/Connection.php';

class BaseModel
{

    private $table;

    public function __construct($child_table)
    {
        $this->table = (string)$child_table;
    }


    public static function getConnection()
    {
        return Connection::getInstance();
    }


    public function executeQuery($sql, $params)
    {

        $query = $this::getConnection()->doQuery($sql, $params);

        return (is_object($query)) ? $this->getObject($query, $this->table) : null;

    }


    public function getObject($query)
    {

        return is_object($query) ? $obj = $query->fetchAll(PDO::FETCH_CLASS, $this->table) : null;

    }


    public function minIdAvailable()
    {
        $id = 'id' . $this->table;
        echo '$id: '.$id.'<br>';

        $sql = "
        SELECT
        CASE ( SELECT MIN($id) FROM $this->table )
            WHEN 1 THEN
                ( SELECT MIN(t1.$id) + 1
                      FROM $this->table t1
                      LEFT JOIN $this->table t2
                      ON t1.$id + 1 = t2.$id
                      WHERE t2.$id IS NULL )
            ELSE ( SELECT 1 )
        END AS minId;
        ";

        $params = array();

        return $this->executeQuery($sql, $params);
    }





}