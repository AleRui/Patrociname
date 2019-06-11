<?php
//showPretty( unserialize($_SESSION['createdSponsorBundle']) );
?>


<div class="cont-allSponsorBundle">
    <!-- -->
    <div>
        <h2>Paquetes de patrocinio Disponibles:</h2>
    </div>
    <!-- -->
    <div>
        <?php
        if (isset($_SESSION['createdSponsorBundle'])) {
            //
            $createdSponsorBundle = unserialize($_SESSION['createdSponsorBundle']);
            //
            for ($numRow = 0; $numRow < count($createdSponsorBundle); $numRow++) {
                ?>
                <!-- -->
                <div class="cont-sponsorBundle">
                    <!--  -->
                    <form   id="sponsorWay-<?= $numRow ?>"
                            method="POST"
                            action=""
                            enctype="multipart/form-data"
                            accept-charset="UTF-8">
                        <!-- ID Sponsor Way-->
                        <div class="field">
                            <input form="sponsorWay-<?= $numRow ?>"
                                   name="idSponsorBundle"
                                   value="<?= $createdSponsorBundle[$numRow]->getIdSponsorBundle() ?>"
                                   type="hidden" ;
                                   readonly>
                        </div>
                        <!-- Image Sponsor Way-->
                        <div class="field">
                            <img id="sponsorIma-<?= $numRow ?>"
                                 src="
                                    <?php
                                 if ($createdSponsorBundle[$numRow]->getSponsorIma() && !empty($createdSponsorBundle[$numRow]->getSponsorIma())) {
                                     echo $createdSponsorBundle[$numRow]->getSponsorIma();
                                 } else {
                                     echo "./web/imas/image.png";
                                 }
                                 ?>">
                            <label>Cambiar Imágen
                                <input form="sponsorWay-<?= $numRow ?>"
                                       id="sponsorImaInput-<?= $numRow ?>"
                                       name="sponsorImaInput"
                                       value="<?= $createdSponsorBundle[$numRow]->getSponsorIma() ?>"
                                       type="file"
                                       onchange="showImageBeforeUpload(this);"/>
                            </label>
                            <input form="sponsorWay-<?= $numRow ?>"
                                   name="sponsorIma"
                                   value="<?= $createdSponsorBundle[$numRow]->getSponsorIma() ?>"
                                   type="hidden"
                                   readonly/>
                        </div>
                        <!-- Text Sponsor Way  -->
                        <div class="field">
                            <label>Forma: </label>
                            <textarea form="sponsorWay-<?= $numRow ?>"
                                      name="sponsorWay"
                                      rows="4"
                                      cols="30"><?= $createdSponsorBundle[$numRow]->getSponsorWay() ?>
                            </textarea>
                        </div>
                        <!-- Cost Sponsor Way -->
                        <div class="field">
                            <label>Coste: </label>
                            <input form="sponsorWay-<?= $numRow ?>"
                                   name="sponsoringCost"
                                   type="number"
                                   step="0.01"
                                   value="<?= $createdSponsorBundle[$numRow]->getSponsoringCost() ?>">
                        </div>
                        <!-- Duration Sponsor Way -->
                        <div class="field">
                            <label>Duración: (meses) </label>
                            <input form="sponsorWay-<?= $numRow ?>"
                                   name="sponsorDuration"
                                   type="number"
                                   step="0"
                                   value="<?= $createdSponsorBundle[$numRow]->getSponsorDuration() ?>">
                        </div>
                        <!-- Date Created Sponsor Way -->
                        <div class="field">
                            <label>Fecha de Creación:</label>
                            <input form="sponsorWay-<?= $numRow ?>"
                                   type="datetime-local"
                                   value="<?= $createdSponsorBundle[$numRow]->getSponsorDateCreated() ?>"
                                   readonly>
                        </div>
                        <!-- -->

                        <!-- Buttons -->
                        <div class="field">
                            <?php
                            if ($createdSponsorBundle[$numRow]->getMailSponsor()) {
                                //
                                echo '<div class="bought">Producto comprado por: ';
                                echo $createdSponsorBundle[$numRow]->getMailSponsor();
                                echo '</div>';
                                //
                                echo '<div class="bought">La fecha de compra fue: ';
                                echo $createdSponsorBundle[$numRow]->getBuyDateSponsorBundle();
                                echo '</div>';
                                //
                            } else {
                                //
                                echo '<div class="notBought">Actualmente este Sponsor Way no ha sido comprado.</div>';
                                //
                                ?>
                                <div class="cont-buttons">

                                    <button type=""
                                            class="btn-upload"
                                            form="sponsorWay-<?= $numRow ?>"
                                            onclick="setActionUpdate(<?= $numRow ?>)">
                                        <i class="far fa-edit"></i>
                                        Actualizar
                                    </button>
                                    <!-- -->
                                    <button type=""
                                            class="btn-delete"
                                            form="sponsorWay-<?= $numRow ?>"
                                            onclick="setActionDelete(<?= $numRow ?>)">
                                        <i class="far fa-trash-alt"></i>
                                        Borrar
                                    </button>
                                </div>
                                <?php
                                //
                            } // End If bought
                            ?>
                        </div>
                    </form>
                    <!-- -->
                </div>
                <?php // End for
            }
        }
        ?>
    </div>

</div>
