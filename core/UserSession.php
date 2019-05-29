<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 07/11/2018
 * Time: 12:16
 */


class userSession
{

    private $expire_time = 3000;
    private static $instance = null;  // instancia

    private function __construct()
    {
        session_start();
    }

    /**
     * @return userSession|null
     */
    public static function getSession(/*$user*/)
    {
        if (is_null(self::$instance)) {
            self::$instance = new userSession();
        }
        //$_SESSION['time'] = time();
        //$_SESSION['user'] = $user;
        return self::$instance;
    }

    public function setUserSession($user)
    {
        $_SESSION['time'] = time();
        $_SESSION['user'] = $user;
    }

    public
    function __destroy()
    {
        // Destruimos las variables de sesión
        $_SESSION[] = array();
        session_unset();

        // Cerramos la sesión
        session_destroy();
    }

    /**
     * @throws Exception
     */
    private
    function __clone()
    {
        throw new Exception('Feature disabled.');
    }

//
    private
    function checkExpired()
    {
        $timeBeginSession = $_SESSION["time"];
        //
        $timeActual = time();
        //
        echo 'Tiempo de Session:' . ($timeActual - $timeBeginSession) . '<br>';
        return (($timeActual - $timeBeginSession) > $this->expire_time);
    }

//
    private
    function isLogged()
    {
        return !empty($_SESSION['user']); // Sesión no esta vacia return true
    }

//
    public
    function checkActiveSession()
    {
        if ($this->isLogged()) {
            //
            if ($this->checkExpired()) {
                //
                $this->__destroy();
                return false;
            } else {
                //
                $_SESSION['time'] = time();
                return true;
            }
        }
    }

}