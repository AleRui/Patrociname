<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 22/11/2018
 * Time: 9:30
 */

require_once 'core/BaseModel.php';

class sponsorBuySponsoringModel extends BaseModel
{
    private $table;

    public function __construct()
    {
        $this->table = "sponsorbuysponsoring";
        parent::__construct($this->table);
    }

    public function buySponsoring($idSponsorBundle, $idSponsor)
    {
        echo 'idSponsorBundle: ' . $idSponsorBundle . '<br>';
        echo 'Sponsor: ' . $idSponsor . '<br>';
        //
        // Date
        $buyDateSponsorBundle = date('Y-m-d H:i:s');
        //echo 'Fecha de creación: '.$buyDateSponsorBundle.'<br>';
        //
        $sql = "INSERT INTO $this->table (idSponsorBundle, idSponsor, buyDateSponsorBundle) 
                VALUES ( :idSponsorBundle, :idSponsor, :dateBuySponsorBundle)";
        //
        $params = array(
            ':idSponsorBundle' => $idSponsorBundle,
            ':idSponsor' => $idSponsor,
            ':dateBuySponsorBundle' => $buyDateSponsorBundle
        );
        //die();
        //
        return $this->executeQuery($sql, $params);
    }

    /*public function getAllBundleLessBought($idSponsor)
    {
        //
        $sql = "
            SELECT *
            FROM $this->table t1
            LEFT JOIN sponsorbundle t2
            ON t1.idSponsorBundle = t2.idSponsorBundle
            WHERE t1.idSponsor = $idSponsor;
    ";
        //
        $connection = self::getConnection()->connection_PDO();
        $query = $connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }*/

}