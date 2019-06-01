<?php

require_once 'core/BaseModel.php';


class SearcherModel extends BaseModel
{

    private $table = "searcher";

    public function __construct()
    {
        parent::__construct($this->table);
    }


    public function checkExitSearcher($mail, $pass)
    {
        $sql = "SELECT idSearcher, mailSearcher FROM $this->table WHERE mailSearcher = :mail AND passSearcher = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        return $this->executeQuery($sql, $params);
    }


    public function insertSearcher($mail, $pass)
    {
        //$idAvailable = $this->minIdAvailable()->getMinId();
        $idAvailable = ($this->minIdAvailable()[0])->getMinid();
        //showPretty($idAvailable);
        //die();
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
        return $this->executeQuery($sql, $params);
    }


    public function checkExistEmail($mail)
    {
        $sql = "SELECT mailSearcher FROM $this->table WHERE mailSearcher = :mail";
        $params = array(':mail' => $mail);
        //
        return $this->executeQuery($sql, $params);
    }


}