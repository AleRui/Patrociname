<?php


/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 27/10/18
 * Time: 20:31
 */

require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/Searcher.php';
require_once './Model/SearcherModel.php';

class SearcherController extends BaseController
{
    private $controller = 'searcher';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    //METODOS

    public function login()
    {
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $searcherModel = new SearcherModel($this->controller);
            $userSearcher = $searcherModel->checkExitSearcher($_POST['mail'], $_POST['pass'])[0];
            //
            if ( !empty($userSearcher) && $userSearcher->getIdSearcher() ) {
                //
                userSession::getSession();
                userSession::getSession()->setUserSession($userSearcher);
                //
                header('Location:?controller=searcher&action=index');
            } else {
                //
                header('Location:?controller=index&action=index');
            }
        } else {
            header('Location:?controller=index&action=index');
        }
    }

    public function index()
    {
        userSession::getSession();
        //
        if ( userSession::getSession()->checkActiveSession() && $_SESSION['user'] ) {
            //
            //showPretty($_SESSION);
            //
            require_once 'Model/SponsorBundleModel.php';
            $sponsorBundleObj = new SponsorBundleModel();
            //
            $allSponsorBundle = $sponsorBundleObj->getAllSponsorBundleById($_SESSION['user']->getIdSearcher());
            //
            $_SESSION['allSponsorBundle'] = serialize($allSponsorBundle);
            //
            $this->view($this->controller);
        } else {
            header('Location:?controller=index&action=index');
        }
    }

    public function registerSearcher()
    {
        $searcherModel = new SearcherModel;
        $checkMail = $searcherModel->checkExistEmail($_POST['registerSearcherMail']);
        //
        if ($checkMail) {
            header('Location:?controller=index&action=index');
        } else {
            //
            $insert = $searcherModel->insertSearcher(
                $_POST['registerSearcherMail'],
                $_POST['registerSearcherPass']
            );
            //
            $_POST['mail'] = $_POST['registerSearcherMail'];
            $_POST['pass'] = $_POST['registerSearcherPass'];
            //
            unset($_POST['registerSearcherMail']);
            unset($_POST['registerSearcherPass']);
            //
            $this->login();
        }
    }


    public function checkExistEmail()
    {
        if (!empty($_POST['mailInserted'])) {
            //
            $searcherModel = new SearcherModel;
            $response = $searcherModel->checkExistEmail($_POST['mailInserted']);
            //
            echo $response ? 'Si existe email' : 'No existe email';
            return $response;
        }
    }

    public function logout()
    {
        if ( userSession::getSession()->checkActiveSession() ) {
        userSession::getSession(unserialize($_SESSION['user']))->__destroy();
        header('Location:?controller=index&action=index');
        }
    }

}
