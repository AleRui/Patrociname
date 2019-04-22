<?php


class User {

    private $idUser;
    private $emaUser;
    private $rolUser;

    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getEmaUser()
    {
        return $this->emaUser;
    }

    /**
     * @param mixed $emaUser
     */
    public function setEmaUser($emaUser)
    {
        $this->emaUser = $emaUser;
    }

    /**
     * @return mixed
     */
    public function getRolUser()
    {
        return $this->rolUser;
    }

    /**
     * @param mixed $rolUser
     */
    public function setRolUser($rolUser)
    {
        $this->rolUser = $rolUser;
    }



}