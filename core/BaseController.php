<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 21:03
 */

require_once 'UserSession.php';

class BaseController
{

    private $controller;

    public function __construct($child_constroller)
    {
        $this->controller = (string)$child_constroller;
    }

    public function view()
    {
        //echo './View/' . $this->controller . 'View.php';
        //die();
        //
        require_once './View/' . $this->controller . 'View.php';
    }
}