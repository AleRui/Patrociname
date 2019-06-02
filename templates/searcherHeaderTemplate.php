<?php

require_once './Model/Searcher.php';

if ($_SESSION) {
    //showPretty($_SESSION);
    //showPretty()$_SESSION['user'];
}

?>
<div>
    <!-- -->
    <div>
        <h2>Buscador</h2>
        <div>idSearcher:<?= $_SESSION['user']->getIdSearcher() ?></div>
        <div>mailSearcher:<?= $_SESSION['user']->getMailSearcher() ?></div>
    </div>
    <div>
        <a href="?controller=searcher&action=logout">Logout</a>
    </div>
</div>