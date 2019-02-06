<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 11:14
 */

class SponsorBundle {

  private $idSponsorBundle;
  private $idSearcher;
  private $sponsorWay;

  public function __construct() {
  }

  public function getIdSponsorBundle() {
    return $this->idSponsorBundle;
  }

  public function setIdSponsorBundle($idSponsorBundle): void {
    $this->idSponsorBundle = $idSponsorBundle;
  }

  public function getIdSearcher() {
    return $this->idSearcher;
  }

  public function setIdSearcher($idSearcher): void {
    $this->idSearcher = $idSearcher;
  }

  public function getSponsorWay() {
    return $this->sponsorWay;
  }

  public function setSponsorWay($sponsorWay): void {
    $this->sponsorWay = $sponsorWay;
  }



}