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
        SELECT DATE_FORMAT(t1.sponsorDateCreated, '%Y-%m-%d') AS `sponsorDateCreated`, COUNT(t1.sponsorDateCreated) AS 'numTotalSponsorCreated'
        FROM sponsorbundle t1
        GROUP BY DATE_FORMAT(t1.sponsorDateCreated, '%Y-%m-%d')
        ";
        $params = array();
        //
        //echo $sql;
        //
        $baseModel = new BaseModel('sponsorBundle');
        //
        $data = $baseModel->executeQuery($sql, $params);
        $data = $this->mapInfoToJson($data);
        //
        return $data;
    }


    public function mapInfoToJson($data)
    {
        //
        $conjuntoItems = Array();
        $label = Array();
        $values = Array();
        //
        foreach ($data as $item) {
            //$mapedItem = Array();
            //
            if (
                $item->getSponsorDateCreated() && !empty($item->getSponsorDateCreated())
                && $item->getNumTotalSponsorCreated() && !empty($item->getNumTotalSponsorCreated())

            ) {
                array_push($label, $item->getSponsorDateCreated());
                array_push($values, $item->getNumTotalSponsorCreated());
            }
        }
        //
        $conjuntoItems = [
            'label' => $label,
            'values' => $values,
        ];
        //
        return $conjuntoItems;
    }


}