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

    public function __construct()
    {
        //$this->controller = $controller;
        //$this->action = $action;
    }

    public function basicRoute() {
        //showPretty($_GET);
        //die();
        //
        if (isset($_GET['controller']) && !empty($_GET['controller']) &&
            isset($_GET['action']) && !empty($_GET['action']) ) {
            //
            $this->controller = $_GET['controller'];
            $this->action = $_GET['action'];
            //
            //$route = new Router($_GET['controller'], $_GET['action']);
            //$this->charge_Controller();
        } else if ($_GET) {
            showPretty($_GET);
            die();
        } else {
            $this->controller = 'Index';
            $this->action = 'index';
            //$this->charge_Controller('index', 'index');
        }
        //
        $this->charge_Controller();
    }


    public function charge_Controller()
    {
        //echo 'Controller: '.$this->controller.'<br>';
        //echo 'Action: '.$this->action.'<br>';
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