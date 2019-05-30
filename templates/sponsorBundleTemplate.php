<?php
?>

<div class="ui container">
    <div class="ui grid">
        <div class="ui row">
            <h2 class="ui header">Paquete de patrocinio:</h2>
        </div>
        <div class="ui cards">
            <?php
            if (isset($_SESSION['allSponsorBundle'])) {
                $allSponsorBundle = unserialize($_SESSION['allSponsorBundle']);
                //showPretty($allSponsorBundle);
                for ($numRow = 0; $numRow < count($allSponsorBundle); $numRow++) {
                    ?>
                    <!-- -->
                    <div class="card">
                        <div class="content">
                            <!-- SponsorWays -->
                            <form
                                    class="ui form"
                                    id="sponsorWay-<?= $numRow ?>"
                                    method="POST"
                                    action=""
                                    enctype="multipart/form-data"
                                    accept-charset="UTF-8">
                                <!-- ID Sponsor Way-->
                                <input form="sponsorWay-<?= $numRow ?>"
                                       name="idSponsorBundle"
                                       value="<?= $allSponsorBundle[$numRow]->getIdSponsorBundle() ?>"
                                       type="hidden" ;
                                       readonly>
                                <!-- Image Sponsor Way-->
                                <img class="right floated ui image"
                                     id="sponsorIma-<?= $numRow ?>"
                                     src="
                                    <?php
                                     if ($allSponsorBundle[$numRow]->getSponsorIma() && !empty($allSponsorBundle[$numRow]->getSponsorIma())) {
                                         echo $allSponsorBundle[$numRow]->getSponsorIma();
                                     } else {
                                         echo "./web/imas/image.png";
                                     }
                                     ?>">
                                <input form="sponsorWay-<?= $numRow ?>"
                                       id="sponsorImaInput-<?= $numRow ?>"
                                       name="sponsorImaInput"
                                       value="<?= $allSponsorBundle[$numRow]->getSponsorIma() ?>"
                                       type="file" ;
                                       onchange="showImageBeforeUpload(this);"/>
                                <input form="sponsorWay-<?= $numRow ?>"
                                       name="sponsorIma"
                                       value="<?= $allSponsorBundle[$numRow]->getSponsorIma() ?>"
                                       type="hidden" ;
                                       readonly"/>
                                <!-- Id Searcher -->
                                <!--<input form="sponsorWay-<?= $numRow ?>"
                                       name="idSearcher"
                                       value="<?= $allSponsorBundle[$numRow]->getIdSearcher() ?>"
                                       type="hidden" ;
                                       readonly>-->
                                <!-- Text Sponsor Way  -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           type="text"
                                           name="sponsorWay"
                                           value="<?= $allSponsorBundle[$numRow]->getSponsorWay() ?>">
                                </div>
                                <!-- Cost Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           name="sponsoringCost"
                                           type="number"
                                           step="0.01"
                                           value="<?= $allSponsorBundle[$numRow]->getSponsoringCost() ?>">
                                </div>
                                <!-- Cost Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           name="sponsorDuration"
                                           type="number"
                                           step="0"
                                           value="<?= $allSponsorBundle[$numRow]->getSponsorDuration() ?>">
                                </div>
                                <!-- Date Created Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           type="datetime-local"
                                           value="<?= $allSponsorBundle[$numRow]->getSponsorDateCreated() ?>"
                                           readonly>
                                </div>
                                <!-- -->

                                <!-- Buttons -->
                                <button type=""
                                        class="ui button"
                                        form="sponsorWay-<?= $numRow ?>"
                                        onclick="setActionUpdate(<?= $numRow ?>)">Actualizar
                                </button>
                                <!-- -->
                                <button type=""
                                        class="ui button"
                                        form="sponsorWay-<?= $numRow ?>"
                                        onclick="setActionDelete(<?= $numRow ?>)">Borrar
                                </button>
                            </form>
                            <!-- -->

                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
