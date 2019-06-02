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
        if (userSession::getSession()->checkActiveSession() && $_SESSION['user']) {

            require_once './View/' . $this->controller . 'View.php';

        } else {

            require_once './View/indexView.php';

        }
    }

    public function logout() // -- Cualquier usuario
    {
        if ( userSession::getSession()->checkActiveSession() ) {
            userSession::getSession(unserialize($_SESSION['user']))->__destroy();
            header('Location:?controller=index&action=index');
        }
    }
}