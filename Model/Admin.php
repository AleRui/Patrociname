<?php


class Admin
{
    private $idAdmin;
    private $mailAdmin;

    public function __construct()
    {
    }


    public function getIdAdmin()
    {
        return $this->idAdmin;
    }


    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }


    public function getMailAdmin()
    {
        return $this->mailAdmin;
    }


    public function setMailAdmin($mailAdmin)
    {
        $this->mailAdmin = $mailAdmin;
    }


    public function getMinId()
    {
        return $this->minId;
    }


}