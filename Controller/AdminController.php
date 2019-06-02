<?php


require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/Admin.php';
require_once 'Model/AdminModel.php';
/* -- */


class AdminController extends BaseController
{

    private $controller = 'admin';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    public function login()
    {
        showPretty($_POST);
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $adminModel = new AdminModel($this->controller);
            //showPretty($adminModel);
            //die();
            $userAdmin = $adminModel->checkExitAdmin($_POST['mail'], $_POST['pass']);
            //showPretty($userAdmin);
            die();
            //
            if ( !empty($userAdmin) && $userAdmin->getIdAdmin() ) {
                //
                userSession::getSession();
                userSession::getSession()->setUserSession($userAdmin);
                //
                header('Location:?controller=admin&action=index');
            } else {
                //
                header('Location:?controller=admin&action=index');
            }
        } else {
            header('Location:?controller=admin&action=index');
        }
    }


    public function index()
    {
        userSession::getSession();
        //
        if ( userSession::getSession()->checkActiveSession() && $_SESSION['user'] ) {
            //
            $this->view($this->controller);
        } else {
            require_once './View/adminView.php';
        }
    }


    public function checkExistEmail()
    {
        if (!empty($_POST['mailInserted'])) {
            //
            $adminModel = new AdminModel;
            $response = $adminModel->checkExistEmail($_POST['mailInserted']);
            //
            echo $response ? 'Existe email' : '';
            return $response;
        }
    }

}