<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

class SponsorBuySponsoring
{
    private $idSponsorBundle;
    private $idSponsor;

    public function __construct()
    {
    }


    public function getIdSponsorBundle()
    {
        return $this->idSponsorBundle;
    }


    public function setIdSponsorBundle($idSponsorBundle)
    {
        $this->idSponsorBundle = $idSponsorBundle;
    }


    public function getIdSponsor()
    {
        return $this->idSponsor;
    }


    public function setIdSponsor($idSponsor)
    {
        $this->idSponsor = $idSponsor;
    }



}