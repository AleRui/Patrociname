<!-- -->
<?php include_once 'templates/headHTML.php'; ?>
<!-- -->
<div class="cont-searcher-bg"></div>
<!-- -->
<?php
//if (isset($_SESSION)) {
//    showPretty($_SESSION);
//} else {
//    echo '<div>No existe $_SESSION</div>';
//}
?>
<!-- -->
<header>
    <div><?php include_once './web/imas/logoPatrocinameAnimate.php'; ?></div>
    <div><a href="?controller=index&action=index"><h1>Patrociname</h1></a></div>
    <div><h5>V 0.3</h5></div>
    <ul>
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fab fa-linkedin"></i></li>
    </ul>
    <?php require_once './templates/searcherHeaderTemplate.php'; ?>
</header>
<!-- -->
<main class="mainSearcher">
    <!-- -->
    <?php require_once './templates/searcherAddSponsorWayTemplate.php'; ?>
    <!-- -->
    <?php require_once './templates/searcherCreatedBundleTemplate.php'; ?>
    <!-- -->
</main>
<!-- -->
<div class="cont-index-footer">
    <?php require_once './templates/footerTemplate.php'; ?>
</div>
<!-- -->
<?php include_once 'templates/tailHTML.php'; ?>