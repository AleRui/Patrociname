<?php

require_once 'core/BaseController.php';
require_once 'core/Session.php';
require_once 'Model/SponsorBundleModel.php';

class SponsorBundleController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    //MÉTODOS
    public function insertSponsorWay()
    {
        showPretty($_POST);
        if ($_POST['sponsorWay'] && $_POST['sponsoringCost']) {
            //
            $sponsorWay = $_POST['sponsorWay'];
            $sponsoringCost = $_POST['sponsoringCost'];
            //
            //require_once 'config/Session.php';
            //$session = Session::getSession();
            //require_once 'Model/Searcher.php';
            //$searcher = new Searcher();
            session_start();
            showPretty($_SESSION);
            //$idSearcher = unserialize($_SESSION['searcher'])->getIdSearcher();
            // COMPROBAR SI EXÇISTE ESA FORMA DE PATROCINIO ???
            $sponsorBundle = new SponsorBundleModel();
            //
            //$exitSponsorWay = $sponsorBundle->checkExistSponsorWay(
            //	$idSearcher,
            //	$sponsorWay,
            //	$sponsoringCost);
            //
            //if (!$exitSponsorWay) {
            //
            $minIdAvailable = $sponsorBundle->minIdAvailable();
            echo gettype($minIdAvailable);
            showPretty($minIdAvailable);
            echo $minIdAvailable->getMinId().'<br>';
            die();
            // INSERTAR sponsorWay en DB sponsorBundle
            /*$sponsorBundle->insertSponsorWay($minIdAvailable,
                $idSearcher,
                $sponsorWay,
                $sponsoringCost);
            if ($sponsorBundle) {
                header('Location:?controller=searcher&action=index');
            }*/
        } else {
            header('Location:?controller=searcher&action=index');
        }
    }

    /*public function updateSponsorWay() {
        echo 'Estoy en SponsorBundle<br>';
        showPretty($_POST);
        require_once 'Model/SponsorBundleModel.php';
        $sponsorBundle = new SponsorBundleModel();
        $repsonse = $sponsorBundle->updateSponsorWay_two($_POST['idSponsorBundle'],
            $_POST['idSearcher'],
            $_POST['sponsorWay'],
            $_POST['sponsoringCost']);
        if ($repsonse) {
            header('Location:?controller=searcher&action=index');
        } else {
            header('Location:?controller=searcher&action=index');
        }
    }

    public function deleteSponsorWay() {
        require_once 'Model/SponsorBundleModel.php';
        $sponsorBundle = new SponsorBundleModel();
        $repsonse = $sponsorBundle->deleteSponsorWay($_POST['idSponsorBundle'], $_POST['idSearcher']);
        if ($repsonse) {
            header('Location:?controller=searcher&action=index');
        } else {
            header('Location:?controller=searcher&action=index');
        }
    }*/

}