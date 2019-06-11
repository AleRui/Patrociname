<?php

require_once './Model/Admin.php';

?>


<div>
    <!-- -->
    <h2>Administrador</h2>
    <div>idSearcher:<?= $_SESSION['user']->getIdAdmin() ?></div>
    <div>mailSearcher:<?= $_SESSION['user']->getMailAdmin() ?></div>
    <div>
        <a href="?controller=admin&action=logout">Logout</a>
    </div>
</div>