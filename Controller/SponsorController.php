<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 20:37
 */

require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/Sponsor.php';
require_once 'Model/SponsorModel.php';
require_once 'Model/SponsorBundleModel.php';
require_once 'Model/SponsorBuySponsoring.php';
require_once 'Model/SponsorBuySponsoringModel.php';
require_once 'Model/ApiModel.php';

class SponsorController extends BaseController
{
    private $controller = 'sponsor';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    //METODOS
    public function login()
    {
        if ($_POST['mail'] && $_POST['pass']) {
            //
            $sponsorModel = new SponsorModel($this->controller);
            $userSponsor = $sponsorModel->checkExitSponsor($_POST['mail'], $_POST['pass'])[0];
            //
            if (!empty($userSponsor) && $userSponsor->getIdSponsor()) {
                //
                userSession::getSession();
                userSession::getSession()->setUserSession($userSponsor, $this->controller);
                //
                header('Location:?controller=sponsor&action=index');
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
        if (userSession::getSession()->checkActiveSession() && $_SESSION['user']) {
            //
            $idSponsor=  $_SESSION['user']->getIdSponsor();
            //
            $sponsorBundleModel = new SponsorBundleModel();
            //
            $allSponsorBought = $sponsorBundleModel->getAllBoughtBundle($idSponsor);
            //
            $_SESSION['allSponsorBought'] = $allSponsorBought;
            //
            $this->view($this->controller);
        } else {
            header('Location:?controller=index&action=index');
        }
    }


    public function registerSponsor()
    {
        $sponsorModel = new SponsorModel;
        $checkMail = $sponsorModel->checkExistEmail($_POST['registerSponsorMail']);
        //
        //
        if ($checkMail) {
            header('Location:?controller=index&action=index');
        } else {
            //
            $insert = $sponsorModel->insertSponsor(
                $_POST['registerSponsorMail'],
                $_POST['registerSponsorPass']
            );
            //
            $_POST['mail'] = $_POST['registerSponsorMail'];
            $_POST['pass'] = $_POST['registerSponsorPass'];
            //
            unset($_POST['registerSponsorMail']);
            unset($_POST['registerSponsorPass']);
            //
            $this->login();
        }
    }


    public function checkExistEmail()
    {
        if (!empty($_POST['mailInserted'])) {
            //
            $sponsorModel = new SponsorModel;
            $response = $sponsorModel->checkExistEmail($_POST['mailInserted']);
            //
            echo $response ? 'Si existe email' : 'No existe email';
            return $response;
        }
    }


    public function checkCIF()
    {
        //
        if (userSession::getSession()->checkActiveSession()) {
            //
            $trueData = runAPI($_POST['cif']);
            //
            $data = json_decode($trueData);
            //
            if ($data->denominacion) {
                echo $data->denominacion . '<br>';
                $_SESSION['info_empresa'] = $data;
                header('Location:?controller=sponsor&action=index');
            } else {
                $_SESSION['checkNIF'] = false;
                header('Location:?controller=sponsor&action=index');
            }
        } else {
            header('Location:?controller=index&action=index');
        }
    }


    public function hideDataCIF() {
        //
        if (userSession::getSession()->checkActiveSession()) {
            //
            unset($_SESSION['info_empresa']);
            header('Location:?controller=sponsor&action=index');
        } else {
            header('Location:?controller=index&action=index');
        }
    }


    public function findAllAvailableBundle()
    {
        if (userSession::getSession()->checkActiveSession()) {
            //
            $idSponsor = $_SESSION['user']->getIdSponsor();
            //
            $sponsorBundleModel = new SponsorBundleModel();
            $numAvailableBundle = count($sponsorBundleModel->getAllAvailableBundle($idSponsor));
            //
            // PAGINATION
            //
            $numBundlesByPage = 8;
            $page = ( isset($_GET['page']) ) ? $_GET['page'] : 1;
            //echo 'Page: '.$page.'<br>';
            $totalPages = ceil($numAvailableBundle / $numBundlesByPage);
            //
            // Validaciones de GET
            if ( is_int( $page ) ) {
                header('Location:?controller=sponsor&action=findAllAvailableBundle&page=1');
            }

            if ( (int)$page < 1 ) {
                header('Location:?controller=sponsor&action=findAllAvailableBundle&page=1');
            }

            if ( (int)$page > (int)$totalPages ) {
                header('Location:?controller=sponsor&action=findAllAvailableBundle&page='.$totalPages);
            }
            //
            $beginSearch = ( (int)$page - 1) * $numBundlesByPage;
            //echo '$beginSearch: '.$beginSearch.'<br>';
            //echo '$totalPages: '.$totalPages.'<br>';
            //
            $allAvailableBundle = $sponsorBundleModel->getAllAvailableBundleByPage($idSponsor, $beginSearch, $numBundlesByPage);
            //
            $_SESSION['allAvailableBundle'] = array(
                'show' => true,
                'totalPages' => $totalPages,
                'list' => $allAvailableBundle,
                'actualPage' => $page
            );
            //
            //echo 'Total de SponsorBundles Disponibles: '.count($allAvailableBundle);
            //die();
            $this->index();
            //
            //header('Location:?controller=sponsor&action=index');
        } else {
            header('Location:?controller=index&action=index');
        }
    }

    public function hideAllAvailableBundle()
    {
        //
        if (userSession::getSession()->checkActiveSession()) {
            //
            unset($_SESSION['allAvailableBundle']);
            header('Location:?controller=sponsor&action=index');
        } else {
            header('Location:?controller=index&action=index');
        }
    }

    public function buySponsoring()
    {
        //
        if (userSession::getSession()->checkActiveSession()) {
            //
            $idSponsor = $_SESSION['user']->getIdSponsor();
            //
            $idSponsorBundle = $_POST['idSponsorBundle'];
            //
            $sponsorBuySponsoringModel = new sponsorBuySponsoringModel();
            //
            $sponsorBuySponsoringModel->buySponsoring($idSponsorBundle, $idSponsor);
            //
            $this->hideAllAvailableBundle();
            //
            header('Location:?controller=sponsor&action=findSearcher');
        } else {
            header('Location:?controller=index&action=index');
        }
    }


}
