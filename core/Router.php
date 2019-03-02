<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 20:54
 */

class Router
{

    private $controller;
    private $action;

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @throws $objController
     */
    public function charge_Controller()
    {
        //
        $nameController = ucwords($this->controller) . 'Controller';
        $routeController = 'Controller/' . $nameController . '.php';
        $actionController = $this->action;
        //
        if (!is_file($routeController)) {
            $routeController = 'Controller/IndexController.php';
        }
        //
        require_once $routeController;
        $objController = new $nameController();
        //
        if (!method_exists($objController, $actionController)) {
            $actionController = 'index';
            $this->controller = '';
        }
        //
        $objController->$actionController();
    }


}