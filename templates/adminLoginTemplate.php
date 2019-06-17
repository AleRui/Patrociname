<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

?>

<div  id="cont-admin-login" class="cont-admin-login">
    <!-- -->
    <form id="formLoginAdmin"
          action="?controller=admin&action=login"
          method="POST">
        <!-- -->
        <h4>Entrar Admin</h4>
        <!-- -->
        <div class="field">
            <label>email</label>
            <input form="formLoginAdmin"
                   id="registerAdminMail"
                   type="email"
                   name="mail"
                   required>
            <span id="alertaMailSearcher"></span>
        </div>
        <!-- -->
        <div class="field">
            <label>password</label>
            <input form="formLoginAdmin"
                   name="pass"
                   type="password"
                   required>
        </div>
        <!-- -->
        <button form="formLoginAdmin"
                type="submit">
            Login
        </button>
    </form>
    <!-- -->
</div>
