<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 17/11/18
 * Time: 20:50
 */
require_once 'libs/headHTML.php';
require_once 'Model/Sponsor.php';
//if ( $_SESSION ) mostrar( $_SESSION['info_empresa'] );
?>
  <!-- -->
  <div class="ui container">
    <!-- -->
    <div class="ui grid">
      <div class="four column row">
        <div class="left floated column">
          <h1>Patrocinador</h1>
          <div>idSponsor:<?= unserialize($_SESSION['sponsor'])->getIdSponsor() ?></div>
          <div>mailSponsor:<?= unserialize($_SESSION['sponsor'])->getMailSponsor() ?></div>
        </div>
        <div class="right floated column">
          <a class="ui black basic button" href="?controller=sponsor&action=logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- -->
  <div class="ui container">
    <div class="ui grid">
      <!-- Compruebar API eimforma -->
      <?php
      if (!isset($_SESSION['info_empresa']) || $_SESSION['info_empresa'] == false) {
        ?>
        <div class="ui row">
          <form id="checkCIF"
                class="ui form"
                method="POST"
                action="?controller=sponsor&action=checkCIF">
            <div class="ui field">
              <label>Comprobar CIF</label>
              <input form="checkCIF" name="cif">
            </div>
            <div class="field">
              <button form="checkCIF" class="ui button" type="submit">Comprobar</button>
            </div>
          </form>
        </div>
        <?php
      } else {
        ?>
        <div class="ui row">
          <div class="ui list">
            <div class="item">La empresa esta registrada en einformación.com</div>
            <div class="item">El nombre es <?= $_SESSION['info_empresa']->denominacion ?></div>
            <div class="item">El domicilio Social es <?= $_SESSION['info_empresa']->domicilioSocial ?></div>
            <div class="item">La formaJuridica es <?= $_SESSION['info_empresa']->formaJuridica ?></div>
            <div class="item">El cnae es <?= $_SESSION['info_empresa']->cnae ?></div>
            <div class="item">La fecha del Ultimo Balance es <?= $_SESSION['info_empresa']->fechaUltimoBalance ?></div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <!-- -->
  <div class="ui container">
    <div class="ui grid">
      <?php
      if (!isset($_SESSION['listSponsorBundle'])) {
        ?>
        <div class="ui row">
          <a class="ui button" href="?controller=sponsor&action=findSearcher">Encontrar buscadores de
            Patrocinio</a><br>
        </div>
        <?php
      } else {
      ?>
      <div class="ui row">
        <h4 class="ui header">Listado de ofertas de patrocinio</h4>
      </div>
      <div class="ui row">
        <a class="ui button" href="?controller=sponsor&action=hidefindSearcher">Ocultar buscadores de Patrocinio</a>
      </div>
      <div class="ui row">
        <div class="ui cards">
          <?php
          if ($_SESSION['listSponsorBundle']['show']) {
            $list = $_SESSION['listSponsorBundle']['list'];
            //mostrar($list);
            for ($numRow = 0; $numRow < count($list); $numRow++) {
              ?>
              <!-- -->
              <div class="card">
                <div class="content">
                  <!-- -->
                  <form class="ui form" id="sponsoring-<?= $numRow ?>"
                        method="POST"
                        action="?controller=sponsor&action=buySponsoring">
                    <!-- -->
                    <img class="right floated ui image" src="./web/imas/image.png">
                    <!-- -->
                    <input form="sponsoring-<?= $numRow ?>"
                           type="hidden"
                           name="idSponsorBundle"
                           value="<?= $list[$numRow]->idSponsorBundle ?>"
                           readonly>
                    <!-- -->
                    <input form="sponsoring-<?= $numRow ?>"
                           type="hidden"
                           name="idSearcher"
                           value="<?= $list[$numRow]->idSearcher ?>"
                           readonly>
                    <!-- -->
                    <input form="sponsoring-<?= $numRow ?>"
                           type="text"
                           name="sponsorWay"
                           value="<?= $list[$numRow]->sponsorWay ?>"
                           readonly>
                    <!-- -->
                    <input form="sponsoring-<?= $numRow ?>"
                           type="number" step="0.01"
                           name="sponsoringCost"
                           value="<?= $list[$numRow]->sponsoringCost ?>"
                           readonly>
                    <!-- -->
                    <button form="sponsoring-<?= $numRow ?>"
                            type="submit">
                      Comprar
                    </button>
                  </form>
                </div>
              </div>
              <?php
            }
          }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- -->
  <div class="ui container">
    <div class="ui grid">
      <div class="ui row">
        <h4 class="ui header">Patrocinios Comprados</h4>
      </div>
      <!-- -->
      <div class="ui cards">
        <?php
        if (!isset($_SESSION['purchases'])) {
          ?>
          <p>No hay compras patrocinios comprados de este Sponsor</p>
          <?php
        } else {
          $purchases = $_SESSION['purchases'];
          //
          for ($numRow = 0;
               $numRow < count($purchases);
               $numRow++) {
            ?>
            <!-- -->
            <div class="card">
              <div class="content">
                <!-- -->
                <form class="ui form"
                      id="purchases-<?= $numRow ?>"
                      method="POST"
                      action="?controller=sponsor&action=buySponsoring">
                  <!-- -->
                  <img class="right floated ui image" src="./web/imas/image.png">
                  <!-- -->
                  <label>idSponsorBundle</label>
                  <input form="purchases-<?= $numRow ?>"
                         type="hidden"
                         name="idSponsorBundle"
                         value="<?= $purchases[$numRow]->idSponsorBundle ?>"
                         readonly>
                  <label>idSponsor</label>
                  <input form="purchases-<?= $numRow ?>"
                         type="hidden"
                         name="idSponsor"
                         value="<?= $purchases[$numRow]->idSponsor ?>"
                         readonly>
                  <label>idSearcher</label>
                  <input form="purchases-<?= $numRow ?>"
                         type="hidden"
                         name="idSearcher"
                         value="<?= $purchases[$numRow]->idSearcher ?>"
                         readonly>
                  <label>idSearcher</label>
                  <input form="purchases-<?= $numRow ?>"
                         type="text"
                         name="sponsorWay"
                         value="<?= $purchases[$numRow]->sponsorWay ?>"
                         readonly>
                  <label>sponsoringCost</label>
                  <input form="purchases-<?= $numRow ?>"
                         type="number" step="0.01"
                         name="sponsoringCost"
                         value="<?= $purchases[$numRow]->sponsoringCost ?>"
                         readonly>
                </form>
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
<?php include_once 'libs/bodyHTML.php'; ?>