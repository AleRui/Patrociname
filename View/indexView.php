<?php
if (!empty($_SESSION)) {
    echo 'Existe Session';
    showPretty($_SESSION);
}
?>

<?php include_once 'templates/headHTML.php'; ?>
    <!-- -->
    <button id="btnShow-cont-searcher-register" class="btn-showRegSearcher" onclick="showContainer(this)">Registrar Searcher</button>
    <button id="btnShow-cont-searcher-login" class="btn-showLogSearcher" onclick="showContainer(this)">Login Searcher</button>
    <button id="btnShow-cont-sponsor-register" class="btn-showRegSponsor" onclick="showContainer(this)">Registrar Sponsor</button>
    <button id="btnShow-cont-sponsor-login" class="btn-showLogSponsor" onclick="showContainer(this)">Login Sponsor</button>
    <!-- -->
<?php require_once './templates/searcherRegisterTemplate.php'; ?>
    <!-- -->
<?php require_once './templates/searcherLoginTemplate.php'; ?>
    <!-- -->
    <!-- -->
<?php require_once './templates/sponsorRegisterTemplate.php'; ?>
    <!-- -->
<?php require_once './templates/sponsorLoginTemplate.php'; ?>
    <!-- -->
<?php require_once './templates/searcherApiIndexTemplate.php'; ?>
    <!-- -->

<?php include_once 'templates/footerHTML.php'; ?>