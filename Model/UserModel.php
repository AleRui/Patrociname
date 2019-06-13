<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

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

        $query = $this::getConnection()->doQuery($sql, $params);
        
        return (is_object($query)) ? $this->getObject($query, $this->table) : null;
    }
}