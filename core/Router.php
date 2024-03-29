<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once './core/UserSession.php';
require_once './Model/Searcher.php';
require_once './Model/Sponsor.php';
require_once './Model/Admin.php';

class Router
{

    private $controller;
    private $action;

    public function __construct()
    {
    }

    public function basicRoute()
    {

        if (isset($_GET['controller']) && !empty($_GET['controller']) &&
            isset($_GET['action']) && !empty($_GET['action'])) {

            if (userSession::getSession()->checkActiveSession()) {

                if (isset($_SESSION) && $_SESSION['user'] && $_SESSION['userType'] && $_GET['controller'] === 'index') {

                    $this->controller = $_SESSION['userType'];

                } else {
                    //
                    $this->controller = $_GET['controller'];
                    $this->action = $_GET['action'];

                }
            } else {

                $this->controller = $_GET['controller'];
                $this->action = $_GET['action'];

            }

        } else {
            $this->controller = 'Index';
            $this->action = 'index';
        }

        $this->charge_Controller();

    }


    public
    function charge_Controller()
    {
        $nameController = ucwords($this->controller) . 'Controller';
        $routeController = 'Controller/' . $nameController . '.php';
        $actionController = $this->action;

        if (!is_file($routeController)) {
            $routeController = 'Controller/IndexController.php';
        }

        require_once $routeController;

        if (class_exists($nameController)) {

            $objController = new $nameController();

            if (!method_exists($objController, $actionController)) {
                $actionController = 'index';
                $this->controller = '';
            }

        } else {

            header('Location:?controller=index&action=index');

        }

        $objController->$actionController();
    }


}