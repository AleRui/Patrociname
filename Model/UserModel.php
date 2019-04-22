<?php

require_once 'core/BaseModel.php';

class UserModel
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
        /*$sql = "SELECT idUsr, emaUsr, rolUsr FROM $this->table WHERE mailSearcher = :mail AND passSearcher = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;*/
    }
}