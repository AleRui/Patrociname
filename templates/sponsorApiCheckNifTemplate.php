<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

?>

<div class="cont-api-checkEnterprise">
    <!-- API einforma -->
    <?php
    if (!isset($_SESSION['info_empresa']) || $_SESSION['info_empresa'] == false) {
        ?>
        <!-- -->
        <div class="cont-form-checkEnterprise">
            <form id="checkCIF"
                  method="POST"
                  action="?controller=sponsor&action=checkCIF">
                <!-- CIF -->
                <div class="field">
                    <label>Comprobar CIF</label>
                    <input form="checkCIF" name="cif" required>
                    <button form="checkCIF" type="submit">Comprobar</button>
                </div>
            </form>
        </div>
        <!-- -->
        <?php
    } else {
        ?>
        <!-- -->
        <div class="cont-data-enterprise">
            <ul>
                <li>La empresa esta registrada en einformación.com</li>
                <li>El nombre es <?= $_SESSION['info_empresa']->denominacion ?></li>
                <li>El domicilio Social es <?= $_SESSION['info_empresa']->domicilioSocial ?></li>
                <li>La formaJuridica es <?= $_SESSION['info_empresa']->formaJuridica ?></li>
                <li>El cnae es <?= $_SESSION['info_empresa']->cnae ?></li>
                <li>La fecha del Ultimo Balance es <?= $_SESSION['info_empresa']->fechaUltimoBalance ?></li>
            </ul>
            <!-- -->
            <a class="ui button"
               href="?controller=sponsor&action=hideDataCIF">
                Ocultar Datos Empresa
            </a>
            <!-- -->
        </div>
        <?php
    }
    ?>
</div>