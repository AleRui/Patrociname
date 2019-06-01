<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 24/11/18
 * Time: 17:55
 */

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