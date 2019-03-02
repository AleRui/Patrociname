<?php


class Searcher
{

    private $idSearcher;
    private $mailSearcher;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdSearcher()
    {
        return $this->idSearcher;
    }

    /**
     * @param $idSearcher
     */
    public function setIdSearcher($idSearcher)
    {
        $this->idSearcher = $idSearcher;
    }

    /**
     * @return mixed
     */
    public function getMailSearcher()
    {
        return $this->mailSearcher;
    }

    /**
     * @param $mailSearcher
     */
    public function setMailSearcher($mailSearcher)
    {
        $this->mailSearcher = $mailSearcher;
    }

    /**
     * @return mixed
     */
    public function getMinId()
    {
        return $this->minId;
    }

}