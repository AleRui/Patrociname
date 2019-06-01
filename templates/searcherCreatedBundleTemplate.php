<?php
//showPretty( unserialize($_SESSION['createdSponsorBundle']) );
?>

<div class="ui container">
    <div class="ui grid">
        <div class="ui row">
            <h2 class="ui header">Paquetes de patrocinio Disponibles:</h2>
        </div>
        <div class="ui cards">
            <?php
            if (isset($_SESSION['createdSponsorBundle'])) {
                //
                $createdSponsorBundle = unserialize($_SESSION['createdSponsorBundle']);
                //showPretty($createdSponsorBundle);
                //
                for ($numRow = 0; $numRow < count($createdSponsorBundle); $numRow++) {
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
                                       value="<?= $createdSponsorBundle[$numRow]->getIdSponsorBundle() ?>"
                                       type="hidden" ;
                                       readonly>
                                <!-- Image Sponsor Way-->
                                <img class="right floated ui image"
                                     id="sponsorIma-<?= $numRow ?>"
                                     src="
                                    <?php
                                     if ($createdSponsorBundle[$numRow]->getSponsorIma() && !empty($createdSponsorBundle[$numRow]->getSponsorIma())) {
                                         echo $createdSponsorBundle[$numRow]->getSponsorIma();
                                     } else {
                                         echo "./web/imas/image.png";
                                     }
                                     ?>">
                                <input form="sponsorWay-<?= $numRow ?>"
                                       id="sponsorImaInput-<?= $numRow ?>"
                                       name="sponsorImaInput"
                                       value="<?= $createdSponsorBundle[$numRow]->getSponsorIma() ?>"
                                       type="file" ;
                                       onchange="showImageBeforeUpload(this);"/>
                                <input form="sponsorWay-<?= $numRow ?>"
                                       name="sponsorIma"
                                       value="<?= $createdSponsorBundle[$numRow]->getSponsorIma() ?>"
                                       type="hidden" ;
                                       readonly"/>
                                <!-- Id Searcher -->
                                <!--<input form="sponsorWay-<?= $numRow ?>"
                                       name="idSearcher"
                                       value="<?= $createdSponsorBundle[$numRow]->getIdSearcher() ?>"
                                       type="hidden" ;
                                       readonly>-->
                                <!-- Text Sponsor Way  -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           type="text"
                                           name="sponsorWay"
                                           value="<?= $createdSponsorBundle[$numRow]->getSponsorWay() ?>">
                                </div>
                                <!-- Cost Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           name="sponsoringCost"
                                           type="number"
                                           step="0.01"
                                           value="<?= $createdSponsorBundle[$numRow]->getSponsoringCost() ?>">
                                </div>
                                <!-- Cost Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           name="sponsorDuration"
                                           type="number"
                                           step="0"
                                           value="<?= $createdSponsorBundle[$numRow]->getSponsorDuration() ?>">
                                </div>
                                <!-- Date Created Sponsor Way -->
                                <div class="field">
                                    <input form="sponsorWay-<?= $numRow ?>"
                                           type="datetime-local"
                                           value="<?= $createdSponsorBundle[$numRow]->getSponsorDateCreated() ?>"
                                           readonly>
                                </div>
                                <!-- -->

                                <!-- Buttons -->
                                <?php
                                if ($createdSponsorBundle[$numRow]->getMailSponsor()) {
                                    echo '<div>Producto comprado por: ';
                                    echo $createdSponsorBundle[$numRow]->getMailSponsor();
                                    echo '</div>';
                                    echo '<div>La fecha de compra fue: ';
                                    echo $createdSponsorBundle[$numRow]->getBuyDateSponsorBundle();
                                    echo '</div>';
                                } else {
                                    echo '<div>Actualmente este Sponsor Way no ha sido comprado.</div><br>';
                                    ?>
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
                                    <?php
                                }
                                ?>

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
