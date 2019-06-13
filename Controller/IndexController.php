<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

include_once 'core/BaseController.php';

class IndexController extends BaseController
{

    private $controller = 'index';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    public function index()
    {
        $this->view($this->controller);
    }


}