<?php
require_once './Model/SponsorBundle.php';
?>

<div class="ui container">
    <div class="ui grid">
        <div class="ui row">
            <h2>Añadir forma de Patrocinio a Paquete de Patrocinio</h2>
        </div>
        <div class="one column row">
            <form id="addSponsor"
                  class="ui form"
                  action="?controller=sponsorBundle&action=insertSponsorBundle"
                  method="POST"
                  enctype="multipart/form-data"
                  accept-charset="UTF-8">
                <!-- Sponsor Way Text-->
                <div class="two fields">
                    <div class="field">
                        <label>Tipo de publicidad</label>
                        <input form="addSponsor"
                               name="sponsorWay"
                               type="text"
                               required/>
                    </div>
                    <!-- Sponsor Cost -->
                    <div class="field">
                        <label>Coste:</label>
                        <input form="addSponsor"
                               name="sponsoringCost"
                               type="number"
                               step="0.01"
                               required/>
                    </div>
                    <!-- Sponsor Duration -->
                    <div class="field">
                        <label>Duración:</label>
                        <input form="addSponsor"
                               name="sponsorDuration"
                               type="number"
                               step="0"/>
                    </div>
                    <!-- Sponsor Ima -->
                    <div class="field">
                        <input form="addSponsor"
                               id="imaBeforeInput"
                               name="sponsorIma"
                               type="file"
                               onchange="showImageBeforeUpload(this);"/>
                        <img id="imaBefore" src="#" alt="your image"/>
                    </div>
                </div>
                <!-- -->
                <button form="addSponsor" class="ui button" type="submit">Subir</button>
            </form>
        </div>
    </div>
</div>
