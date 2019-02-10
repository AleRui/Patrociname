<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 07/11/2018
 * Time: 12:16
 */


class Session {
  
  private $expire_time = 30000;
  //private $somebody = null;// Searcher o Sponsorship
  //
  private static $instance = null;  // instancia
  
  private function __construct() {
    session_start();
  }
  
  public function __destroy() {
    // Destruimos las variables de sesión
    $_SESSION[] = array();
    session_unset();
    
    // Cerramos la sesión
    session_destroy();
  }
  
  // INSTANCIA de SESSION
  public static function getSession() { //Singleton Crea instancia
    //session_start();
    if (is_null(self::$instance)):
      self::$instance = new Session();
      //session_start();
    endif;
    //
    $_SESSION['time'] = time();
    return self::$instance;
  }
  
  //
  private function __clone() { //Singleton
  }
  
  //
  private function isExpired() {
    $tme_log = $_SESSION["time"];
    $tme_act = time();
    return (($tme_act - $tme_log) > $this->expire_time);
  }
  
  //
  private function isLogged() {
    return !empty($_SESSION);
  }
  
  //
  public function checkActiveSession() {
    if ($this->isLogged()):
      if ($this->isExpired()):
        $this->__destroy();
        return false; // no hay sesión activa
      else:
        return true;  // hay sesión activa
      endif;
    else:
      return false;     // no hay sesión activa
    endif;
  }
  
  //
  public function setSessionValue($key, $value) {
    $_SESSION[$key] = $value;
  }
  
  //
  public function close() {
    $this->__destroy();
  }
}