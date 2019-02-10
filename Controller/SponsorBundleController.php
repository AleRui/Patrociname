<?php

require_once 'core/BaseController.php';

class SponsorBundleController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	//MÉTODOS
	public function insertSponsorWay() {
		if ($_POST['sponsorWay'] && $_POST['sponsoringCost']) {
			//
			$sponsorWay = $_POST['sponsorWay'];
			$sponsoringCost = $_POST['sponsoringCost'];
			//
			require_once 'config/Session.php';
			$session = Session::getSession();
			require_once 'Model/Searcher.php';
			$searcher = new Searcher();
			$idSearcher = unserialize($_SESSION['searcher'])->getIdSearcher();
			//
			require_once 'Model/SponsorBundleModel.php';
			$sponsorBundle = new SponsorBundleModel();
			//
			$exitSponsorWay = $sponsorBundle->checkExistSponsorWay(
				$idSearcher,
				$sponsorWay,
				$sponsoringCost);
			//
			if (!$exitSponsorWay) {
				//
				$minIdAvailable = $sponsorBundle->checkAvailableIDSponsorBundle();
				// INSERTAR sponsorWay en DB sponsorBundle
				$sponsorBundle->insertSponsorWay($minIdAvailable,
					$idSearcher,
					$sponsorWay,
					$sponsoringCost);
				if ($sponsorBundle) {
					header('Location:?controller=searcher&action=index');
				}
			} else {
				header('Location:?controller=searcher&action=index');
			}

		} else {
			header('Location:?controller=searcher&action=index');
		}
	}

	public function updateSponsorWay() {
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
	}

}