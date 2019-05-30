<?php

require_once './Model/Sponsor.php';

if ($_SESSION) {
    //showPretty($_SESSION);
    //showPretty()$_SESSION['user'];
}

?>
<div class="ui container">
    <!-- -->
    <div class="ui grid">
        <div class="four column row">
            <div class="left floated column">
                <h1>Patrocinador</h1>
                <div>idSponsor:<?= $_SESSION['user']->getIdSponsor() ?></div>
                <div>mailSponsor:<?= $_SESSION['user']->getMailSponsor() ?></div>
            </div>
            <div class="right floated column">
                <a class="ui black basic button" href="?controller=sponsor&action=logout">Logout</a>
            </div>
        </div>
    </div>
</div>