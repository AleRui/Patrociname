<?php


require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/Admin.php';
/* -- */


class AdminController
{
    public function login()
    {
        die();
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $adminModel = new AdminModel($this->controller);
            $userAdmin = $adminModel->checkExitSearcher($_POST['mail'], $_POST['pass'])[0];
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