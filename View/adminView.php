<?php
?>
<!-- -->
<?php include_once 'templates/adminHeadHTML.php'; ?>
<!-- -->

<?php
if (!empty($_SESSION['user'])) {
    //
    //showPretty($_SESSION);
    ?>
    <!-- -->
    <h1>Administrador:</h1>
    <!-- -->
    <?php require_once './templates/adminChartsTemplate.php'; ?>
    <!-- -->
    <?php
} else {
    ?>
    <!-- -->
    <div class="cont-index-forms">
        <!-- -->
        <?php require_once './templates/adminLoginTemplate.php'; ?>
        <!-- -->
    </div>
    <!-- -->
    <?php
}
?>
<!-- -->
<?php include_once 'templates/tailHTML.php'; ?>
<!-- -->

