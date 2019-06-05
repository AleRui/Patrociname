<?php
?>

<div  id="cont-searcher-login" class="cont-searcher-login">
    <!-- -->
    <!-- <a class="ui button" id="showSer">Entrar Buscador</a> -->
    <!-- -->
    <form id="formSearcher"
          class="ui form"
          action="?controller=searcher&action=login"
          method="POST">
        <!-- -->
        <h4 class="ui header">Entrar Buscador</h4>
        <!-- -->
        <div class="field">
            <label>email</label>
            <input form="formSearcher"
                   id="registerSearcherMail"
                   type="email"
                   name="mail"
                   required>
            <span id="alertaMailSearcher"></span>
        </div>
        <!-- -->
        <div class="field">
            <label>password</label>
            <input form="formSearcher"
                   name="pass"
                   required>
        </div>
        <!-- -->
        <button form="formSearcher"
                class="ui button"
                type="submit">
            Login
        </button>
    </form>
    <!-- -->
</div>
