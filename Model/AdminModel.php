<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once 'core/BaseModel.php';

class AdminModel extends BaseModel
{
    private $table = "admin";

    public function __construct()
    {
        parent::__construct($this->table);
    }


    public function checkExitAdmin($mail, $pass)
    {

        $sql = "SELECT idAdmin, mailAdmin FROM $this->table WHERE mailAdmin = :mail AND passAdmin = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );

        return $this->executeQuery($sql, $params);
    }


    public function insertAdmin($mail, $pass)
    {

        $idAvailable = ($this->minIdAvailable()[0])->getMinid();
        //
        $sql = "
        INSERT INTO $this->table
        (idAdmin, mailAdmin, passAdmin)
        VALUES ( :id, :mail, MD5(:pass) )
        ";

        $params = array(
            ':id' => $idAvailable,
            ':mail' => $mail,
            ':pass' => $pass
        );

        return $this->executeQuery($sql, $params);
    }


    public function checkExistEmail($mail)
    {
        $sql = "SELECT mailAdmin FROM $this->table WHERE mailAdmin = :mail";
        $params = array(':mail' => $mail);

        return $this->executeQuery($sql, $params);
    }

}