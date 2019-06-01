<?php
include_once 'templates/headHTML.php';
//require_once './Model/Searcher.php';
//require_once './Model/SponsorBundle.php';

?>

    <main class="container">

        <?php require_once './templates/searcherHeaderTemplate.php'; ?>

        <!-- -->

        <?php require_once './templates/searcherAddSponsorWayTemplate.php'; ?>

        <!-- -->

        <?php require_once './templates/searcherCreatedBundleTemplate.php'; ?>

        <!-- -->

    </main>

<?php include_once 'templates/footerHTML.php'; ?>