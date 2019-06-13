<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/SponsorBundleModel.php';
require_once 'SearcherController.php';
require_once 'core/UserSession.php';
require_once 'libs/funct.php';

class SponsorBundleController extends BaseController
{

    private $controller = 'sponsorBundle';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    public function insertSponsorBundle()
    {
        $canInsert = true;

        if (!$_POST['sponsorWay'] || !$_POST['sponsoringCost']) {
            $canInsert = false;
        }

        if (!UserSession::getSession()->checkActiveSession()) {
            $canInsert = false;
        }

        if ($canInsert) {

            require_once './Model/Searcher.php';
            $sponsorBundle = new SponsorBundle();
            $sponsorBundleModel = new SponsorBundleModel();

            $imagePath = '';

            $fileUploaded = $_FILES["sponsorIma"];

            if (!empty($fileUploaded['name'])) {

                $dir_imas = 'assets/sponsorImas/';

                $imagePath = $dir_imas . basename($fileUploaded["name"]);

            }

            $sponsorBundle->setIdSearcher($_SESSION['user']->getIdSearcher());
            $sponsorBundle->setSponsorWay($_POST['sponsorWay']);
            $sponsorBundle->setSponsoringCost($_POST['sponsoringCost']);
            $sponsorBundle->setSponsorDuration($_POST['sponsorDuration']);
            $sponsorBundle->setSponsorIma($imagePath);

            $sponsorBundleModel->insertSponsorBundle($sponsorBundle);

            header('Location:?controller=searcher&action=index');

        } else {

            header('Location:?controller=index&action=index');

        }
    }


    public function updateSponsorBundle()
    {
        $canInsert = true;

        if (
            !$_POST['idSponsorBundle'] ||
            !$_POST['sponsorWay'] ||
            !$_POST['sponsoringCost']
        ) {
            $canInsert = false;
        }

        if (!UserSession::getSession()->checkActiveSession()) {
            $canInsert = false;
        }
        //
        if ($canInsert) {

            require_once './Model/Searcher.php';
            $sponsorBundle = new SponsorBundle();
            $sponsorBundleModel = new SponsorBundleModel();

            $imagePath = '';

            $fileUploaded = $_FILES["sponsorImaInput"];

            if (!empty($fileUploaded['name'])) {

                $dir_imas = 'assets/sponsorImas/';

                $imagePath = $dir_imas . basename($fileUploaded["name"]);
            }

            if (empty($imagePath)) {
                $imagePath = $_POST['sponsorIma'];
            }

            $sponsorBundle->setIdSponsorBundle($_POST['idSponsorBundle']);
            $sponsorBundle->setSponsorWay($_POST['sponsorWay']);
            $sponsorBundle->setSponsoringCost($_POST['sponsoringCost']);
            $sponsorBundle->setSponsorIma($imagePath);
            $sponsorBundle->setSponsorDuration($_POST['sponsorDuration']);

            $sponsorBundleModel->updateSponsorBundle($sponsorBundle);

            header('Location:?controller=searcher&action=index');

        } else {

            header('Location:?controller=index&action=index');

        }
    }


    public function deleteSponsorBundle()
    {
        if (UserSession::getSession()->checkActiveSession()) {

            $sponsorBundle = new SponsorBundleModel();

            $sponsorBundle->deleteBundle($_POST['idSponsorBundle']);

            header('Location:?controller=searcher&action=index');
        }

    }

}