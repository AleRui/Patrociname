<?php

require_once 'core/BaseModel.php';
require_once 'SponsorBundle.php';

class SponsorBundleModel extends BaseModel
{

    private $table;

    public function __construct()
    {
        $this->table = "sponsorbundle";
        parent::__construct($this->table);
    }

    //
    public function getAllSponsorBundleById($idSearcher)
    {
        $sql = "SELECT * FROM $this->table WHERE idSearcher = :id";
        $params = array(':id' => $idSearcher);
        //
        $query = $this->doQuery($sql, $params);
        //
        return ( is_object($query) ) ? $this->getObject($query) : null ;
    }

    //
    /*public function checkExistSponsorWay($idSearcher, $sponsorWay, $sponsoringCost)
    {
        //
        $sql = "
SELECT *
FROM $this->table
WHERE idSearcher = $idSearcher
AND sponsorWay = '$sponsorWay'
AND sponsoringCost = '$sponsoringCost'
    ";
        //
        return self::check_queryPDO($sql);
    }

    public function checkAvailableIDSponsorBundle()
    {
        // SQL que obtiene el mínimo id disponible
        $sql = "
      SELECT MIN(t1.idSponsorBundle) + 1 AS minIdSponsorBundle
      FROM $this->table t1
      LEFT JOIN $this->table t2
      ON t1.idSponsorBundle + 1 = t2.idSponsorBundle
      WHERE t2.idSponsorBundle IS NULL
            ";
        if (self::check_queryPDO($sql)) {
            $array_con_un_objeto = self::getObject($sql);
            //
            if (!empty($array_con_un_objeto[0]->minIdSponsorBundle)) {
                $minIdAvailable = $array_con_un_objeto[0]->minIdSponsorBundle;
                return $minIdAvailable;
            } else {
                return array('exist' => false);
            }
        } else {
            return false;
        }
    }

    public function insertSponsorWay($idSponsorBundle, $idSearcher, $sponsorWay, $sponsoringCost)
    {
        $sql = "
      INSERT INTO $this->table
      (idSponsorBundle, idSearcher, sponsorWay, sponsoringCost)
      VALUES ( ?, ?, ?, ?)
    ";
        $connection = self::getConnection()->connection_PDO();
        $insert = $connection->prepare($sql);
        $checkInsert = $insert->execute([
            $idSponsorBundle,
            $idSearcher,
            $sponsorWay,
            $sponsoringCost,
        ]);
        return $checkInsert;
    }

    public function updateSponsorWay($idSponsorBundle, $idSearcher, $sponsorWay, $sponsoringCost)
    {
        $sql = "
    UPDATE $this->table
    SET sponsorWay = ?,
        sponsoringCost = ?
    WHERE idSponsorBundle = ?
    AND idSearcher = ?
    ";
        //echo $sql . '<br>';
        $connection = self::getConnection()->connection_PDO();
        $update = $connection->prepare($sql);
        $checkUpdate = $update->execute([
            $sponsorWay,
            $sponsoringCost,
            $idSponsorBundle,
            $idSearcher,
        ]);
        return $checkUpdate;
    }

    public function updateSponsorWay_two($idSponsorBundle, $idSearcher, $sponsorWay, $sponsoringCost)
    {
        $sql = "
    UPDATE $this->table
    SET sponsorWay = ?,
        sponsoringCost = ?
    WHERE idSponsorBundle = ?
    AND idSearcher = ?
    ";
        //
        $params = array($idSponsorBundle, $idSearcher, $sponsorWay, $sponsoringCost);
        //
        return self::doQuery($sql, $params);
    }

    public function deleteSponsorWay($idSponsorBundle, $idSearcher)
    {
        $sql = "
    DELETE FROM $this->table
    WHERE idSponsorBundle = $idSponsorBundle
    AND idSearcher = $idSearcher
  ";
        $connection = self::getConnection()->connection_PDO();
        $query = $connection->prepare($sql);
        $query->execute();
        return true;
    }*/

}