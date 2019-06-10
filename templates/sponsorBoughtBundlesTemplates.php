<?php
//showPretty($_SESSION);
?>

<div class="cont-allSponsorBundle">
    <!-- -->
    <div>
        <h4 class="ui header">Patrocinios Comprados</h4>
    </div>
    <!-- -->
    <div>
        <?php
        if (empty($_SESSION['allSponsorBought'])) {
            ?>
            <p>No hay compras patrocinios comprados de este Sponsor</p>
            <?php
        } else {
            $allSponsorBought = $_SESSION['allSponsorBought'];
            //showPretty($allSponsorBought);
            //
            for ($numRow = 0;
                 $numRow < count($allSponsorBought);
                 $numRow++) {
                ?>
                <!-- -->
                <div class="cont-sponsorBundle">
                    <!-- -->
                    <form id="sponsorBought-<?= $numRow ?>"
                          method="POST"
                          action="?controller=sponsor&action=buySponsoring"
                          accept-charset="UTF-8">
                        <!-- Id Sponsor Way -->
                        <div class="field">
                            <input form="sponsorBought-<?= $numRow ?>"
                                   type="hidden"
                                   name="idSponsorBundle"
                                   value="<?= $allSponsorBought[$numRow]->getIdSponsorBundle() ?>"
                                   readonly>
                        </div>
                        <!-- Id Sponsor Image-->
                        <div class="field">
                            <img id="sponsorIma-<?= $numRow ?>"
                                 src="
                                    <?php
                                 if ($allSponsorBought[$numRow]->getSponsorIma() && !empty($allSponsorBought[$numRow]->getSponsorIma())) {
                                     echo $allSponsorBought[$numRow]->getSponsorIma();
                                 } else {
                                     echo "./web/imas/image.png";
                                 }
                                 ?>">
                        </div>
                        <!-- Id Searcher -->
                        <input form="sponsorBought-<?= $numRow ?>"
                               type="hidden"
                               name="idSearcher"
                               value="<?= $allSponsorBought[$numRow]->getIdSearcher() ?>"
                               readonly>
                        <!-- Text Sponsor Way  -->
                        <div class="field">
                            <label>Forma: </label>
                            <textarea form="sponsorBought-<?= $numRow ?>"
                                      name="sponsorWay"
                                      rows="4"
                                      cols="30"
                                      readonly="readonly"><?= $allSponsorBought[$numRow]->getSponsorWay() ?>
                            </textarea>
                        </div>
                        <!-- Cost Sponsor Way -->
                        <div class="field">
                            <label>Coste: </label>
                            <input form="sponsorBought-<?= $numRow ?>"
                                   type="number" step="0.01"
                                   name="sponsoringCost"
                                   value="<?= $allSponsorBought[$numRow]->getSponsoringCost() ?>"
                                   readonly>
                        </div>
                        <!-- Duration Sponsor Way -->
                        <div class="field">
                            <label>Duración: </label>
                            <input form="sponsorBought-<?= $numRow ?>"
                                   type="text"
                                   value="<?= $allSponsorBought[$numRow]->getSponsorDuration() ?>"
                                   readonly>
                        </div>
                        <!-- Date Created Sponsor Way -->
                        <div class="field">
                            <label>Fecha Creación:</label>
                            <input form="sponsorBought-<?= $numRow ?>"
                                   type="datetime-local"
                                   value="<?= $allSponsorBought[$numRow]->getSponsorDateCreated() ?>"
                                   readonly>
                        </div>
                        <!-- Date Created Sponsor Way -->
                        <div class="field">
                            <label>Fecha Compra:</label>
                            <input form="sponsorBought-<?= $numRow ?>"
                                   type="datetime-local"
                                   value="<?= $allSponsorBought[$numRow]->getBuyDateSponsorBundle() ?>"
                                   readonly>
                        </div>
                    </form>
                </div>
                <?php
            } // End For
        } // Ens Exist $_SESSION
        ?>
    </div>
</div>
