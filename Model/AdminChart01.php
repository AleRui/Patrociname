<?php

require_once 'core/BaseModel.php';
require_once 'Model/SponsorBundleModel.php';


class adminChart01
{
    private $sponsorDateCreated;
    private $numTotalSponsorCreated;

    public function __construct()
    {
    }


    public function getSponsorDateCreated()
    {
        return $this->sponsorDateCreated;
    }


    public function setSponsorDateCreated($sponsorDateCreated)
    {
        $this->sponsorDateCreated = $sponsorDateCreated;
    }


    public function getNumTotalSponsorCreated()
    {
        return $this->numTotalSponsorCreated;
    }


    public function setNumTotalSponsorCreated($numTotalSponsorCreated)
    {
        $this->numTotalSponsorCreated = $numTotalSponsorCreated;
    }

    public function getChart01info()
    {
        //
        $sql = "
        SELECT t1.sponsorDateCreated, COUNT(t1.sponsorDateCreated) AS 'numTotalSponsorCreated'
        FROM sponsorbundle t1
        GROUP BY DATE_FORMAT(t1.sponsorDateCreated, '%Y%m%d')
        ";
        $params = array();
        //
        //echo $sql;
        //
        $baseModel = new BaseModel('sponsorBundle');
        //
        $data = $baseModel->executeQuery($sql, $params);
        //showPretty($data);
        $data = $this->mapInfoToJson($data);
        showPretty($data);
        //
        return true;
    }


    public function mapInfoToJson($data)
    {
        //
        $conjuntoItems = Array();
        //
        $label = Array();
        //
        foreach ($data as $item) {
            $mapedItem = Array();
            //
            if ($item->getSponsorDateCreated() && !empty($item->getSponsorDateCreated())) {
                $mapedItem['sponsorDateCreated'] = $item->getSponsorDateCreated();
            }
            //
            if ($item->getNumTotalSponsorCreated() && !empty($item->getNumTotalSponsorCreated())) {
                $mapedItem['numTotalSponsorCreated'] = $item->getNumTotalSponsorCreated();
            }
            //
            array_push($conjuntoItems, $mapedItem);
        }
        //
        return $conjuntoItems;
    }


}