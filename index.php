<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once "libs/funct.php";
include_once 'core/Router.php';

$router = new Router();
$router->basicRoute($_GET);



