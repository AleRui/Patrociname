<?php
//showPretty($_SESSION);
?>
<div class="ui container">
    <div class="ui grid">
        <div class="ui row">
            <h4 class="ui header">Patrocinios Comprados</h4>
        </div>
        <!-- -->
        <div class="ui cards">
            <?php
            if (empty($_SESSION['allSponsorBought'])) {
                ?>
                <p>No hay compras patrocinios comprados de este Sponsor</p>
                <?php
            } else {
                $allSponsorBought = $_SESSION['allSponsorBought'];
                //
                for ($numRow = 0; $numRow < count($allSponsorBought); $numRow++) {
                    ?>
                    <!-- -->
                    <div class="card">
                        <div class="content">
                            <!-- -->
                            <form class="ui form"
                                  id="sponsorBought-<?= $numRow ?>"
                                  method="POST"
                                  action="?controller=sponsor&action=buySponsoring">
                                <!-- Id Sponsor Image-->
                                <img class="right floated ui image"
                                     id="sponsorIma-<?= $numRow ?>"
                                     src="
                                    <?php
                                     if ($allSponsorBought[$numRow]->getSponsorIma() && !empty($allSponsorBought[$numRow]->getSponsorIma())) {
                                         echo $allSponsorBought[$numRow]->getSponsorIma();
                                     } else {
                                         echo "./web/imas/image.png";
                                     }
                                     ?>">
                                <!-- Id Sponsor Bundle -->
                                <input form="sponsorBought-<?= $numRow ?>"
                                       type="hidden"
                                       name="idSponsorBundle"
                                       value="<?= $allSponsorBought[$numRow]->getIdSponsorBundle() ?>"
                                       readonly>
                                <!-- Id Searcher -->
                                <input form="sponsorBought-<?= $numRow ?>"
                                       type="hidden"
                                       name="idSearcher"
                                       value="<?= $allSponsorBought[$numRow]->getIdSearcher() ?>"
                                       readonly>
                                <!-- Sponsor Way -->
                                <input form="sponsorBought-<?= $numRow ?>"
                                       type="text"
                                       name="sponsorWay"
                                       value="<?= $allSponsorBought[$numRow]->getSponsorWay() ?>"
                                       readonly>
                                <label>sponsoringCost</label>
                                <input form="sponsorBought-<?= $numRow ?>"
                                       type="number" step="0.01"
                                       name="sponsoringCost"
                                       value="<?= $allSponsorBought[$numRow]->getSponsoringCost() ?>"
                                       readonly>
                                <!-- Cost Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorBought-<?= $numRow ?>"
                                           type="text"
                                           value="<?= $allSponsorBought[$numRow]->getSponsorDuration() ?>"
                                           readonly>
                                </div>
                                <!-- Date Created Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorBought-<?= $numRow ?>"
                                           type="datetime-local"
                                           value="<?= $allSponsorBought[$numRow]->getSponsorDateCreated() ?>"
                                           readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
