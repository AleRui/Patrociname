<?php

require_once 'core/BaseModel.php';


class SearcherModel extends BaseModel
{

    private $table = "searcher";

    public function __construct()
    {
        parent::__construct($this->table);
    }

    //

    /**
     * @param $mail
     * @param $pass
     * @return |null
     */
    public function checkExitSearcher($mail, $pass)
    {
        $sql = "SELECT idSearcher, mailSearcher FROM $this->table WHERE mailSearcher = :mail AND passSearcher = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;
    }

    /**
     * @param $mail
     * @param $pass
     * @return |null
     */
    public function insertSearcher($mail, $pass)
    {
        $idAvailable = $this->minIdAvailable()->getMinId();
        //
        $sql = "
        INSERT INTO $this->table
        (idSearcher, mailSearcher, passSearcher)
        VALUES ( :id, :mail, MD5(:pass) )
        ";
        //
        $params = array(
            ':id' => $idAvailable,
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;
    }

    /**
     * @param $mail
     * @return |null
     */
    public function checkExistEmail($mail)
    {
        $sql = "SELECT mailSearcher FROM $this->table WHERE mailSearcher = :mail";
        $params = array(':mail' => $mail);
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;
    }


}