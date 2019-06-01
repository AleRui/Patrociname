<?php
//showPretty($_SESSION);
?>
<div class="ui container">
    <div class="ui grid">
        <?php
        if (!isset($_SESSION['allAvailableBundle'])) {
            ?>
            <div class="ui row">
                <a class="ui button" href="?controller=sponsor&action=findAllAvailableBundle">Encontrar buscadores de
                    Patrocinio</a><br>
            </div>
            <?php
        } else {
        ?>
        <div class="ui row">
            <h4 class="ui header">Listado de ofertas de patrocinio</h4>
        </div>
        <div class="ui row">
            <a class="ui button" href="?controller=sponsor&action=hideAllAvailableBundle">Ocultar buscadores de Patrocinio</a>
        </div>
        <div class="ui row">
            <div class="ui cards">
                <?php
                if ($_SESSION['allAvailableBundle']['show']) {
                    $allAvailableBundle = $_SESSION['allAvailableBundle']['list'];
                    for ($numRow = 0; $numRow < count($allAvailableBundle); $numRow++) {
                        ?>
                        <!-- -->
                        <div class="card">
                            <div class="content">
                                <!-- -->
                                <form class="ui form"
                                      id="sponsorWay-<?= $numRow ?>"
                                      method="POST"
                                      action="?controller=sponsor&action=buySponsoring">
                                    <!-- Sponsor Image -->
                                    <img class="right floated ui image"
                                         id="sponsorIma-<?= $numRow ?>"
                                         src="
                                    <?php
                                         if ($allAvailableBundle[$numRow]->getSponsorIma() && !empty($allAvailableBundle[$numRow]->getSponsorIma())) {
                                             echo $allAvailableBundle[$numRow]->getSponsorIma();
                                         } else {
                                             echo "./web/imas/image.png";
                                         }
                                         ?>">
                                    <!-- ID Sponsor Way-->
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           name="idSponsorBundle"
                                           value="<?= $allAvailableBundle[$numRow]->getIdSponsorBundle() ?>"
                                           type="hidden" ;
                                           readonly>
                                    <!-- Text Sponsor Way  -->
                                    <div class="field">
                                        <input form="sponsorWay-<?= $numRow ?>"
                                               type="text"
                                               value="<?= $allAvailableBundle[$numRow]->getSponsorWay() ?>"
                                               readonly>
                                    </div>
                                    <!-- Cost Sponsor Way -->
                                    <div class="field">
                                        <input form="sponsorWay-<?= $numRow ?>"
                                               type="text"
                                               value="<?= $allAvailableBundle[$numRow]->getSponsorDuration() ?>"
                                               readonly>
                                    </div>
                                    <!-- Date Created Sponsor Way -->
                                    <div class="field">
                                        <input form="sponsorWay-<?= $numRow ?>"
                                               type="datetime-local"
                                               value="<?= $allAvailableBundle[$numRow]->getSponsorDateCreated() ?>"
                                               readonly>
                                    </div>
                                    <!-- BUTTONS -->
                                    <button form="sponsorWay-<?= $numRow ?>"
                                            type="submit">
                                        Comprar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                }
                ?>
            </div>
        </div>
    </div>
</div>
