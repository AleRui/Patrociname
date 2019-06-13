<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

if (isset($_SESSION['user'])) {
    ?>
    <div class="contUserTag">
        <div class="btn-show-user" onclick="showContainerUser()">
            <i class="fas fa-user"></i>
        </div>
        <div id="cont-data-user">
            <div><?= $_SESSION['user']->getMailSearcher() ?></div>
            <a href="?controller=searcher&action=logout">Logout</a>
        </div>
    </div>
    <?php
}
?>
