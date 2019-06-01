<?php
require_once './Model/Sponsor.php';
?>

<div class="ui container">
    <div class="ui grid">
        <!-- Compruebar API eimforma -->
        <?php
        if (!isset($_SESSION['info_empresa']) || $_SESSION['info_empresa'] == false) {
            ?>
            <div class="ui row">
                <form id="checkCIF"
                      class="ui form"
                      method="POST"
                      action="?controller=sponsor&action=checkCIF">
                    <div class="ui field">
                        <label>Comprobar CIF</label>
                        <input form="checkCIF" name="cif">
                    </div>
                    <div class="field">
                        <button form="checkCIF" class="ui button" type="submit">Comprobar</button>
                    </div>
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="ui row">
                <div class="ui list">
                    <div class="item">La empresa esta registrada en einformación.com</div>
                    <div class="item">El nombre es <?= $_SESSION['info_empresa']->denominacion ?></div>
                    <div class="item">El domicilio Social es <?= $_SESSION['info_empresa']->domicilioSocial ?></div>
                    <div class="item">La formaJuridica es <?= $_SESSION['info_empresa']->formaJuridica ?></div>
                    <div class="item">El cnae es <?= $_SESSION['info_empresa']->cnae ?></div>
                    <div class="item">La fecha del Ultimo Balance
                        es <?= $_SESSION['info_empresa']->fechaUltimoBalance ?></div>
                </div>
            </div>
            <div class="ui row">
                <a class="ui button"
                   href="?controller=sponsor&action=hideDataCIF">
                    Ocultar Datos Empresa
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</div>