<?php
?>

<div  id="cont-sponsor-login" class="cont-sponsor-login">
    <!-- -->
    <!-- <a class="ui button" id="showSpo">Entrar Sponsor/Patrocinador</a> -->
    <!-- -->
    <form id="formSponsor"
          class="ui form"
          action="?controller=sponsor&action=login"
          method="POST">
        <!-- -->
        <h4 class="ui header">Sponsor/Patrocinador</h4>
        <!-- -->
        <div class="field">
            <label>email</label>
            <input form="formSponsor"
                   id="registerSearcherMail"
                   type="email"
                   name="mail"
                   required>
        </div>
        <!-- -->
        <div class="field">
            <label>password</label>
            <input form="formSponsor"
                   name="pass"
                   required>
        </div>
        <!-- -->
        <button form="formSponsor" class="ui button" type="submit">Login</button>
    </form>
</div>
