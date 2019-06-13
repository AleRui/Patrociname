<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */


class Sponsor
{

    private $idSponsor;
    private $mailSponsor;

    public function __construct()
    {
    }


    public function getIdSponsor()
    {
        return $this->idSponsor;
    }


    public function setIdSponsor($idSponsor): void
    {
        $this->idSponsor = $idSponsor;
    }


    public function getMailSponsor()
    {
        return $this->mailSponsor;
    }


    public function setMailSponsor($mailSponsor): void
    {
        $this->mailSponsor = $mailSponsor;
    }


    public function getMinId()
    {
        return $this->minId;
    }

}