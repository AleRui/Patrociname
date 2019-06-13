<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

echo 'my_help.php<hr/>';
require "libs/funct.php";

// ------------------------------------------

echo 'ConexionDB:<br>';

require_once "core/Connection.php";

$db = Connection::getInstance();

showPretty($db);

echo '<hr/>';

// -----------------------------------------

echo 'Test Query normal<br>';

$sql = 'SELECT * FROM searcher';
$params = array();

require_once "core/BaseModel.php";

$model = new BaseModel('searcher');
showPretty($model);
$query = $model::getConnection()->doQuery($sql);

echo gettype($query);
showPretty($query);

//
require_once './Model/Searcher.php';
$obj = $model->getObject($query, 'searcher');
showPretty($obj);
echo '<hr/>';
