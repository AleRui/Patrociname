<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 21:03
 */

class BaseController {

  public function __construct() {
  }

  public function view($vista){
    require_once "View/".$vista."View.php";
  }
}