<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 07/11/2018
 * Time: 12:16
 */


class Session
{

    private $expire_time = 30000;
    //private $user = null;// Searcher o Sponsorship
    private static $instance = null;  // instancia

    private function __construct()
    {
        session_start();
    }

    /**
     * @return Session|null
     */
    public static function getSession($user)
    {
        if (is_null(self::$instance)) {
            self::$instance = new Session();
        }
        $_SESSION['time'] = time();
        $_SESSION['user'] = $user;
        return self::$instance;
    }

    public function __destroy()
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
    private function __clone()
    {
        throw new Exception('Feature disabled.');
    }

    //
    private function checkExpired()
    {
        $tme_log = $_SESSION["time"];
        $tme_act = time();
        return (($tme_act - $tme_log) > $this->expire_time);
    }

    //
    private function isLogged()
    {
        return !empty($_SESSION); // Sesión no esta vacia = true
    }

    //
    public function checkActiveSession()
    {
        if ($this->isLogged()) {
            if ($this->checkExpired()) {
                $this->__destroy();
                return false; // no hay sesión activa
            } else {
                return true;  // hay sesión activa
            }
        }
    }

    //
    public function setSessionValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}