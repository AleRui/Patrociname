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
            $userAdmin = $adminModel->checkExitAdmin($_POST['mail'], $_POST['pass'])[0];
            //showPretty($userAdmin);
            //
            if ( !empty($userAdmin) && $userAdmin->getIdAdmin() ) {
                //
                userSession::getSession();
                userSession::getSession()->setUserSession($userAdmin);
                //showPretty($_SESSION);
                //
                header('Location: ./?controller=admin&action=index');
            } else {
                //
                header('Location:./?controller=admin&action=index');
            }
        } else {
            header('./Location:?controller=admin&action=index');
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


    public function getInfoChart_01() // -- Ajax
    {
        $data_chart_01 = '';
        if ( userSession::getSession()->checkActiveSession() && $_SESSION['user'] ) {
            //
            $data_chart_01 = 'Info Chart';
        }
        echo $data_chart_01;
    }

}