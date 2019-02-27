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

    /**
     *
     */
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
            //
            //if ($res) { ENVIAR algún FLAG ??? }//
            //
            $searcher = new SearcherController();
            $searcher->index();
        }
    }

    /**
     *
     */
    public function updateSponsorBundle()
    {
        //
        $sponsorBundle = new SponsorBundleModel();
        $repsonse = $sponsorBundle->updateSponsorBundle(
            $_POST['idSponsorBundle'],
            $_POST['sponsorWay'],
            $_POST['sponsoringCost']);
        //
        //if ($res) { ENVIAR algún FLAG ??? }//
        //
        session_start();
        $searcher = new SearcherController();
        $searcher->index();
    }

    /**
     *
     */
    public function deleteSponsorBundle()
    {
        //
        $sponsorBundle = new SponsorBundleModel();
        $res = $sponsorBundle->deleteBundle($_POST['idSponsorBundle']/*, $_POST['idSearcher']*/);
        //
        //if ($res) { ENVIAR algún FLAG ??? }//
        //
        session_start();
        $searcher = new SearcherController();
        $searcher->index();
    }

}