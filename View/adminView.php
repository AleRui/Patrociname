<?php
if (!empty($_SESSION['user'])) {
    //
    showPretty($_SESSION);
    ?>
    <!-- -->
    <h1>Administrador:</h1>
    <!-- -->
    <?php require_once './templates/adminHeaderTemplate.php'; ?>
    <!-- -->
    <?php
} else {
    ?>
    <!-- -->
    <h1>Debe loguearse:</h1>
    <!-- -->
    <?php require_once './templates/adminLoginTemplate.php'; ?>
    <!-- -->
    <?php
}
?>


