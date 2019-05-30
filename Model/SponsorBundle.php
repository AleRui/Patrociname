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
    private $sponsorDuration;

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

    /**
     * @return mixed
     */
    public function getSponsorDuration()
    {
        return $this->sponsorDuration;
    }

    /**
     * @param mixed $sponsorDuration
     */
    public function setSponsorDuration($sponsorDuration)
    {
        $this->sponsorDuration = $sponsorDuration;
    }
    private $sponsorIma;
    private $sponsorDateCreated;


    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getSponsorIma()
    {
        return $this->sponsorIma;
    }

    /**
     * @param mixed $sponsorIma
     */
    public function setSponsorIma($sponsorIma)
    {
        $this->sponsorIma = $sponsorIma;
    }

    /**
     * @return mixed
     */
    public function getSponsorDateCreated()
    {
        return $this->sponsorDateCreated;
    }

    /**
     * @param mixed $sponsorDateCreated
     */
    public function setSponsorDateCreated($sponsorDateCreated)
    {
        $this->sponsorDateCreated = $sponsorDateCreated;
    }

    /**
     * @return mixed
     */
    public function getMinId()
    {
        return $this->minId;
    }




}