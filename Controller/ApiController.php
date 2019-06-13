<?php

require_once './Model/SponsorBundleModel.php';

class ApiController
{

    public function sendDataApi()
    {
        $sponsorBundleModel = new SponsorBundleModel();
        $result = $sponsorBundleModel->offerDataApi();
        //
        $data = $this->mapDataApi($result);
        //
        header("Content-type: application/json");
        echo json_encode($data);
    }


    public function mapDataApi($data)
    {
        //
        $conjuntoItems = Array();
        //
        foreach ($data as $item) {
            $mapedItem = Array(
                'sponsorWay' => $item->getSponsorWay(),
                'sponsoringCost' => $item->getSponsoringCost(),
                'sponsorDuration' => $item->getSponsorDuration(),
                'sponsorIma' => $item->getSponsorIma(),
                'sponsorDateCreated' => $item->getSponsorDateCreated(),
                'buyDateSponsorBundle' => $item->getBuyDateSponsorBundle(),
                'mailSearcherCreater' => $item->getMailSearcher(),
                'mailSponsorBuyer' => $item->getMailSponsor(),
            );
            //
            array_push($conjuntoItems, $mapedItem);
        }
        //
        return $conjuntoItems;
    }
}