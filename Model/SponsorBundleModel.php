<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

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

    public function insertSponsorBundle($sponsorBundle) // Create by Searcher
    {
        $createdDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO $this->table
                (idSponsorBundle, idSearcher, sponsorWay, sponsoringCost,
                sponsorIma, sponsorDateCreated, sponsorDuration)
                VALUES ( :idSponsorBundle, :idSearcher, :sponsorWay, :sponsoringCost,
                :sponsorIma, :sponsorDateCreated, :sponsorDuration)";

        $params = array(
            ':idSponsorBundle' => ($this->minIdAvailable()[0])->getMinid(),
            ':idSearcher' => $sponsorBundle->getIdSearcher(),
            ':sponsorWay' => $sponsorBundle->getSponsorWay(),
            ':sponsoringCost' => $sponsorBundle->getSponsoringCost(),
            ':sponsorDuration' => $sponsorBundle->getSponsorDuration(),
            ':sponsorIma' => $sponsorBundle->getSponsorIma(),
            ':sponsorDateCreated' => $createdDate,
        );

        $query = $this::getConnection()->doQuery($sql, $params);

        return $query;
    }


    public function updateSponsorBundle($sponsorBundle) // -- Modify by Searcher
    {

        $sql = "UPDATE $this->table
                SET
                    sponsorWay = :sponsorWay,
                    sponsoringCost = :sponsoringCost,
                    sponsorDuration = :sponsorDuration,
                    sponsorIma = :sponsorIma
                WHERE
                    idSponsorBundle = :idSponsorBundle";

        $params = array(
            ':idSponsorBundle' => $sponsorBundle->getIdSponsorBundle(),
            ':sponsorWay' => $sponsorBundle->getSponsorWay(),
            ':sponsoringCost' => $sponsorBundle->getSponsoringCost(),
            ':sponsorDuration' => $sponsorBundle->getSponsorDuration(),
            ':sponsorIma' => $sponsorBundle->getSponsorIma()
        );

        $query = $this::getConnection()->doQuery($sql, $params);

        return $query;
    }


    public function deleteBundle($idSponsorBundle) // -- Delete by Searcher
    {

        $sql = "DELETE FROM $this->table WHERE idSponsorBundle = :id";

        $params = array(':id' => $idSponsorBundle);

        return $this::getConnection()->doQuery($sql, $params);
    }

    // --------------------------------------------------------

    public function getAllSponsorBundleById($idSearcher) // -- Searcher
    {

        $sql = "
        SELECT	t1.idSponsorBundle, t1.idSearcher, t1.sponsorWay, t1.sponsoringCost,
                t1.sponsorIma, t1.sponsorDateCreated, t1.sponsorDuration,
                t2.buyDateSponsorBundle,
                t3.mailSponsor
        FROM sponsorbundle t1
        LEFT JOIN sponsorbuysponsoring t2
        ON t1.idSponsorBundle = t2.idSponsorBundle
        LEFT JOIN sponsor t3
        ON t2.idSponsor = t3.idSponsor
        WHERE t1.idSearcher = :id
        ";

        $params = array(':id' => $idSearcher);

        $query = $this::getConnection()->doQuery($sql, $params);

        return (is_object($query)) ? $this->getObject($query) : null;
    }


    public function getAllAvailableBundle($idSponsor) // -- Sponsor
    {

        $sql = "SELECT * FROM $this->table
                WHERE idSponsorBundle !=
                    ALL(SELECT idSponsorBundle
                    FROM sponsorbuysponsoring
                    WHERE idSponsor = :idSponsor)";

        $params = array(':idSponsor' => $idSponsor);

        return $this->executeQuery($sql, $params);
    }


    public function getAllAvailableBundleByPage($idSponsor, $beginSearch, $stopSearch) // -- Sponsor
    {
        // Pagination

        $sql = "SELECT * FROM $this->table
                WHERE idSponsorBundle !=
                ALL(SELECT idSponsorBundle
                    FROM sponsorbuysponsoring
                    WHERE idSponsor = :idSponsor)
                ORDER BY sponsorDateCreated DESC
                LIMIT $beginSearch, $stopSearch";

        $params = array(
            ':idSponsor' => $idSponsor
        );

        return $this->executeQuery($sql, $params);
    }


    public function getAllBoughtBundle($idSponsor) // -- Sponsor
    {

        $sql = "
            SELECT *
            FROM $this->table t1
            LEFT JOIN sponsorbuysponsoring t2
            ON t1.idSponsorBundle = t2.idSponsorBundle
            WHERE t2.idSponsor = :idSponsor;
            ";

        $params = array(':idSponsor' => $idSponsor);

        $query = $this::getConnection()->doQuery($sql, $params);

        return (is_object($query)) ? $this->getObject($query) : null;
    }

    // -------------------------------

    function offerDataApi() // -- API
    {

        $sql = "
        SELECT	t1.sponsorWay, t1.sponsoringCost, t1.sponsorIma, t1.sponsorDateCreated, t1.sponsorDuration,
		t2.mailSearcher,
        t3.buyDateSponsorBundle,
        t4.mailSponsor
        FROM sponsorbundle t1
        LEFT JOIN searcher t2
        ON t1.idSearcher = t2.idSearcher
        LEFT JOIN sponsorbuysponsoring t3
        ON t1.idSponsorBundle = t3.idSponsorBundle
        LEFT JOIN sponsor t4
        ON t3.idSponsor = t4.idSponsor
        ";

        $params = array();

        $query = $this::getConnection()->doQuery($sql, $params);

        return (is_object($query)) ? $this->getObject($query) : null;
    }


}