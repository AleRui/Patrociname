<?php
?>

<div class="column">
    <!-- -->
    <a class="ui button" id="showRegSpo">Registrar Sponsor</a>
    <!-- -->
    <form id="registerSponsor"
          class="ui form"
          action="?controller=sponsor&action=registerSponsor"
          method="POST">
        <!-- -->
        <h4 class="ui header">Registrar Patrocinador/Sponsor</h4>
        <!-- -->
        <div class="field">
            <label>email</label>
            <!-- -->
            <input form="registerSponsor"
                   id="registerSponsorMail"
                   id="registerSearcherMail"
                   type="email"
                   name="registerSponsorMail"
                   required>
            <span id="alertaRegisterMailSponsor"></span>
        </div>
        <!-- -->
        <div class="field">
            <label>password</label>
            <input form="registerSponsor"
                   name="registerSponsorPass"
                   required>
        </div>
        <!-- -->
        <button form="registerSponsor" class="ui button" type="submit">Registrar</button>
    </form>
</div>
