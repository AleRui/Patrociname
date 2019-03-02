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

    /**
     * @param $idSearcher
     * @return |null
     */
    public function getAllSponsorBundleById($idSearcher)
    {
        $sql = "SELECT * FROM $this->table WHERE idSearcher = :id";
        $params = array(':id' => $idSearcher);
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query) : null;
    }


    /**
     * @param $idSponsorBundle
     * @param $idSearcher
     * @param $sponsorWay
     * @param $sponsoringCost
     * @return bool|PDOStatement
     */
    public function insertBundle($idSponsorBundle, $idSearcher, $sponsorWay, $sponsoringCost)
    {
        echo 'Model inserBundle<br>';
        $sql = "INSERT INTO $this->table
                (idSponsorBundle, idSearcher, sponsorWay, sponsoringCost)
                VALUES ( :idSponsorBundle, :idSearcher, :sponsorWay, :sponsoringCost)";
        //
        $params = array(
            ':idSponsorBundle' => $idSponsorBundle,
            ':idSearcher' => $idSearcher,
            ':sponsorWay' => $sponsorWay,
            ':sponsoringCost' => $sponsoringCost
        );
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return $query;
    }

    public function updateSponsorBundle($idSponsorBundle, /*$idSearcher,*/
                                        $sponsorWay, $sponsoringCost)
    {
        //
        echo $idSponsorBundle . '<br>';
        echo $sponsorWay . '<br>';
        echo $sponsoringCost . '<br>';
        //
        $sql = "UPDATE $this->table SET sponsorWay = :way, sponsoringCost = :cost WHERE idSponsorBundle = :id";
        //
        $params = array(
            ':way' => $sponsorWay,
            ':cost' => $sponsoringCost,
            ':id' => $idSponsorBundle
        );
        //
        return $this::getConnection()->doQuery($sql, $params);
        die();
    }

    /***
     * @param $idSponsorBundle
     * @return bool|PDOStatement
     */
    public function deleteBundle($idSponsorBundle/*, $idSearcher*/)
    {
        //
        $sql = "DELETE FROM $this->table WHERE idSponsorBundle = :id";
        //
        $params = array(':id' => $idSponsorBundle);
        //
        return $this::getConnection()->doQuery($sql, $params);
    }

}