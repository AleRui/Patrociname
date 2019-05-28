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
    public function insertSponsorBundle($sponsorBundle)
    {
        echo 'Estoy en SponsorBundleModel -> insertSponsorBundle';
        //showPretty($sponsorBundle);
        //
        $sql = "INSERT INTO $this->table
                (idSponsorBundle, idSearcher, sponsorWay, sponsoringCost, sponsorIma)
                VALUES ( :idSponsorBundle, :idSearcher, :sponsorWay, :sponsoringCost, :sponsorIma)";
        //
        $params = array(
            ':idSponsorBundle' => $sponsorBundle->getIdSponsorBundle(),
            ':idSearcher' => $sponsorBundle->getIdSearcher(),
            ':sponsorWay' => $sponsorBundle->getSponsorWay(),
            ':sponsoringCost' => $sponsorBundle->getSponsoringCost(),
            ':sponsorIma' => $sponsorBundle->getSponsorIma()
        );
        showPretty($params);
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