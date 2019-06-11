<?php
//showPretty($_SESSION);
?>
<?php
if (!isset($_SESSION['allAvailableBundle'])) {
    ?>
    <!-- -->
    <div class="cont-allSponsorBundle">
        <div class="cont-btn-showAvailable">
            <a href="?controller=sponsor&action=findAllAvailableBundle&page=1">
                <i class="fas fa-search"></i>
                Buscar</a>
            <br>
        </div>
    </div>
    <!-- -->
    <?php
} else {
    ?>
    <!-- -->
    <div class="cont-allSponsorBundle">
        <!-- -->
        <div>
            <h2>Listado de ofertas de patrocinio</h2>
            <a href="?controller=sponsor&action=hideAllAvailableBundle">Ocultar busqueda</a>
        </div>
        <!-- -->
        <div>
            <?php
            if (isset($_SESSION['allAvailableBundle']['show'])) {
                //
                $allAvailableBundle = $_SESSION['allAvailableBundle']['list'];
                //showPretty($allAvailableBundle);
                //
                for ($numRow = 0;
                     $numRow < count($allAvailableBundle);
                     $numRow++) {
                    ?>
                    <!-- -->
                    <div class="cont-sponsorBundle">
                        <!-- -->
                        <form id="sponsorWayAvailable-<?= $numRow ?>"
                              method="POST"
                              action="?controller=sponsor&action=buySponsoring"
                              accept-charset="UTF-8">
                            <!-- ID Sponsor Way-->
                            <div class="field">
                                <input form="sponsorWayAvailable-<?= $numRow ?>"
                                       name="idSponsorBundle"
                                       value="<?= $allAvailableBundle[$numRow]->getIdSponsorBundle() ?>"
                                       type="hidden" ;
                                       readonly>
                            </div>
                            <!-- Image Sponsor Image -->
                            <div class="field">
                                <img id="sponsorIma-<?= $numRow ?>"
                                     src="
                                    <?php
                                     if ($allAvailableBundle[$numRow]->getSponsorIma() && !empty($allAvailableBundle[$numRow]->getSponsorIma())) {
                                         echo $allAvailableBundle[$numRow]->getSponsorIma();
                                     } else {
                                         echo "./web/imas/image.png";
                                     }
                                     ?>">
                            </div>
                            <!-- Text Sponsor Way  -->
                            <div class="field">
                                <label>Forma: </label>
                                <textarea form="sponsorWayAvailable-<?= $numRow ?>"
                                          name="sponsorWay"
                                          rows="4"
                                          cols="30"
                                          readonly><?= $allAvailableBundle[$numRow]->getSponsorWay() ?>
                                </textarea>
                            </div>
                            <!-- Cost Sponsor Way -->
                            <div class="field">
                                <label>Coste: </label>
                                <input form="sponsorWayAvailable-<?= $numRow ?>"
                                       type="text"
                                       value="<?= $allAvailableBundle[$numRow]->getSponsorDuration() ?>"
                                       readonly>
                            </div>
                            <!-- Date Created Sponsor Way -->
                            <div class="field">
                                <label>Fecha de Creación</label>
                                <input form="sponsorWayAvailable-<?= $numRow ?>"
                                       type="datetime-local"
                                       value="<?= $allAvailableBundle[$numRow]->getSponsorDateCreated() ?>"
                                       readonly>
                            </div>
                            <!-- Buttons -->
                            <div class="field">
                                <div class="cont-buttons">
                                    <button form="sponsorWayAvailable-<?= $numRow ?>" type="submit">Comprar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                } // End For
            } // Ens Exist show
            ?>
        </div>
    </div>
    <!-- -->
    <?php
    //
    // Pagination
    require_once 'sponsorBundlePaginationTemplate.php';
    //
} // End Exist $_SESSION
?>
