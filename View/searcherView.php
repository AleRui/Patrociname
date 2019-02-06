<?php
include_once 'libs/headHTML.php';
require_once 'Model/Searcher.php';
?>
  <div class="ui container">
    <!-- -->
    <div class="ui grid">
      <div class="four column row">
        <div class="left floated column">
          <h2 class="ui header">Buscador</h2>
          <div>idSearcher:<?= unserialize($_SESSION['searcher'])->getIdSearcher() ?></div>
          <div>mailSearcher:<?= unserialize($_SESSION['searcher'])->getMailSearcher() ?></div>
        </div>
        <div class="right floated column">
          <a class="ui black basic button" href="?controller=searcher&action=logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- -->
  <div class="ui container">
    <div class="ui grid">
      <div class="ui row">
        <h2>Añadir forma de Patrocinio a Paquete de Patrocinio</h2>
      </div>
      <div class="one column row">
        <form id="addSponsor"
              class="ui form"
              action="?controller=sponsorBundle&action=insertSponsorWay"
              method="POST"
              accept-charset="UTF-8">
          <!-- -->
          <div class="two fields">
            <div class="field">
              <label>Tipo de publicidad</label>
              <input form="addSponsor"
                     name="sponsorWay"
                     type="text"
                     required>
            </div>
            <!-- -->
            <div class="field">
              <label>Coste:</label>
              <input form="addSponsor"
                     name="sponsoringCost"
                     type="number"
                     step="0.01"
                     required>
            </div>
          </div>
          <!-- -->
          <button form="addSponsor" class="ui button" type="submit">Subir</button>
        </form>
      </div>
    </div>
  </div>
  <!-- -->

  <div class="ui container">
    <div class="ui grid">
      <div class="ui row">
        <h2 class="ui header">Paquete de patrocinio:</h2>
      </div>
      <div class="ui cards">
        <?php
        if (isset($_SESSION['sponsorBundle'])) {
          $sponsorBundle = unserialize($_SESSION['sponsorBundle']);
          for ($numRow = 0; $numRow < count($sponsorBundle); $numRow++) {
            ?>
            <!-- -->
            <div class="card">
              <div class="content">
                <!-- -->
                <form class="ui form" id="sponsorWay-<?= $numRow ?>" method="POST" action="">
                  <!-- -->
                  <img class="right floated ui image" src="./web/imas/image.png">
                  <!-- -->
                  <input form="sponsorWay-<?= $numRow ?>"
                         name="idSponsorBundle"
                         value="<?= $sponsorBundle[$numRow]->idSponsorBundle ?>"
                         type="hidden" ;
                         readonly>
                  <!-- -->
                  <input form="sponsorWay-<?= $numRow ?>"
                         name="idSearcher"
                         value="<?= $sponsorBundle[$numRow]->idSearcher ?>"
                         type="hidden" ;
                         readonly>
                  <!-- -->
                  <div class="field">
                    <input form="sponsorWay-<?= $numRow ?>"
                           type="text"
                           name="sponsorWay"
                           value="<?= $sponsorBundle[$numRow]->sponsorWay ?>">
                  </div>
                  <!-- -->
                  <div class="field">
                    <input form="sponsorWay-<?= $numRow ?>"
                           name="sponsoringCost"
                           type="number"
                           step="0.01"
                           value="<?= $sponsorBundle[$numRow]->sponsoringCost ?>">
                  </div>
                  <!-- -->
                  <button type=""
                          class="ui button"
                          form="sponsorWay-<?= $numRow ?>"
                          onclick="setActionUpdate(<?= $numRow ?>)">Actualizar
                  </button>
                  <!-- -->
                  <button type=""
                          class="ui button"
                          form="sponsorWay-<?= $numRow ?>"
                          onclick="setActionDelete(<?= $numRow ?>)">Borrar
                  </button>
                </form>
                <!-- -->

              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <!-- -->
  <!-- -->
<?php include_once 'libs/bodyHTML.php'; ?>