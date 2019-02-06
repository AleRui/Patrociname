<?php
/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 07/11/2018
 * Time: 13:45
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

echo 'my_help.php<hr/>';
require "libs/funct.php";

// ------------------------------------------

require_once "core/Connection.php";

$database = Connection::getInstance();

mostrar($database);

echo '<hr/>';

// -----------------------------------------

require_once "core/BaseModel.php";

$baseModel = new BaseModel('searcher');
//
//
$sql = 'SELECT * FROM searcher';
$result = $baseModel->check_queryPDO($sql);
echo ($result)?'true<br>':'false<br>';

$result2 = $baseModel->getObject($sql);
mostrar($result2);

$all = $baseModel->getAll();
mostrar($all);

$element_with_id_1 = $baseModel->getAllById("idSearcher", 1);
mostrar($element_with_id_1);
//

// ---------------------------------------

require_once "Model/SearcherModel.php";

$modelSearcher = new SearcherModel('searcher');
//
$statement = 'SELECT * FROM searcher';
$result = $modelSearcher->check_queryPDO($statement);
echo $result;

$result2 = $modelSearcher->getObject($statement);
mostrar($result2);

$all = $modelSearcher->getAll();
mostrar($all);

$element_with_id_1 = $modelSearcher->getAllById("idSearcher", 1);
mostrar($element_with_id_1);

// ----------------------------------------
echo 'AJAX Query<br>';
require_once 'Model/SearcherModel.php';
$searcherModel = new SearcherModel();
//
$response = $searcherModel->checkExistEmail('prueba');
echo 'Existe el email "prueba": '.$response.'<br>';
//
$response = $searcherModel->checkExistEmail('asdf');
echo 'Existe el email "asdf": '.$response.'<br>';

// ----------------------------------------