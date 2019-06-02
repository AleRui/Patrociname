<?php
if (!empty($_SESSION)) {
    echo 'Existe Session';
    showPretty($_SESSION);
}
?>

<?php include_once 'templates/headHTML.php'; ?>
    <!-- -->
    <button class="btn-showRegSearcher" onclick="showRegSearcher()">Registrar Searcher</button>
    <button class="btn-showLogSearcher" onclick="showLogSearcher()">Login Searcher</button>
    <button class="btn-showRegSponsor" onclick="showRegSponsor()">Registrar Sponsor</button>
    <button class="btn-showLogSponsor" onclick="showLogSponsor()">Login Sponsor</button>
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