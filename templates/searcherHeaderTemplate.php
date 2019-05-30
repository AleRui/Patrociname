<?php

require_once './Model/Searcher.php';

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
                <h2 class="ui header">Buscador</h2>
                <div>idSearcher:<?= $_SESSION['user']->getIdSearcher() ?></div>
                <div>mailSearcher:<?= $_SESSION['user']->getMailSearcher() ?></div>
            </div>
            <div class="right floated column">
                <a class="ui black basic button" href="?controller=searcher&action=logout">Logout</a>
            </div>
        </div>
    </div>
</div>