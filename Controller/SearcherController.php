<?php


/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 27/10/18
 * Time: 20:31
 */

require_once 'core/BaseController.php';
require_once 'core/Session.php';
require_once 'Model/Searcher.php';
require_once './Model/SearcherModel.php';

class SearcherController extends BaseController
{
    private $table = 'searcher';

    public function __construct()
    {
        parent::__construct();
    }

    //METODOS

    /**
     * Login | StartSession
     */
    public function sessionStart()
    {
        //showPretty($_POST);
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $searcher = new SearcherModel($this->table);
            $result = $searcher->checkExitSearcher($_POST['mail'], $_POST['pass']);
            //
            if (count($result)) {
                Session::getSession(serialize($result[0]));
            }
        }
        $this->index();
    }

    /**
     * Send Index Searcher
     */
    public function index()
    {
        // COMPROBAR SI LA SESIÓN EXISTE Y ES VALIDA ???
        // AHORA MISMO SOLO COMPRUEBA QUE EXISTA
        //
        //echo ($_SESSION) ? 'Existe $_SESSION<br>' : 'NO Existe $_SESSION<br>';
        //
        if ($_SESSION /*&& Session::getSession($_SESSION['user'])->checkActiveSession()*/) {
            //
            $idSearcher = (unserialize($_SESSION['user']))->getIdSearcher();
            //
            require_once 'Model/SponsorBundleModel.php';
            $sponsorBundleObj = new SponsorBundleModel();
            //
            $_SESSION['sponsorBundle'] = serialize($sponsorBundleObj->getAllSponsorBundleById($idSearcher));
            //
            $this->view('searcher');
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
            $this->sessionStart();
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
        Session::getSession(unserialize($_SESSION['user']))->__destroy();
        //
        header('Location:?controller=index&action=index');
    }

}
