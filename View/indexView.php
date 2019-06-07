<?php
if (!empty($_SESSION)) {
    echo 'Existe Session';
    showPretty($_SESSION);
}
?>
<?php include_once 'templates/headHTML.php'; ?>
<!-- -->
<div class="cont-all-bg-video">
    <video id="video" autoplay muted loop>
        <source src="./web/video/patrociname_bg2_copr.mp4" type="video/mp4" />
        <source src="./web/video/patrociname_bg2_copr.ogv" type="video/ogg" />
        <source src="./web/video/patrociname_bg2_copr.webm" type="video/webm" />
        <object
                type="application/x-shockwave-flash"
                data="video.swf">
            <param name="movie" value="./web/video/patrociname_bg2_copr.swf" />
            <param name="allowFullScreen" value="true" />
            <param name="wmode" value="transparent" />
            <param name="flashvars" value='config={"clip":{"url":"Video_flv.flv","autoPlay":false,"autoBuffering":true}}' />
        </object>
    </video>
</div>
<!-- -->
<div class="cont-all-index">
    <div class="cont-index-header">
        <?php include_once 'templates/headerTemplate.php'; ?>
    </div>
    <!-- -->
    <div class="cont-index-buttons">
        <button id="btnShow-cont-searcher-register" class="btn-showRegSearcher" onclick="showContainer(this)">
            Registrar
            Searcher
        </button>
        <button id="btnShow-cont-searcher-login" class="btn-showLogSearcher" onclick="showContainer(this)">Login
            Searcher
        </button>
        <button id="btnShow-cont-sponsor-register" class="btn-showRegSponsor" onclick="showContainer(this)">
            Registrar
            Sponsor
        </button>
        <button id="btnShow-cont-sponsor-login" class="btn-showLogSponsor" onclick="showContainer(this)">Login
            Sponsor
        </button>
    </div>
    <!-- -->
    <div class="cont-index-forms">
        <!-- -->
        <?php require_once './templates/searcherRegisterTemplate.php'; ?>
        <!-- -->
        <?php require_once './templates/searcherLoginTemplate.php'; ?>
        <!-- -->
        <?php require_once './templates/sponsorRegisterTemplate.php'; ?>
        <!-- -->
        <?php require_once './templates/sponsorLoginTemplate.php'; ?>
        <!-- -->
    </div>
    <!-- -->
    <div class="cont-index-api">
        <?php require_once './templates/searcherApiIndexTemplate.php'; ?>
    </div>
    <!-- -->
    <div class="cont-index-footer">
        <?php require_once './templates/footerTemplate.php'; ?>
    </div>
    <!-- -->
</div>
<!-- -->
<?php include_once 'templates/tailHTML.php'; ?>

