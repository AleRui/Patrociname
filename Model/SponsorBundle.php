<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 11:14
 */

class SponsorBundle
{

    private $idSponsorBundle;
    private $idSearcher;
    private $sponsorWay;
    private $sponsoringCost;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdSponsorBundle()
    {
        return $this->idSponsorBundle;
    }

    /**
     * @param mixed $idSponsorBundle
     */
    public function setIdSponsorBundle($idSponsorBundle)
    {
        $this->idSponsorBundle = $idSponsorBundle;
    }

    /**
     * @return mixed
     */
    public function getIdSearcher()
    {
        return $this->idSearcher;
    }

    /**
     * @param mixed $idSearcher
     */
    public function setIdSearcher($idSearcher)
    {
        $this->idSearcher = $idSearcher;
    }

    /**
     * @return mixed
     */
    public function getSponsorWay()
    {
        return $this->sponsorWay;
    }

    /**
     * @param mixed $sponsorWay
     */
    public function setSponsorWay($sponsorWay)
    {
        $this->sponsorWay = $sponsorWay;
    }

    /**
     * @return mixed
     */
    public function getSponsoringCost()
    {
        return $this->sponsoringCost;
    }

    /**
     * @param mixed $sponsoringCost
     */
    public function setSponsoringCost($sponsoringCost)
    {
        $this->sponsoringCost = $sponsoringCost;
    }




}