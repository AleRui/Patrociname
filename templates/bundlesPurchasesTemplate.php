<?php
?>

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
