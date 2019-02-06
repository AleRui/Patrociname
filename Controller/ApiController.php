<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 24/11/18
 * Time: 17:55
 */

class ApiController {

  public function sendData () {
    require_once 'libs/API.php';
    $result = offerData();
    //
    header("Content-type: application/json") ;
    echo json_encode($result) ;
  }
}