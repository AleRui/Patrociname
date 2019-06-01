<?php include_once 'templates/headHTML.php'; ?>

<?php
if (!empty($_SESSION)) {
    echo 'Existe Session';
    showPretty($_SESSION);
}
?>
    <!-- -->
    <div class="ui grid container">
        <!-- -->
        <div class="two column row">
            <!-- -->
            <?php require_once './templates/searcherRegisterTemplate.php'; ?>
            <!-- -->
            <?php require_once './templates/searcherLoginTemplate.php'; ?>
        </div>
        <!-- -->
        <div class="two column row">
            <!-- -->
            <?php require_once './templates/sponsorRegisterTemplate.php'; ?>
            <!-- -->
            <?php require_once './templates/sponsorLoginTemplate.php'; ?>
        </div>
    </div>
    <!-- -->
    <div class="ui grid container api">
        <div class="ui row">
            <div class="ui stackable two column">
                <!-- -->
                <?php require_once './templates/apiIndexTemplate.php'; ?>
            </div>
        </div>
    </div>
    <!-- -->

<?php include_once 'templates/footerHTML.php'; ?>