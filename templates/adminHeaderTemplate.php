<?php
//if (isset($_SESSION)) {
//    showPretty($_SESSION);
//} else {
//    echo '<div>No existe $_SESSION</div>';
//}
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