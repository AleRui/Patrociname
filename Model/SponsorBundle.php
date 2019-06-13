<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

class SponsorBundle
{

    private $idSponsorBundle;
    private $idSearcher;
    private $sponsorWay;
    private $sponsoringCost;
    private $sponsorDuration;


    public function getIdSponsorBundle()
    {
        return $this->idSponsorBundle;
    }


    public function setIdSponsorBundle($idSponsorBundle)
    {
        $this->idSponsorBundle = $idSponsorBundle;
    }


    public function getIdSearcher()
    {
        return $this->idSearcher;
    }


    public function setIdSearcher($idSearcher)
    {
        $this->idSearcher = $idSearcher;
    }


    public function getSponsorWay()
    {
        return $this->sponsorWay;
    }


    public function setSponsorWay($sponsorWay)
    {
        $this->sponsorWay = $sponsorWay;
    }


    public function getSponsoringCost()
    {
        return $this->sponsoringCost;
    }


    public function setSponsoringCost($sponsoringCost)
    {
        $this->sponsoringCost = $sponsoringCost;
    }


    public function getSponsorDuration()
    {
        return $this->sponsorDuration;
    }


    public function setSponsorDuration($sponsorDuration)
    {
        $this->sponsorDuration = $sponsorDuration;
    }

    private $sponsorIma;
    private $sponsorDateCreated;


    public function __construct()
    {
    }


    public function getSponsorIma()
    {
        return $this->sponsorIma;
    }


    public function setSponsorIma($sponsorIma)
    {
        $this->sponsorIma = $sponsorIma;
    }


    public function getSponsorDateCreated()
    {
        return $this->sponsorDateCreated;
    }


    public function setSponsorDateCreated($sponsorDateCreated)
    {
        $this->sponsorDateCreated = $sponsorDateCreated;
    }


    public function getMinId()
    {
        return $this->minId;
    }

    public function getMailSponsor()
    {
        return $this->mailSponsor;
    }


    public function getBuyDateSponsorBundle()
    {
        return $this->buyDateSponsorBundle;
    }

    public function getMailSearcher()
    {
        return $this->mailSearcher;
    }


    public function getNumTotalSponsorCreated()
    {
        return $this->numTotalSponsorCreated;
    }


}