<?php

require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/SponsorBundleModel.php';
require_once 'SearcherController.php';
require_once 'core/UserSession.php';

class SponsorBundleController extends BaseController
{

    private $controller = 'sponsorBundle';

    public function __construct()
    {
        parent::__construct($this->controller);
    }

    //MÉTODOS

    /**
     *
     */
    public function insertSponsorBundle()
    {
        echo 'Estoy en insertSponsorBundle()';
        showPretty($_POST);
        //
        //echo 'Sesion Activa:'. UserSession::getSession()->checkActiveSession().'<br>';
        //
        // Checkers
        $canInsert = true;

        if (!$_POST['sponsorWay'] || !$_POST['sponsoringCost']) {
            $canInsert = false;
            echo ' Faltan datos en $_POST<br>';
        }
        //
        if (!UserSession::getSession()->checkActiveSession()) {
            $canInsert = false;
            echo ' La session no está activa<br>';

        }
        //
        //echo 'Valor de los chekers: ' . $canInsert . '<br>';
        //
        if ($canInsert) {
            //
            require_once './Model/Searcher.php';
            $sponsorBundle = new SponsorBundle();
            $sponsorBundleModel = new SponsorBundleModel();
            //
            $imagePath = '';
            //
            //showPretty($_FILES);
            //echo $_FILES['sponsorIma']['name'].'<br>';
            //
            // Comprobar imagenes // REFACTORIZAR
            if (!empty($_FILES['sponsorIma']['name'])) {
                //
                //echo 'Ha entrado $_FILES';
                //
                $dir_imas = 'assets/sponsorImas/';
                //
                $imagePath = $dir_imas . basename($_FILES["sponsorIma"]["name"]);
                //echo '$imagePath: ' . $imagePath . '<br>';
                //
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["sponsorIma"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".<br>";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }
                //
                /*if (file_exists($imagePath)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }*/
                //
                if ($_FILES["sponsorIma"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                //
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                //
                //echo '$uploadOk: '.$uploadOk.'<br>';
                //
                if ($uploadOk === 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["sponsorIma"]["tmp_name"], $imagePath)) {
                        echo "The file " . basename($_FILES["sponsorIma"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            //
            //die();
            //showPretty($_SESSION);
            //echo 'minIDAvailable: ' . $sponsorBundleModel->minIdAvailable()->getMinId() ;
            $sponsorBundle->setIdSponsorBundle($sponsorBundleModel->minIdAvailable()->getMinId());
            $sponsorBundle->setIdSearcher($_SESSION['user']->getIdSearcher());
            $sponsorBundle->setSponsorWay($_POST['sponsorWay']);
            $sponsorBundle->setSponsoringCost($_POST['sponsoringCost']);
            $sponsorBundle->setSponsorIma($imagePath);
            showPretty($sponsorBundle);
            //
            $insertSponsorBundle = $sponsorBundleModel->insertSponsorBundle(
                $sponsorBundle
            //$sponsorBundle->minIdAvailable()->getMinId(),
            //(unserialize($_SESSION['user']))->getIdSearcher(),
            //$_POST['sponsorWay'],
            //$_POST['sponsoringCost']
            );
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
        //
        $sponsorBundle = new SponsorBundleModel();
        $res = $sponsorBundle->updateSponsorBundle(
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