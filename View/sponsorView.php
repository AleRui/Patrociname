<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 20:50
 */
require_once 'templates/headHTML.php';
require_once 'Model/Sponsor.php';
//showPretty($_SESSION);
//
?>
  <!-- -->
<?php require_once './templates/sponsorHeaderTemplate.php'; ?>
  <!-- -->
<?php require_once './templates/sponsorApiCheckNifTemplate.php'; ?>
  <!-- -->
<?php require_once './templates/sponsorAvailableBundlesTemplate.php'; ?>
  <!-- -->
<?php require_once './templates/sponsorBoughtBundlesTemplates.php'; ?>
  <!-- -->
<?php include_once 'templates/footerHTML.php'; ?>