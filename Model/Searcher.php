<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */


class Searcher
{

    private $idSearcher;
    private $mailSearcher;

    public function __construct()
    {
    }


    public function getIdSearcher()
    {
        return $this->idSearcher;
    }


    public function setIdSearcher($idSearcher)
    {
        $this->idSearcher = $idSearcher;
    }


    public function getMailSearcher()
    {
        return $this->mailSearcher;
    }


    public function setMailSearcher($mailSearcher)
    {
        $this->mailSearcher = $mailSearcher;
    }


    public function getMinId()
    {
        return $this->minId;
    }

}