<?php


/**
 * Created by PhpStorm.
 * User: Ale Ruiz
 * Date: 27/10/18
 * Time: 20:31
 */

require_once 'core/BaseController.php';
require_once 'Model/Searcher.php';
require_once './Model/SearcherModel.php';
require_once 'core/Session.php';

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
        echo ($_SESSION) ? 'Existe $_SESSION<br>' : 'NO Existe $_SESSION<br>';
        //
        if ($_SESSION && Session::getSession($_SESSION['user'])->checkActiveSession()) {
            //
            $idSearcher = (unserialize($_SESSION['user']))->getIdSearcher();
            //
            require_once 'Model/SponsorBundleModel.php';
            $sponsorBundleObj = new SponsorBundleModel();
            $sponsorBundle = $sponsorBundleObj->getAllSponsorBundleById($idSearcher);

            if (!empty($sponsorBundle) /*&& count($sponsorBundle) > 0*/) {
                $_SESSION['sponsorBundle'] = serialize($sponsorBundle);
            }
            //
            $this->view('searcher');
            //
        } else {
            //
            header('Location:?controller=index&action=index');
            //
        }
    }

    /*public function registerSearcher()
    {
        //
        require_once 'Model/SearcherModel.php';
        $searcherModel = new SearcherModel;
        $response = $searcherModel->checkExistEmail($_POST['registerSearcherMail']);
        //
        if ($response) {
            header('Location:?controller=index&action=index');
        } else {
            //
            require_once 'Model/SearcherModel.php';
            $searcher = new SearcherModel();
            $response = $searcher->insertSearcher(
                $_POST['registerSearcherMail'],
                $_POST['registerSearcherPass']
            );
            //
            if ($response['checkInsert']) {
                // START SESSION
                require_once 'Model/Searcher.php';
                $searcher = new Searcher();
                $searcher->setIdSearcher($response['idSearcher']);
                $searcher->setMailSearcher($_POST['registerSearcherMail']);
                $searcherSerialized = serialize($searcher);
                //
                require_once 'config/Session.php';
                $session = Session::getSession();
                $session->setSessionValue("searcher", $searcherSerialized);
                //
                $this->index();
            } else {
                //header('Location:?controller=index&action=index');
            }
        }
    }


    public function checkExistEmail()
    {
        //echo $_POST['mailInserted'];
        if (!empty($_POST['mailInserted'])) {
            $mail = $_POST['mailInserted'];
            require_once 'Model/SearcherModel.php';
            $searcherModel = new SearcherModel;
            $response = $searcherModel->checkExistEmail($mail);
            echo $response ? 'Si existe email' : 'No existe email';
            return $response;
        }
    }*/

    public function logout()
    {
        //echo 'Estoy en Searcher Logout<br>';
        session_start();
        Session::getSession(unserialize($_SESSION['user']))->__destroy();
        //
        header('Location:?controller=index&action=index');
    }

}
