<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */


class User {

    private $idUser;
    private $emaUser;
    private $rolUser;

    public function __construct() {
    }


    public function getIdUser()
    {
        return $this->idUser;
    }


    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


    public function getEmaUser()
    {
        return $this->emaUser;
    }


    public function setEmaUser($emaUser)
    {
        $this->emaUser = $emaUser;
    }


    public function getRolUser()
    {
        return $this->rolUser;
    }


    public function setRolUser($rolUser)
    {
        $this->rolUser = $rolUser;
    }



}