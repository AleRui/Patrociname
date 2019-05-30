<?php
?>

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
