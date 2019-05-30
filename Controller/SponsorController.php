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
require_once './Model/SponsorModel.php';

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
                userSession::getSession()->setUserSession($userSponsor);
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
        userSession::getSession();
        //
        if ( userSession::getSession()->checkActiveSession() && $_SESSION['user'] ) {
            //
            //showPretty($_SESSION);
            //
            require_once 'Model/SponsorBundleModel.php';
            //$sponsorBundleObj = new SponsorBundleModel();
            //
            //$allSponsorBundle = $sponsorBundleObj->getAllSponsorBundleById($_SESSION['user']->getIdSearcher());
            //
            //$_SESSION['allSponsorBundle'] = serialize($allSponsorBundle);
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

    /*public function sessionStart()
    {
        if ($_POST['mail'] && $_POST['pass']) {
            //
            require_once 'Model/SponsorModel.php';
            $sponsorModel = new SponsorModel;
            $result = $sponsorModel->checkExitSponsor($_POST['mail'], $_POST['pass']);
            if ($result['exist']) {
                // START SESSION
                require_once 'Model/Sponsor.php';
                $sponsor = new Sponsor();
                $sponsor->setIdSponsor($result['objResult'][0]->idSponsor);
                $sponsor->setMailSponsor($result['objResult'][0]->mailSponsor);
                $sponsorSerialized = serialize($sponsor);
                //
                require_once 'config/UserSession.php.php';
                $session = userSession::getSession();
                $session->setSessionValue("sponsor", $sponsorSerialized);
                //
                $this->index();
            } else {
                header('Location:?controller=index&action=index');
            }
        } else {
            header('Location:?controller=index&action=index');
        }
    }*/

    public function checkCIF()
    {
        showPretty($_POST);

        require_once 'config/UserSession.php.php';
        $session = userSession::getSession();
        //
        require_once 'libs/API.php';
        $true_data = runAPI($_POST['cif']);
        //
        /*$false_data = "{\"denominacion\":\"PANADERIA Y CONFITERIA ARTEPAN MALAGA SL.\"," .
            "\"nombreComercial\":[\"SOLO CLIENTES\"],\"domicilioSocial\":\"CA" .
            "LLE ALEJANDRO DUMAS, 17 - BL 1 PISO 2 E\",\"localidad\":\"29004 " .
            "MALAGA (Málaga)\",\"formaJuridica\":\"SOCIEDAD LIMITADA\",\"cnae" .
            "\":\"1071 - Fabricación de pan y de productos frescos de panader" .
            "ía y pastelería\",\"fechaUltimoBalance\":\"2017-12-31\",\"identi" .
            "ficativo\":\"X9999999X\",\"situacion\":\"SOLO CLIENTES\",\"telef" .
            "ono\":[999999999],\"fax\":[999999999],\"web\":[\"http://www.exam" .
            "ple.com\"],\"email\":\"example@example.com\",\"cargoPrincipal\":" .
            "\"SOLO CLIENTES\",\"capitalSocial\":1.7976931348623157E308,\"ven" .
            "tas\":1.7976931348623157E308,\"anioVentas\":1970,\"empleados\":9" .
            "223372036854775807,\"fechaConstitucion\":\"YYYY-MM-DD\"}";
        */
        //
        $data = json_decode($true_data);
        //
        showPretty($data);
        //
        if ($data->denominacion) {
            echo $data->denominacion . '<br>';
            $_SESSION['info_empresa'] = $data;
            header('Location:?controller=sponsor&action=index');
        } else {
            $_SESSION['checkNIF'] = false;
            header('Location:?controller=sponsor&action=index');
        }
    }

    public function findSearcher()
    {
        require_once 'config/UserSession.php.php';
        $session = userSession::getSession();
        require_once 'Model/Sponsor.php';
        $idSponsor = (unserialize($_SESSION['sponsor']))->getIdSponsor();
        //
        require_once 'Model/SponsorModel.php';
        $sponsorModel = new SponsorModel();
        $listSponsorBundle = $sponsorModel->getAllPosible($idSponsor);
        //
        //COMPROBAR QUE EL PATROCINIO NO HA SIDO COMPRADO YA
        //
        $_SESSION['listSponsorBundle'] = array('show' => true, 'list' => $listSponsorBundle);
        //
        header('Location:?controller=sponsor&action=index');
    }

    public function hidefindSearcher()
    {
        require_once 'config/UserSession.php.php';
        $session = userSession::getSession();
        unset($_SESSION['listSponsorBundle']);
        header('Location:?controller=sponsor&action=index');
    }

    public function buySponsoring()
    {
        //
        require_once 'config/UserSession.php.php';
        $session = userSession::getSession();
        require_once 'Model/Sponsor.php';
        $sponsor = unserialize($_SESSION['sponsor']);
        $idSponsor = $sponsor->getIdSponsor();
        //
        showPretty($_POST);
        //
        $idSponsorBundle = $_POST['idSponsorBundle'];
        //
        require_once 'Model/sponsorBuySponsoringModel.php';
        $purchase = new sponsorBuySponsoringModel();
        $checkInsert = $purchase->buySponsoring($idSponsorBundle, $idSponsor);
        if ($checkInsert) {
            header('Location:?controller=sponsor&action=findSearcher');
        }
    }

    /*public function logout()
    {
        require_once 'config/UserSession.php.php';
        $session = userSession::getSession();
        $session->close();
        if ($session->checkActiveSession() === false) {
            header('Location:?controller=index&action=index');
        }
    }*/
}
