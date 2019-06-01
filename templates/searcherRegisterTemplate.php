<?php
?>

<div class="column">
    <!-- -->
    <a class="ui button" id="showRegSer">Registrar Buscador</a>
    <!-- -->
    <form id="registerSearcher"
          class="ui form registerSearcher"
          action="?controller=searcher&action=registerSearcher"
          method="POST">
        <div class="field">
            <!-- -->
            <h4 class="ui header">Buscador</h4>
            <!-- -->
            <label>email</label>
            <input form="registerSearcher"
                   id="registerSearcherMail"
                   type="email"
                   name="registerSearcherMail"
                   required>
            <span id="alertaRegisterMailSearcher"></span>
        </div>
        <!-- -->
        <div class="field">
            <label>password</label>
            <input form="registerSearcher"
                   name="registerSearcherPass"
                   required>
        </div>
        <!-- -->
        <button form="registerSearcher" class="ui button" type="submit">Registrar</button>
    </form>
</div>
