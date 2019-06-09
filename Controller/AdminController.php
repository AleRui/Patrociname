<?php


require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/Admin.php';
require_once 'Model/AdminModel.php';
require_once 'Model/AdminChart01.php';
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
                userSession::getSession()->setUserSession($userAdmin, $this->controller);
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
            $adminChart01 = new AdminChart01();
            $data_chart_01 = $adminChart01->getChart01info();
            //showPretty($data);
            //$data = $adminChart01->mapInfoToJson($data);
            //showPretty($data);
            //
            //$data_chart_01 = 'Info Chart';
        }
        //
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: POST, GET, DELETE, PATCH, PUT, OPTIONS");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, X-Auth-Token");
        echo json_encode($data_chart_01);
    }

}