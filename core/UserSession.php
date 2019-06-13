<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */


class userSession
{

    private $expire_time = 3000;
    private static $instance = null;  // instancia

    private function __construct()
    {
        session_start();
    }


    public static function getSession()
    {
        if (is_null(self::$instance)) {
            self::$instance = new userSession();
        }
        return self::$instance;
    }

    public function setUserSession($user, $controller)
    {
        $_SESSION['time'] = time();
        $_SESSION['user'] = $user;
        $_SESSION['userType'] = $controller;
    }

    public function __destroy()
    {
        $_SESSION[] = array();
        session_unset();

        session_destroy();
    }


    private function __clone()
    {
        throw new Exception('Feature disabled.');
    }


    private function checkExpired()
    {
        $timeBeginSession = $_SESSION["time"];

        $timeActual = time();

        return (($timeActual - $timeBeginSession) > $this->expire_time);
    }


    private function isLogged()
    {
        return !empty($_SESSION['user']); // Sesión no esta vacia return true
    }


    public function checkActiveSession()
    {
        if ($this->isLogged()) {

            if ($this->checkExpired()) {

                $this->__destroy();

                return false;

            } else {

                $_SESSION['time'] = time();

                return true;
            }
        }
    }

}