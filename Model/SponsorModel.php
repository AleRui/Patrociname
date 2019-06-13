<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once 'core/BaseModel.php';

class SponsorModel extends BaseModel
{

    private $table;

    public function __construct()
    {
        $this->table = "sponsor";
        parent::__construct($this->table);
    }


    public function checkExitSponsor($mail, $pass)
    {
        $sql = "SELECT idSponsor, mailSponsor FROM $this->table WHERE mailSponsor = :mail AND passSponsor = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );

        return $this->executeQuery($sql, $params);
    }


    public function checkExistEmail($mail)
    {
        $sql = "SELECT mailSponsor FROM $this->table WHERE mailSponsor = :mail";
        $params = array(':mail' => $mail);

        return $this->executeQuery($sql, $params);
    }


    public function insertSponsor($mail, $pass)
    {

        $idAvailable = ($this->minIdAvailable()[0])->getMinid();

        $sql = "INSERT INTO $this->table (idSponsor, mailSponsor, passSponsor)
        VALUES ( :id, :mail, MD5(:pass) )";

        $params = array(
            ':id' => $idAvailable,
            ':mail' => $mail,
            ':pass' => $pass
        );

        return $this->executeQuery($sql, $params);
    }

}