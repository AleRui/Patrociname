<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 20:42
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
        //
        return $this->executeQuery($sql, $params);
    }


    public function checkExistEmail($mail)
    {
        $sql = "SELECT mailSponsor FROM $this->table WHERE mailSponsor = :mail";
        $params = array(':mail' => $mail);
        //
        return $this->executeQuery($sql, $params);
    }


    public function insertSponsor($mail, $pass)
    {
        showPretty( $this->minIdAvailable() );
        die();
        $idAvailable = $this->minIdAvailable()->getMinId();
        //
        echo '$idAvailable: '.$idAvailable.'<br>';
        die();
        //
        $sql = "INSERT INTO $this->table (idSponsor, mailSponsor, passSponsor)
        VALUES ( :id, :mail, MD5(:pass) )";
        //
        $params = array(
            ':id' => $idAvailable,
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        return $this->executeQuery($sql, $params);
    }


    /*public function checkExistEmail($mail)
    {
        $sql = "SELECT mailSponsor FROM $this->table WHERE mailSponsor = :mail";
        $params = array(':mail' => $mail);
        //
        return $this->executeQuery($sql, $params);
    }*/


    /*public function checkAvailableIDSponsor()
    {
        // SQL obtiene el minimo id disponible
        $sql = "
      SELECT MIN(t1.idSponsor) + 1 AS minIdSponsor
      FROM $this->table t1
      LEFT JOIN $this->table t2
      ON t1.idSponsor + 1 = t2.idSponsor
      WHERE t2.idSponsor IS NULL
    ";
        $connection = self::getConnection()->connection_PDO();
        $query = $connection->prepare($sql);
        $query->execute();
        $response = $query->fetch(PDO::FETCH_NUM);
        return $response;

    }*/

    //
    /*public function checkExitSponsor($mail, $pass)
    {
        //
        $sql = "SELECT * FROM $this->table WHERE mailSponsor = '$mail' AND passSponsor = MD5('$pass')";
        //
        $connection = self::getConnection()->connection_PDO();
        if (self::check_queryPDO($sql)) {
            $array_con_un_objeto = self::getObject($sql);
            //
            if (!empty($array_con_un_objeto[0]->idSponsor)) {
                return array('exist' => true, 'objResult' => $array_con_un_objeto);
            } else {
                return array('exist' => false);
            }
        } else {
            return false;
        }
    }*/

    /*public function getAllBundleLessBought($idSponsor)
    {
        //
        $sql = "SELECT * FROM sponsorbundle
                WHERE idSponsorBundle !=
                    ALL(SELECT idSponsorBundle
						FROM sponsorbuysponsoring
						WHERE idSponsor = :idSponsor
                    );
        ";
        $params = array(':idSponsor' => $idSponsor);
        //
        //
        return $this->executeQuery($sql, $params);
    }*/

    /*public function checkExistEmail($mail)
    {
        $sql = "
      SELECT mailSponsor
      FROM $this->table
      WHERE mailSponsor = ?
      ";
        $connection = self::getConnection()->connection_PDO();
        $query = $connection->prepare($sql);
        $query->execute([$mail]);
        $response = $query->fetch(PDO::FETCH_NUM);
        if (is_array($response) && count($response) > 0) {
            return true;
        } else {
            return false;
        }
    }*/

}