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

    /**
     * Login | StartSession
     */

    public function login()
    {
        //showPretty($_POST);
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $searcherModel = new SearcherModel($this->controller);
            $userSearcher = $searcherModel->checkExitSearcher($_POST['mail'], $_POST['pass'])[0];
            //
            //echo gettype($userSearcher);
            //showPretty($userSearcher);
            //
            if ( !empty($userSearcher) && $userSearcher->getIdSearcher() ) {
                // Crear session de usuario
                userSession::getSession(/*$result[0]*/);
                userSession::getSession()->setUserSession($userSearcher);
                //
                //showPretty($_SESSION);
                //die();
                header('Location:?controller=searcher&action=index');
                //$this->index();
                //showPretty($_SESSION);
                //header('Location:?controller=searcher&action=index');
            } else {
                //Habría que añadir un flag de usuario no valido
                header('Location:?controller=index&action=index');
            }
            //SI el usuario esta bien crear sessión
            //
            /*if (count($result)) {
                userSession::getSession(serialize($result[0]));
            }*/
        } else {
            //Habría que añadir un flag de usuario no valido
            header('Location:?controller=index&action=index');
        }
    }

    /**
     * Send Index Searcher
     */
    public function index()
    {
        //echo 'Estoy en SearcherController ->  index<br>';
        userSession::getSession();
        //
        //echo 'Sesión Activa: '.userSession::getSession()->checkActiveSession();
        //showPretty($_SESSION);
        //die();
        if ( userSession::getSession()->checkActiveSession() && $_SESSION['user'] ) {
            //
            showPretty($_SESSION);
            //$idSearcher = (unserialize($_SESSION['user']))->getIdSearcher();
            //
            require_once 'Model/SponsorBundleModel.php';
            $sponsorBundleObj = new SponsorBundleModel();
            //
            //showPretty($sponsorBundleObj->getAllSponsorBundleById($_SESSION['user']->getIdSearcher()));
            $allSponsorBundle = $sponsorBundleObj->getAllSponsorBundleById($_SESSION['user']->getIdSearcher());
            //showPretty($allSponsorBundle);
            $_SESSION['allSponsorBundle'] = serialize($allSponsorBundle);
            //die();
            $this->view($this->controller);
            //header('Location:?controller=searcher&action=view');
            //
        } else {
            //
            header('Location:?controller=index&action=index');
            //
        }
    }

    public function registerSearcher()
    {
        //
        $searcherModel = new SearcherModel;
        $checkMail = $searcherModel->checkExistEmail($_POST['registerSearcherMail']);
        //
        if ($checkMail) {
            //
            // flag anunciando que exite mail?
            //
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

    /**
     * @return |null
     */
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
        session_start();
        userSession::getSession(unserialize($_SESSION['user']))->__destroy();
        //
        header('Location:?controller=index&action=index');
    }

}
