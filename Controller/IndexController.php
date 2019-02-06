<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 20:45
 */

include_once 'core/BaseController.php';

class IndexController extends BaseController {

  public function __construct() {}

  public function index() {
    $this->view('index');
  }


}