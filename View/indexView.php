<?php include_once 'templates/headHTML.php'; ?>

<?php
    if ( !empty($_SESSION) ) {
        echo 'Existe Session';
        showPretty($_SESSION);
    }
    ?>
  <!-- -->
  <div class="ui grid container">
    <!-- -->
    <div class="two column row">
      <!-- -->
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
      <!-- -->
      <div class="column">
        <!-- -->
        <a class="ui button" id="showSer">Entrar Buscador</a>
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
                   id="searcherMail"
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
    </div>
    <!-- -->
    <!-- -->
    <div class="two column row">
      <!-- -->
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
      <!-- -->
      <div class="column">
        <!-- -->
        <a class="ui button" id="showSpo">Entrar Sponsor/Patrocinador</a>
        <!-- -->
        <form id="formSponsor"
              class="ui form"
              action="?controller=sponsor&action=sessionStart"
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
    </div>
  </div>
  <!-- -->
  <div class="ui grid container api">
    <div class="ui row">
      <div class="ui stackable two column">
        <!-- -->
        <div class="column">
          <h3 class="ui header">Consulta nuestra API</h3>
        </div>
        <!-- -->
        <div class="column">
          <a class="ui button" href="?controller=Api&action=sendData">API-REST</a>
        </div>
        <div class="ui vertical divider"></div>
      </div>
    </div>
  </div>
  <!-- -->

<?php include_once 'templates/footerHTML.php'; ?>