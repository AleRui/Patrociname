<?php
?>
<!-- -->
<?php include_once 'templates/adminHeadHTML.php'; ?>
<!-- -->
    <div class="cont-all-admin-bg"></div>
<!-- -->
<div class="cont-all-admin">
    <!-- -->
    <div class="cont-admin-header">
        <?php include_once 'templates/adminHeaderTemplate.php'; ?>
    </div>
    <!-- -->
    <main class="cont-main-Admin">
        <?php
        if (!empty($_SESSION['user'])) {
            //
            echo '<div class="cont-all-charts">';
            require_once './templates/adminChartsTemplate.php';
            echo '<div>';
            //
        } else {
            //
            echo '<div class="cont-index-forms">';
            //
            require_once './templates/adminLoginTemplate.php';
            //
            echo '</div>';
            //
        }
        ?>
    </main>
    <!-- -->
    <div class="cont-admin-footer">
        <?php require_once './templates/footerTemplate.php'; ?>
    </div>
    <!-- -->
</div>
<!-- -->
<?php include_once 'templates/tailHTML.php'; ?>
<!-- -->

