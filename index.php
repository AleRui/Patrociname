<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once "libs/funct.php";

showPretty($_GET);

include_once 'core/Router.php';

echo 'Controlador Principal<br>';

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $route = new Router($_GET['controller'], $_GET['action']);
    $route->charge_Controller();
} else {
    $route = new Router('Index', 'index');
    $route->charge_Controller();
}



