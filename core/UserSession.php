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
        //echo 'Estoy en checkExpired()<br>';
        $timeBeginSession = $_SESSION["time"];
        //echo 'Tiempo de inicio de Session:' . $timeBeginSession . '<br>';
        $timeActual = time();
        //echo 'Tiempo actual:' . $timeActual . '<br>';
        //echo 'Tiempo expiración de session: ' . $this->expire_time . '<br>';
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
        //echo 'Estoy en checkActiveSession()<br>';
        if ($this->isLogged()) {
            //echo 'Estoy logueado<br>';
            if ($this->checkExpired()) {
                //echo 'La sesión ha expirado<br>';
                $this->__destroy();
                return false; // no hay sesión activa
            } else {
                //echo 'La sesión no ha expirado<br>';
                $_SESSION['time'] = time();
                return true;  // hay sesión activa
            }
        }
    }

//
    /*public function setSessionValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }*/
}