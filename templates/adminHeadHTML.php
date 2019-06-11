<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Patrociname V2.0 | Busca encuentra Sponsor</title>
    <!-- -->
    <!-- JQuery-->
    <script src="web/js/jquery-3.3.1.js"></script>
    <!-- Semantic -->
    <!-- <link rel="stylesheet" type="text/css" href="web/semantic/dist/semantic.min.css"> -->
    <script src="web/semantic/dist/semantic.min.js"></script>
    <!-- Javascript -->
    <script src="web/js/patrociname-charts.js"></script>
    <!-- -->
    <!-- Font Awasone -->
    <link href="web/fontawesome-free-5.8.2-web/css/all.css" rel="stylesheet">
    <!-- ChartJS -->
    <script src="web/node_modules/chart.js/dist/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="web/node_modules/chart.js/dist/Chart.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="web/css/patrociname.css">
    <!-- My Javascript -->
    <script src="web/js/patrociname.js"></script>
    <!-- -->
</head>
<!-- -->

<!-- -->
<body>
<!-- -->
<?php
if (isset($_SESSION)) {
    showPretty($_SESSION);
} else {
    echo '<div>No existe $_SESSION</div>';
}
?>
<!-- -->
<header>
    <div><?php include_once './web/imas/logoPatrociname.php'; ?></div>
    <div><a href="?controller=index&action=index"><h1>Patrociname</h1></a></div>
    <div><h5>V 0.3</h5></div>
    <ul>
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fab fa-linkedin"></i></li>
    </ul>
    </div>
    <!-- -->
    <?php
    if (isset($_SESSION['user'])) {
        ?>
        <div class="contUserTag">
            <div class="btn-show-user" onclick="showContainerUser()">
                <i class="fas fa-user"></i>
            </div>
            <div id="cont-data-user">
                <div><?= $_SESSION['user']->getMailAdmin() ?></div>
                <a href="?controller=admin&action=logout">Logout</a>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- -->
</header>