<?php


class Sponsor {

  private $idSponsor;
  private $mailSponsor;

  public function __construct() {
  }

  /**
   * @return mixed
   */
  public function getIdSponsor() {
    return $this->idSponsor;
  }

  /**
   * @param mixed $idSponsor
   */
  public function setIdSponsor($idSponsor): void {
    $this->idSponsor = $idSponsor;
  }

  /**
   * @return mixed
   */
  public function getMailSponsor() {
    return $this->mailSponsor;
  }

  /**
   * @param mixed $mailSponsor
   */
  public function setMailSponsor($mailSponsor): void {
    $this->mailSponsor = $mailSponsor;
  }

}