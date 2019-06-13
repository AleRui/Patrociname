<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
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
        $buyDateSponsorBundle = date('Y-m-d H:i:s');

        $sql = "INSERT INTO $this->table (idSponsorBundle, idSponsor, buyDateSponsorBundle) 
                VALUES ( :idSponsorBundle, :idSponsor, :dateBuySponsorBundle)";
        //
        $params = array(
            ':idSponsorBundle' => $idSponsorBundle,
            ':idSponsor' => $idSponsor,
            ':dateBuySponsorBundle' => $buyDateSponsorBundle
        );

        return $this->executeQuery($sql, $params);
    }

}