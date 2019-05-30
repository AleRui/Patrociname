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


    public function getAllSponsorBundleById($idSearcher)
    {
        $sql = "SELECT * FROM $this->table WHERE idSearcher = :id";
        $params = array(':id' => $idSearcher);
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return (is_object($query)) ? $this->getObject($query) : null;
    }


    public function insertSponsorBundle($sponsorBundle)
    {
        $sql = "INSERT INTO $this->table
                (idSponsorBundle, idSearcher, sponsorWay, sponsoringCost,
                sponsorIma, sponsorDateCreated, sponsorDuration)
                VALUES ( :idSponsorBundle, :idSearcher, :sponsorWay, :sponsoringCost,
                :sponsorIma, :sponsorDateCreated, :sponsorDuration)";
        //
        $params = array(
            ':idSponsorBundle' => $sponsorBundle->getIdSponsorBundle(),
            ':idSearcher' => $sponsorBundle->getIdSearcher(),
            ':sponsorWay' => $sponsorBundle->getSponsorWay(),
            ':sponsoringCost' => $sponsorBundle->getSponsoringCost(),
            ':sponsorDuration' => $sponsorBundle->getSponsorDuration(),
            ':sponsorIma' => $sponsorBundle->getSponsorIma(),
            ':sponsorDateCreated' => $sponsorBundle->getSponsorDateCreated(),
        );
        //
        //showPretty($params);
        //die();
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return $query;
    }


    public function updateSponsorBundle($sponsorBundle)
    {
        //
        $sql = "UPDATE $this->table
                SET
                    sponsorWay = :sponsorWay,
                    sponsoringCost = :sponsoringCost,
                    sponsorDuration = :sponsorDuration,
                    sponsorIma = :sponsorIma
                WHERE
                    idSponsorBundle = :idSponsorBundle";
        //
        $params = array(
            ':idSponsorBundle' => $sponsorBundle->getIdSponsorBundle(),
            ':sponsorWay' => $sponsorBundle->getSponsorWay(),
            ':sponsoringCost' => $sponsorBundle->getSponsoringCost(),
            ':sponsorDuration' => $sponsorBundle->getSponsorDuration(),
            ':sponsorIma' => $sponsorBundle->getSponsorIma()
        );
        //
        //showPretty($params);
        //die();
        //
        $query = $this::getConnection()->doQuery($sql, $params);
        //
        return $query;
    }


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