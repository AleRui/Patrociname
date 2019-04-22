<?php

require_once 'core/BaseModel.php';

class UserModel extends BaseModel
{
    private $table = "user";

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function checkExitUser($mail, $pass)
    {
        //
        echo $mail.'<br>';
        echo $pass.'<br>';
        //
        //$sql = "SELECT idUsr, emaUsr, rolUsr FROM $this->table WHERE mailSearcher = :mail AND passSearcher = MD5(:pass)";
        //$sql = "SELECT idUsr, emaUsr, rolUsr FROM $this->table WHERE emaUsr = :mail AND pswUsr = MD5(:pass)";
        $sql = "
            SELECT u.idUsr, u.emaUsr, r.namRol FROM user u
            LEFT JOIN rols r
            ON r.idRol = u.rolUsr
            WHERE u.emaUsr = :mail
            AND u.pswUsr = MD5(:pass)
            ";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;
    }
}