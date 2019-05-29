<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 20:45
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