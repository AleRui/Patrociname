<?php

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

    //MÉTODOS

    public function insertSponsorBundle()
    {
        $canInsert = true;
        //
        if (!$_POST['sponsorWay'] || !$_POST['sponsoringCost']) {
            $canInsert = false;
        }
        //
        if (!UserSession::getSession()->checkActiveSession()) {
            $canInsert = false;
        }
        //
        if ($canInsert) {
            //
            require_once './Model/Searcher.php';
            $sponsorBundle = new SponsorBundle();
            $sponsorBundleModel = new SponsorBundleModel();
            //
            $imagePath = '';
            //
            $fileUploaded = $_FILES["sponsorIma"];
            //
            if (!empty($fileUploaded['name'])) {
                //
                $dir_imas = 'assets/sponsorImas/';
                //
                $imagePath = $dir_imas . basename($fileUploaded["name"]);
                echo $imagePath . '<br>';
                //
                echo 'Archivo valido: ' . checkFileUploadValid($fileUploaded, $imagePath) . '<br>';
                //
                if (!checkFileUploadValid($fileUploaded, $imagePath)) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($fileUploaded["tmp_name"], $imagePath)) {
                        echo "The file " . basename($fileUploaded["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            // Date
            $createdDate = date('Y-m-d H:i:s');
            echo 'Fecha de creación: '.$createdDate.'<br>';
            //
            //$sponsorBundle->setIdSponsorBundle($sponsorBundleModel->minIdAvailable()->getMinId());
            $sponsorBundle->setIdSearcher($_SESSION['user']->getIdSearcher());
            $sponsorBundle->setSponsorWay($_POST['sponsorWay']);
            $sponsorBundle->setSponsoringCost($_POST['sponsoringCost']);
            $sponsorBundle->setSponsorDuration($_POST['sponsorDuration']);
            $sponsorBundle->setSponsorIma($imagePath);
            $sponsorBundle->setSponsorDateCreated($createdDate);
            //showPretty($sponsorBundle);
            //die();
            //
            $insertSponsorBundle = $sponsorBundleModel->insertSponsorBundle($sponsorBundle);
            //
            header('Location:?controller=searcher&action=index');
        } else {
            header('Location:?controller=index&action=index');
        }
    }

    /**
     *
     */
    public function updateSponsorBundle()
    {
        $canInsert = true;
        //
        if (
            !$_POST['idSponsorBundle'] ||
            !$_POST['sponsorWay'] ||
            !$_POST['sponsoringCost']
        ) {
            $canInsert = false;
            //echo ' Faltan datos en $_POST<br>';
        }
        //
        if (!UserSession::getSession()->checkActiveSession()) {
            $canInsert = false;
        }
        //
        if ($canInsert) {

            require_once './Model/Searcher.php';
            $sponsorBundle = new SponsorBundle();
            $sponsorBundleModel = new SponsorBundleModel();
            //
            // FILE Image Uploaded
            $imagePath = '';
            //
            $fileUploaded = $_FILES["sponsorImaInput"];
            //
            if (!empty($fileUploaded['name'])) {
                //
                $dir_imas = 'assets/sponsorImas/';
                //
                $imagePath = $dir_imas . basename($fileUploaded["name"]);
                echo $imagePath . '<br>';
                //
                if (!checkFileUploadValid($fileUploaded, $imagePath)) {
                    echo "Sorry, your file was not uploaded."; // Lanzar en un flag
                } else {
                    if (move_uploaded_file($fileUploaded["tmp_name"], $imagePath)) {
                        echo "The file " . basename($fileUploaded["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            //
            if (empty($imagePath)) {
                $imagePath = $_POST['sponsorIma'];
            }
            //
            $sponsorBundle->setIdSponsorBundle($_POST['idSponsorBundle']);
            $sponsorBundle->setSponsorWay($_POST['sponsorWay']);
            $sponsorBundle->setSponsoringCost($_POST['sponsoringCost']);
            $sponsorBundle->setSponsorIma($imagePath);
            $sponsorBundle->setSponsorDuration($_POST['sponsorDuration']);
            //
            $insertSponsorBundle = $sponsorBundleModel->updateSponsorBundle($sponsorBundle);
            //
            header('Location:?controller=searcher&action=index');
        } else {
            header('Location:?controller=index&action=index');
        }
    }


    public function deleteSponsorBundle()
    {
        if (UserSession::getSession()->checkActiveSession()) {
            //
            $sponsorBundle = new SponsorBundleModel();
            $response = $sponsorBundle->deleteBundle($_POST['idSponsorBundle']);
            //
            header('Location:?controller=searcher&action=index');
        }

    }

}