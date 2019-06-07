<?php
?>

<div id="cont-searcher-register" class="cont-searcher-register">

    <form id="registerSearcher"
          class="form-searcher-register"
          action="?controller=searcher&action=registerSearcher"
          method="POST">

        <h4 class="ui header">Buscador</h4>

        <div class="field">

            <label>email</label>
            <input form="registerSearcher"
                   id="registerSearcherMail"
                   type="email"
                   name="registerSearcherMail"
                   required>
            <span id="alertaRegisterMailSearcher"></span>
        </div>

        <div class="field">
            <label>password</label>
            <input form="registerSearcher"
                   name="registerSearcherPass"
                   required>
        </div>

        <button form="registerSearcher" class="form-button-register" type="submit">Registrar</button>
    </form>

</div>
