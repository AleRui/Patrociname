<?php


if (!empty($_SESSION)) {
    echo 'Existe Session';
    showPretty($_SESSION);
    ?>
    <!-- -->
    <h1>El administrador existe y es: </h1>
    <!-- -->
    <?php
} else {
    echo 'No existe usuario';
    ?>
    <!-- -->
    <h1>Administrador:</h1>
    <!-- -->
    <?php require_once './templates/adminLoginTemplate.php'; ?>
    <!-- -->
<?php
}
?>


