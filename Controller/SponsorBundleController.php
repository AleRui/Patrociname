<?php

require_once 'core/BaseController.php';
require_once 'core/Session.php';
require_once 'Model/SponsorBundleModel.php';
require_once 'SearcherController.php';

class SponsorBundleController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    //MÉTODOS
    public function insertSponsorWay()
    {
        if ($_POST['sponsorWay'] && $_POST['sponsoringCost']) {
            //
            session_start();
            $sponsorBundle = new SponsorBundleModel();
            //
            require_once './Model/Searcher.php';
            //
            $res = $sponsorBundle->insertSponsorBundle(
                $sponsorBundle->minIdAvailable()->getMinId(),
                (unserialize($_SESSION['user']))->getIdSearcher(),
                $_POST['sponsorWay'],
                $_POST['sponsoringCost']
            );
            //if ($res) {
            //  ENVIAR algún FLAG ???
            //}
            //
            $searcher = new SearcherController();
            $searcher->index();
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