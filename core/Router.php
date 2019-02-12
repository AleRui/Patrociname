<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 20:54
 */

class Router {

  private $controller;
  private $action;

  public function __construct($controller, $action) {
    $this->controller = $controller;
    $this->action = $action;
  }

  public function charge_Controller() {
    //
    $nameController = ucwords($this->controller).'Controller';
    $routeController = 'Controller/'.$nameController.'.php';
    $actionController = $this->action;
    //
      echo $routeController.'<br>';
      echo $actionController.'<br>';
    //
    // Check if exist controller
    if ( !is_file($routeController) ) {
      echo 'No existe la ruta de ese Controlador<br>';
      $routeController = 'Controller/IndexController.php';
    }
    //
    require_once $routeController;
    $objController = new $nameController();
    //
    // Check exist Action
    if ( !method_exists( $objController, $actionController) ) {
      $actionController = 'index';
      $this->controller = '';
    }
    //
    $objController->$actionController($this->controller);
  }


}