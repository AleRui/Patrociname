<?php
require_once './Model/SponsorBundle.php';
?>


<div class="cont-form-AddSponsor">
    <form id="addSponsor"
          action="?controller=sponsorBundle&action=insertSponsorBundle"
          method="POST"
          enctype="multipart/form-data"
          accept-charset="UTF-8">
        <!-- Tittle -->
        <div>
            <h2>Añadir forma de Patrocinio a Paquete de Patrocinio</h2>
        </div>

        <!-- Sponsor Way Text-->
        <div class="field">
            <label class="addIma">Tipo de publicidad</label>
            <textarea form="addSponsor"
                      name="sponsorWay"
                      rows="4"
                      cols="50"
                      required/>
            </textarea>
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
            <label>
                <i class="far fa-image"></i>
                Añadir imagen
                <input form="addSponsor"
                       id="imaBeforeInput"
                       name="sponsorIma"
                       type="file"
                       onchange="showImageBeforeUpload(this);"/>
            </label>
            <img id="imaBefore" src="#" alt="Imagen"/>
        </div>
        <!-- -->
        <button form="addSponsor" class="ui button" type="submit">
            <i class="fas fa-plus"></i>
        </button>
        <!-- -->
    </form>
</div>
